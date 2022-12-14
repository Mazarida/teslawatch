<?php
namespace Bitrix\Mail\ImapCommands;

use Bitrix\Mail;
use Bitrix\Main;
use Bitrix\Main\Entity\ReferenceField;

class Repository
{
	private $mailboxId;
	private $messagesIds;

	public function __construct($mailboxId, $messagesIds)
	{
		$this->mailboxId = $mailboxId;
		$this->messagesIds = $messagesIds;
	}

	public function getMailbox()
	{
		return Mail\MailboxTable::getUserMailbox($this->mailboxId);
	}

	public function deleteOldMessages($folderCurrentName)
	{
		$connection = Main\Application::getInstance()->getConnection();
		$sqlHelper = $connection->getSqlHelper();
		$sql = 'DELETE from ' . Mail\MailMessageUidTable::getTableName() .
			' WHERE MAILBOX_ID = ' . intval($this->mailboxId) .
			" AND DIR_MD5 = '" . $sqlHelper->forSql(md5($folderCurrentName)) . "'" .
			' AND MSG_UID = 0;';
		$connection->query($sql);
		return $connection->getAffectedRowsCount();
	}

	public function markMessagesUnseen($messages, $mailbox)
	{
		$this->setMessagesSeen('N', $messages, $mailbox);
	}

	public function markMessagesSeen($messages, $mailbox)
	{
		$this->setMessagesSeen('Y', $messages, $mailbox);
	}

	protected function setMessagesSeen($isSeen, $messages, $mailbox)
	{
		$messagesIds = [];
		foreach ($this->messagesIds as $index => $messageId)
		{
			$messagesIds[$index] = $messageId;
		}
		if (empty($messagesIds) || empty($messages) || empty($mailbox))
		{
			return;
		}
		$mailsData = [];
		foreach ($messages as $messageData)
		{
			$mailsData[] = [
				'HEADER_MD5' => $messageData['HEADER_MD5'],
				'MAILBOX_USER_ID' => $mailbox['USER_ID'],
				'MAILBOX_OPTIONS' => $mailbox['OPTIONS'],
				'IS_SEEN' => $isSeen,
			];
		}
		Mail\MailMessageUidTable::updateList(
			[
				'MAILBOX_ID' => intval($this->mailboxId),
				'@ID' => $messagesIds,
			],
			[
				'IS_SEEN' => $isSeen,
			],
			$mailsData
		);
	}

	public function updateMessageFieldsAfterMove($messages, $folderNewName, $mailbox)
	{
		$messagesIds = [];
		foreach ($messages as $message)
		{
			$messagesIds[] = $message['ID'];
		}
		if (empty($messagesIds))
		{
			return;
		}
		$mailsData = [];
		foreach ($messages as $messageData)
		{
			$mailsData[] = [
				'HEADER_MD5' => $messageData['HEADER_MD5'],
				'MAILBOX_USER_ID' => $mailbox['USER_ID'],
				'MAILBOX_OPTIONS' => $mailbox['OPTIONS'],
			];
		}
		Mail\MailMessageUidTable::updateList(
			[
				'MAILBOX_ID' => intval($this->mailboxId),
				'@ID' => $messagesIds,
			],
			[
				'MSG_UID' => 0,
				'DIR_MD5' => md5($folderNewName),
			],
			$mailsData
		);
	}

	public function addMailsToBlacklist($blacklistMails, $userId)
	{
		$result = new Main\Result();
		$result->setData([Mail\BlacklistTable::addMailsBatch($blacklistMails, $userId)]);
		return $result;
	}

	public function deleteMailsCompletely($messagesToDelete)
	{
		$ids = array_map(
			function ($mail)
			{
				return intval($mail['MESSAGE_ID']);
			},
			$messagesToDelete
		);
		if (empty($ids))
		{
			return;
		}

		Mail\MailMessageUidTable::deleteList(
			[
				'@MESSAGE_ID' => $ids,
			]
		);
		$connection = Main\Application::getInstance()->getConnection();
		$connection->query(
			'DELETE from ' . Mail\MailMessageTable::getTableName() .
			' WHERE ID IN (' . implode(',', $ids) . ');'
		);
	}

	public function getMessages()
	{
		if (empty($this->messagesIds))
		{
			return [];
		}
		$messages = [];
		$messagesSelected = Mail\MailMessageUidTable::query()
			->addSelect('MESSAGE_ID')
			->where('MAILBOX_ID', $this->mailboxId)
			->whereIn('ID', $this->messagesIds)
			->whereNot('MSG_UID', 0)
			->where('MESSAGE_ID', '>', 0)
			->exec()
			->fetchAll();
		if ($messagesSelected)
		{
			$messagesSelectedIds = array_map(
				function ($item)
				{
					return $item['MESSAGE_ID'];
				},
				$messagesSelected
			);
			if (empty($messagesSelectedIds))
			{
				return [];
			}
			$messages = Mail\MailMessageUidTable::query()
				->registerRuntimeField(
					'',
					new ReferenceField(
						'ref',
						Mail\MailMessageTable::class,
						['=this.MESSAGE_ID' => 'ref.ID']
					)
				)
				->addSelect('ID')
				->addSelect('MAILBOX_ID')
				->addSelect('DIR_MD5')
				->addSelect('DIR_UIDV')
				->addSelect('MSG_UID')
				->addSelect('HEADER_MD5')
				->addSelect('IS_SEEN')
				->addSelect('SESSION_ID')
				->addSelect('MESSAGE_ID')
				->addSelect('ref.FIELD_FROM', 'FIELD_FROM')
				->whereIn('MESSAGE_ID', $messagesSelectedIds)
				->where('MAILBOX_ID', $this->mailboxId)
				->whereNot('MSG_UID', 0)
				->exec()
				->fetchAll();
		}

		return $messages;
	}
}