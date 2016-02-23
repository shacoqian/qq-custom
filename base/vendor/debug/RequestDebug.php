<?php

/**
 * 请求调试
 */
class RequestDebug {

    public static $debugSign = 'debug information';

    public static function debug($debug_info) {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('~Chrome|AppleWebKit~i', $user_agent)) {
            //self::chrome($debug_info);
        } else if (preg_match('~firefox~i', $user_agent)) {
            self::firefox($debug_info);
        } else
            ;
    }

    /**
     * 是否支持调试
     * @return boolean
     */
    public static function isSupportDebug() {
        return ((RUN_ENVIRONMENT == 'offline') || (preg_match('~172\.16\.10\.\d+~', Yii::app()->request->getHostInfo())));
    }

    public static function firefox($debug_info) {

        if (!class_exists('FB', FALSE))
            include (realpath(Yii::getPathOfAlias('base.extensions.debug.firephp')) . DIRECTORY_SEPARATOR . 'fb.php');

        //调试信息
        FB::group(self::$debugSign);
        FB::info($debug_info);

        FB::groupEnd(self::$debugSign);
    }

    public static function chrome($debug_info) {
        if (!class_exists('PhpConsole', FALSE))
            include (realpath(Yii::getPathOfAlias('base.extensions.debug.phpConsole')) . DIRECTORY_SEPARATOR . '__autoload.php');

        PhpConsole\Helper::register();
        PC::bebug($debug_info, self::$debugSign);
    }

}
