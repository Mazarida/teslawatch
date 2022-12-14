<?php
namespace Bitrix\Sale;

use Bitrix\Main;
use Bitrix\Sale\Internals;
use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\PaySystem\Manager;
use Bitrix\Sale\PaySystem\Service;

Loc::loadMessages(__FILE__);

/**
 * Class PaymentCollection
 * @package Bitrix\Sale
 */
class PaymentCollection extends Internals\EntityCollection
{
	/** @var Order */
	protected $order;

	private static $eventClassName = null;

	/**
	 * @return Order
	 */
	protected function getEntityParent()
	{
		return $this->getOrder();
	}

	/**
	 * @param Service|null $paySystemService
	 * @return Payment
	 */
	public function createItem(Service $paySystemService = null)
	{
		/** @var Payment $paymentClassName */
		$paymentClassName = static::getItemCollectionClassName();

		$payment = $paymentClassName::create($this, $paySystemService);
		$this->addItem($payment);

		return $payment;
	}

	/**
	 * @param Internals\CollectableEntity $payment
	 * @return Result
	 */
	public function addItem(Internals\CollectableEntity $payment)
	{
		/** @var Payment $payment */
		$payment = parent::addItem($payment);

		$order = $this->getOrder();
		return $order->onPaymentCollectionModify(EventActions::ADD, $payment);
	}

	/**
	 * @internal
	 *
	 * @param $index
	 * @return Result
	 */
	public function deleteItem($index)
	{
		$oldItem = parent::deleteItem($index);

		/** @var Order $order */
		$order = $this->getOrder();
		return $order->onPaymentCollectionModify(EventActions::DELETE, $oldItem);
	}

	/**
	 * @param Internals\CollectableEntity $item
	 * @param null $name
	 * @param null $oldValue
	 * @param null $value
	 *
	 * @return Result
	 * @throws Main\NotImplementedException
	 * @throws Main\ObjectNotFoundException
	 */
	public function onItemModify(Internals\CollectableEntity $item, $name = null, $oldValue = null, $value = null)
	{
		/** @var Order $order */
		$order = $this->getOrder();
		return $order->onPaymentCollectionModify(EventActions::UPDATE, $item, $name, $oldValue, $value);
	}

	/**
	 * @return bool
	 */
	public function isPaid()
	{
		if (!empty($this->collection) && is_array($this->collection))
		{
			/** @var Payment $payment */
			foreach ($this->collection as $payment)
			{
				if (!$payment->isPaid())
					return false;
			}

			return true;
		}

		return false;
	}

	/**
	 * @param $name
	 * @param $oldValue
	 * @param $value
	 * @return Result
	 */
	public function onOrderModify($name, $oldValue, $value)
	{
		$result = new Result();

		switch($name)
		{
			case "CANCELED":

				if ($value == "Y")
				{
					$isPaid = false;

					/** @var Payment $payment */
					foreach ($this->collection as $payment)
					{
						if ($payment->isPaid())
						{
							$isPaid = true;
							break;
						}
					}

					if ($isPaid)
					{
						$result->addError(new ResultError(Loc::getMessage('SALE_ORDER_CANCEL_PAYMENT_EXIST_ACTIVE'), 'SALE_ORDER_CANCEL_PAYMENT_EXIST_ACTIVE'));
					}
				}

			break;

			case "PRICE":
				if (($order = $this->getOrder()) && !$order->isCanceled())
				{
					$currentPayment = false;
					$allowQuantityChange = false;
					if (count($this->collection) == 1)
					{
						/** @var Payment $currentPayment */
						if ($currentPayment = $this->rewind())
						{
							$allowQuantityChange = (bool)(!$currentPayment->isPaid() && !$currentPayment->isReturn() && ($currentPayment->getSum() == $oldValue));
							
							if ($allowQuantityChange)
							{
								if ($paySystemService = $currentPayment->getPaysystem())
								{
									$allowQuantityChange = $paySystemService->isAllowEditPayment();
								}
							}
						}
					}

					if ($allowQuantityChange && $currentPayment)
					{
						$r = $currentPayment->setField("SUM", $value);
						if (!$r->isSuccess())
						{
							$result->addErrors($r->getErrors());
						}
					}
				}
			break;
		}

		return $result;
	}

	/**
	 * @param Order $order
	 */
	public function setOrder(Order $order)
	{
		$this->order = $order;
	}

	/**
	 * @return Order
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * @return PaymentCollection
	 */
	protected static function createPaymentCollectionObject()
	{
		$registry = Registry::getInstance(static::getRegistryType());
		$paymentCollectionClassName = $registry->getPaymentCollectionClassName();

		return new $paymentCollectionClassName();
	}

	/**
	 * @return string
	 */
	public static function getRegistryType()
	{
		return Registry::REGISTRY_TYPE_ORDER;
	}

	/**
	 * @param Order $order
	 * @return PaymentCollection
	 */
	public static function load(Order $order)
	{
		/** @var PaymentCollection $paymentCollection */
		$paymentCollection = static::createPaymentCollectionObject();
		$paymentCollection->setOrder($order);

		if ($order->getId() > 0)
		{
			/** @var Payment $paymentClassName */
			$paymentClassName = static::getItemCollectionClassName();

			$paymentList = $paymentClassName::loadForOrder($order->getId());
			/** @var Payment $payment */
			foreach ($paymentList as $payment)
			{
				$payment->setCollection($paymentCollection);
				$paymentCollection->addItem($payment);
			}
		}

		return $paymentCollection;
	}


	/**
	 * @return float
	 */
	public function getPaidSum()
	{
		$sum = 0;
		if (!empty($this->collection) && is_array($this->collection))
		{
			/** @var Payment $payment */
			foreach ($this->collection as $payment)
			{
				if ($payment->getField('PAID') == "Y")
				{
					$sum += $payment->getSum();
				}
			}
		}

		return $sum;
	}

	/**
	 * @return float
	 */
	public function getSum()
	{
		$sum = 0;
		if (!empty($this->collection) && is_array($this->collection))
		{
			/** @var Payment $payment */
			foreach ($this->collection as $payment)
			{
				$sum += $payment->getSum();
			}
		}

		return $sum;
	}

	/**
	 * @return bool
	 */
	public function hasPaidPayment()
	{
		if (!empty($this->collection) && is_array($this->collection))
		{
			/** @var Payment $payment */
			foreach ($this->collection as $payment)
			{
				if ($payment->getField('PAID') == "Y")
					return true;
			}
		}

		return false;
	}

	/**
	 * @return Entity\Result
	 * @throws Main\ObjectNotFoundException
	 */
	public function save()
	{
		$result = new Entity\Result();

		/** @var Order $order */
		if (!$order = $this->getOrder())
		{
			throw new Main\ObjectNotFoundException('Entity "Order" not found');
		}

		$itemsFromDb = array();
		if ($this->getOrder()->getId() > 0)
		{
			$itemsFromDbList = static::getList(
				array(
					"filter" => array("ORDER_ID" => $this->getOrder()->getId()),
					"select" => array("ID", "PAY_SYSTEM_NAME", "PAY_SYSTEM_ID")
				)
			);
			while ($itemsFromDbItem = $itemsFromDbList->fetch())
				$itemsFromDb[$itemsFromDbItem["ID"]] = $itemsFromDbItem;
		}

		$changeMeaningfulFields = array(
			"PAID",
			"PAY_SYSTEM_ID",
			"PAY_SYSTEM_NAME",
			"SUM",
			"IS_RETURN",
			"ACCOUNT_NUMBER",
			"EXTERNAL_PAYMENT",
		);

		/** @var Payment $payment */
		foreach ($this->collection as $payment)
		{
			$isNew = (bool)($payment->getId() <= 0);
			$isChanged = $payment->isChanged();

			if ($order->getId() > 0 && $isChanged)
			{
				$logFields = array();

				$fields = $payment->getFields();
				$originalValues = $fields->getOriginalValues();

				foreach($originalValues as $originalFieldName => $originalFieldValue)
				{
					if (in_array($originalFieldName, $changeMeaningfulFields) && $payment->getField($originalFieldName) != $originalFieldValue)
					{
						$logFields[$originalFieldName] = $payment->getField($originalFieldName);
						if (!$isNew)
							$logFields['OLD_'.$originalFieldName] = $originalFieldValue;
					}
				}
			}

			$r = $payment->save();
			if ($r->isSuccess())
			{
				if ($order->getId() > 0)
				{
					if ($isChanged)
					{
						$registry = Registry::getInstance(static::getRegistryType());

						/** @var OrderHistory $orderHistory */
						$orderHistory = $registry->getOrderHistoryClassName();
						$orderHistory::addLog(
							'PAYMENT',
							$order->getId(),
							$isNew ? 'PAYMENT_ADD' : 'PAYMENT_UPDATE',
							$payment->getId(),
							$payment,
							$logFields,
							$orderHistory::SALE_ORDER_HISTORY_LOG_LEVEL_1
						);
						
						$orderHistory::addAction(
							'PAYMENT',
							$order->getId(),
							"PAYMENT_SAVED",
							$payment->getId(),
							$payment,
							array(),
							OrderHistory::SALE_ORDER_HISTORY_ACTION_LOG_LEVEL_1
						);
					}

				}
			}
			else
			{
				$result->addErrors($r->getErrors());
			}

			if (isset($itemsFromDb[$payment->getId()]))
				unset($itemsFromDb[$payment->getId()]);
		}

		if (self::$eventClassName === null)
		{
			/** @var Payment $paymentClassName */
			$paymentClassName = static::getItemCollectionClassName();
			self::$eventClassName = $paymentClassName::getEntityEventName();
		}

		foreach ($itemsFromDb as $k => $v)
		{
			$v['ENTITY_REGISTRY_TYPE'] = static::getRegistryType();

			/** @var Main\Event $event */
			$event = new Main\Event('sale', "OnBefore".self::$eventClassName."Deleted", array(
					'VALUES' => $v,
			));
			$event->send();

			static::deleteInternal($k);

			/** @var Main\Event $event */
			$event = new Main\Event('sale', "On".self::$eventClassName."Deleted", array(
					'VALUES' => $v,
			));
			$event->send();

			if ($order->getId() > 0)
			{
				$registry = Registry::getInstance(static::getRegistryType());

				/** @var OrderHistory $orderHistory */
				$orderHistory = $registry->getOrderHistoryClassName();
				$orderHistory::addAction('PAYMENT', $order->getId(), 'PAYMENT_REMOVE', $k, null, array(
					"PAY_SYSTEM_NAME" => $v["PAY_SYSTEM_NAME"],
					"PAY_SYSTEM_ID" => $v["PAY_SYSTEM_ID"],
				));

				$registry = Registry::getInstance(static::getRegistryType());

				/** @var EntityMarker $entityMarker */
				$entityMarker = $registry->getEntityMarkerClassName();
				$entityMarker::deleteByFilter(array(
					 '=ORDER_ID' => $order->getId(),
					 '=ENTITY_TYPE' => $entityMarker::ENTITY_TYPE_PAYMENT,
					 '=ENTITY_ID' => $k,
				));
			}

		}

		if ($order->getId() > 0)
		{
			$registry = Registry::getInstance(static::getRegistryType());

			/** @var OrderHistory $orderHistory */
			$orderHistory = $registry->getOrderHistoryClassName();
			$orderHistory::collectEntityFields('PAYMENT', $order->getId());
		}

		return $result;
	}

	/**
	 * @return Payment|bool
	 * @throws Main\ObjectNotFoundException
	 */
	public function getInnerPayment()
	{
		/** @var Order $order */
		if (!$order = $this->getOrder())
		{
			throw new Main\ObjectNotFoundException('Entity "Order" not found');
		}

		if ($paySystemId = PaySystem\Manager::getInnerPaySystemId())
		{
			/** @var Payment $payment */
			foreach ($this->collection as $payment)
			{
				if ($payment->getPaymentSystemId() == $paySystemId)
					return $payment;
			}
		}

		return false;
	}

	/**
	 * @return Payment|bool
	 * @throws Main\ObjectNotFoundException
	 */
	public function createInnerPayment()
	{
		$payment = $this->getInnerPayment();
		if ($payment)
		{
			return $payment;
		}

		$paySystemId = PaySystem\Manager::getInnerPaySystemId();
		if (!empty($paySystemId))
		{
			/** @var Service $paySystem */
			$paySystem = Manager::getObjectById($paySystemId);
			if ($paySystem)
			{
				return $this->createItem($paySystem);
			}
		}

		return false;
	}

	/**
	 * @return int
	 */
	public static function getInnerPaySystemId()
	{
		return PaySystem\Manager::getInnerPaySystemId();
	}

	/**
	 * @return bool
	 */
	public function isExistsInnerPayment()
	{
		if ($paySystemId = PaySystem\Manager::getInnerPaySystemId())
		{
			/** @var Payment $payment */
			foreach ($this->collection as $payment)
			{
				if ($payment->getPaymentSystemId() == $paySystemId)
					return true;
			}
		}

		return false;
	}

	/**
	 * @return Result
	 * @throws Main\ObjectNotFoundException
	 */
	public function verify()
	{
		$result = new Result();

		/** @var Payment $payment */
		foreach ($this->collection as $payment)
		{
			$r = $payment->verify();
			if (!$r->isSuccess())
			{
				$result->addErrors($r->getErrors());
				
				/** @var Order $order */
				if (!$order = $this->getOrder())
				{
					throw new Main\ObjectNotFoundException('Entity "Order" not found');
				}

				$registry = Registry::getInstance(static::getRegistryType());

				/** @var EntityMarker $entityMarker */
				$entityMarker = $registry->getEntityMarkerClassName();
				$entityMarker::addMarker($order, $payment, $r);
				$order->setField('MARKED', 'Y');
			}
		}
		return $result;
	}

	/**
	 * @internal
	 * @param \SplObjectStorage $cloneEntity
	 *
	 * @return PaymentCollection
	 */
	public function createClone(\SplObjectStorage $cloneEntity)
	{
		if ($this->isClone() && $cloneEntity->contains($this))
		{
			return $cloneEntity[$this];
		}
		
		$paymentCollectionClone = clone $this;
		$paymentCollectionClone->isClone = true;

		if ($this->order)
		{
			if ($cloneEntity->contains($this->order))
			{
				$paymentCollectionClone->order = $cloneEntity[$this->order];
			}
		}

		if (!$cloneEntity->contains($this))
		{
			$cloneEntity[$this] = $paymentCollectionClone;
		}

		/**
		 * @var int key
		 * @var Payment $payment
		 */
		foreach ($paymentCollectionClone->collection as $key => $payment)
		{
			if (!$cloneEntity->contains($payment))
			{
				$cloneEntity[$payment] = $payment->createClone($cloneEntity);
			}

			$paymentCollectionClone->collection[$key] = $cloneEntity[$payment];
		}

		return $paymentCollectionClone;
	}

	/**
	 * Is the entire collection of marked
	 *
	 * @return bool
	 */
	public function isMarked()
	{
		if (!empty($this->collection) && is_array($this->collection))
		{
			/** @var Payment $payment */
			foreach ($this->collection as $payment)
			{
				if ($payment->isMarked())
					return true;
			}
		}

		return false;
	}

	/**
	 * @param $primary
	 * @return Entity\DeleteResult
	 */
	protected function deleteInternal($primary)
	{
		return Internals\PaymentTable::delete($primary);
	}

	/**
	 * @return string
	 */
	private static function getItemCollectionClassName()
	{
		$registry = Registry::getInstance(static::getRegistryType());
		return $registry->getPaymentClassName();
	}

	/**
	 * @param array $parameters
	 * @return Main\DB\Result
	 */
	public static function getList(array $parameters = array())
	{
		return Internals\PaymentTable::getList($parameters);
	}
}
