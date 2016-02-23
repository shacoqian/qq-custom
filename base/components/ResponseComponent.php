<?php

/**
 * 输出类
 */
abstract class ResponseComponent extends CApplicationComponent {

    public static function json($data) {
        self::output(self::encode($data));
    }

    public static function output($data, $outputType = 'json') {
        //在页面执行没有问题的情况下，避免在开发环境下，将调试信息输出。
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        ob_start();
        switch ($outputType) {
            case 'json':
                header('Content-Type:application/json');
                break;
            case 'xml':
                header('Content-Type:application/xml');
                break;
            default :
                header('Content-Type:text/html');
        }
        echo $data;
        ob_end_flush();
    }

    public static function jsonp($data) {
        $data = self::encode($data);
        $callback = self::fetchCallBack();
        $output = "{$callback}({$data})";

        self::output($output);
    }

    public static function encode($data) {
        if (!is_resource($data)) {
            $encode_data = json_encode($data);
            if (json_last_error() == JSON_ERROR_NONE)
                return $encode_data;

            return '[]';
        }
    }

    public static function fetchCallBack() {
        $callbak = Yii::app()->request->getParam('callback');
        if (preg_match('#^\w+$#', $callbak))
            return $callbak;

        return 'callback';
    }

}
