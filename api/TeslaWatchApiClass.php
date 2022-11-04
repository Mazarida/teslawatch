<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");

class TeslaWatchApi
{
    public $apiVersion = '';
//    public $apiName = '';

    private $method = ''; //GET|POST|PUT|DELETE

    public $requestUri = [];
    public $requestParams = [];

    private $action = ''; //Название метода для выполнения

    public function __construct()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        //Массив GET параметров разделенных слешем
        $this->requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->requestParams = $_REQUEST;

        //Определение метода запроса
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method !== 'POST') {
            throw new RuntimeException('Invalid Method', 405);
        }
        //print_r($_SERVER);
    }

    public function run()
    {
        //Первые 2 элемента массива URI должны быть "api" и версия api
        if (mb_strtolower(array_shift($this->requestUri), 'utf-8') !== 'api') {
            throw new RuntimeException('API Not Found', 404);
        }

        $this->apiVersion = mb_strtolower(array_shift($this->requestUri), 'utf-8');
        if (!$this->apiVersion) {
            throw new RuntimeException('API Version Not Detect', 404);
        }

        //Определение действия для обработки
        $this->action = $this->getAction(mb_strtolower($this->requestParams['action'], 'utf-8'));

        //print_r($this->requestUri);
        //print_r($this->requestParams);

        //Если метод(действие) определен
        if ($this->action && method_exists($this, $this->action)) {
            return $this->{$this->action}();
        } else {
            throw new RuntimeException('Invalid Action', 405);
        }
    }

    private function response($data, $status = 500)
    {
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data);
    }

    private function requestStatus($code)
    {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code]) ? $status[$code] : $status[500];
    }

    private function getAction($action)
    {
        switch ($action) {
            case 'registration':
                return 'getReg';
                break;
            case 'auth':
                return 'getAuth';
                break;
            case 'device':
                return 'getDevice';
                break;
            default:
                return null;
        }
    }

    private function getReg()
    {
        return $this->response(array("data" => "registration"), 200);
    }

    private function getAuth()
    {
        return $this->response(array("data" => "authorization"), 200);
    }

    private function getDevice()
    {
        return $this->response(array("data" => "get_device"), 200);
    }
}