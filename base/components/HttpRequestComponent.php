<?php

/**
 * http请求组件, 可用于接口访问, 只能被继承，不能被实例化
 * (需要php_curl支持)
 */
abstract class HttpRequestComponent extends CApplicationComponent {

    /**
     * 请求路径, 一般设置为域名
     * @var string
     */
    public $requestBaseUrl;

    /**
     * 请求时验证数据
     * @var string
     */
    public $requestTokenData;

    /**
     * 请求验证key，与验证数据一起使用
     * @var string
     */
    public $requestTokenMark = 'php_push_token';

    /**
     * 请求过期时间
     * @var int
     */
    public $requestTimeOut = 30;

    /**
     * 是否调试
     * @var boolean
     */
    public $requestDebug = false;

    /**
     * 会话数据，记录从开始到结束的数据信息, 用于日志记录
     * @var array
     */
    protected $requestInformation = array('request_start_time' => '', 'request_url' => '', 'request_data' => '',
        'response_data' => '', 'request_end_time' => '', 'curl_request_info' => '');

    /**
     * curl新会话
     * @var curl对象
     */
    public $requestHandler;

    /**
     * 组件初始化
     * @see CApplicationComponent::init()
     */
    public function init() {
        parent::init();
        $this->requestHandler = curl_init();
    }

    /**
     * 设置会话数据
     * @param string $key
     * @param string $value
     */
    protected function setRequestInformation($key, $value) {
        $this->requestInformation[$key] = $value;
    }

    /**
     * 获得请求完整路径
     * @param string $request_path
     * @return string
     */
    protected function buildRequestUrl($request_path) {
        $request_url = sprintf('%s%s', $this->requestBaseUrl, $request_path);

        $this->setRequestInformation('request_url', $request_url);

        return $request_url;
    }

    /**
     * 生成请求验证数据
     * @return array
     */
    protected function buildRequestToken() {
        return array($this->requestTokenMark => $this->requestTokenData);
    }

    /**
     * 生成请求数据，包括验证信息
     * @param array $request_data
     * @return string 返回处理后的请求数据
     */
    protected function buildRequestData($request_data) {
        $_request_data = http_build_query(array_merge($request_data, $this->buildRequestToken()));

        $this->setRequestInformation('request_data', $_request_data);

        return $_request_data;
    }

    /**
     * 处理请求返回数据
     * @param string $response_data
     * @return string 返回处理后的数据
     */
    protected function handlerResponseData($response_data) {
        //$decode_response_data = json_decode($response_data, TRUE, 512, JSON_BIGINT_AS_STRING);
        $decode_response_data = json_decode($response_data, TRUE, 512);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $response_data;
        }

        Yii::import('base.vendor.debug.RequestDebug');
        if (RequestDebug::isSupportDebug()) {
            $debug_info = array(
                'request_url' => $this->requestInformation['request_url'],
                'request_data' => $this->requestInformation['request_data'],
                'response_data' => $decode_response_data
            );

            RequestDebug::debug($debug_info);
        }

        return $decode_response_data;
    }

    /**
     * 真正执行请求数据操作，并记录日志
     * @param string $request_path
     * @param array $request_data
     * @return Ambigous <string, string, mixed>
     */
    protected function doRequest($request_path, array $request_data) {
        $this->setRequestInformation('request_start_time', date('Y-m-d H:i:s'));

        curl_setopt($this->requestHandler, CURLOPT_HEADER, $this->requestDebug);
        curl_setopt($this->requestHandler, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($this->requestHandler, CURLOPT_TIMEOUT, $this->requestTimeOut);

        $response_data = $this->handlerResponseData(curl_exec($this->requestHandler));

        $this->setRequestInformation('response_data', $response_data);
        $this->setRequestInformation('request_end_time', date('Y-m-d H:i:s'));
        $this->setRequestInformation('curl_request_info', curl_getinfo($this->requestHandler));


        //记录日志
        $this->onRequestLogRecord();
        return $response_data;
    }

    /**
     * POST请求
     * @param unknown $request_path
     * @param array $request_data
     * @return Ambigous <Ambigous, string, string, mixed>
     */
    public function postRequest($request_path, array $request_data) {
        curl_setopt($this->requestHandler, CURLOPT_URL, $this->buildRequestUrl($request_path));
        curl_setopt($this->requestHandler, CURLOPT_POST, true);
        curl_setopt($this->requestHandler, CURLOPT_POSTFIELDS, $this->buildRequestData($request_data));

        return $this->doRequest($request_path, $request_data);
    }

    /**
     * GET请求
     * @param unknown $request_path
     * @param array $request_data
     * @return Ambigous <Ambigous, string, string, mixed>
     */
    public function getRequest($request_path, array $request_data) {
        curl_setopt($this->requestHandler, CURLOPT_URL, $this->buildRequestUrl($request_path) . '?' . $this->buildRequestData($request_data));

        return $this->doRequest($request_path, $request_data);
    }

    /**
     * 附加处理日志事件
     */
    protected function onRequestLogRecord() {
        if ($this->hasEventHandler('onRequestLogRecord')) {
            $this->raiseEvent('onRequestLogRecord', new CEvent($this->requestInformation));
        }
    }

    /**
     * 此处关闭curl资源
     */
    public function __destruct() {
        //parent::__destruct();
        curl_close($this->requestHandler);
    }

}
