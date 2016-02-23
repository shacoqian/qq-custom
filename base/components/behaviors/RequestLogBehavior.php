<?php

/**
 * http请求 行为类
 * 记录日志
 */
abstract class RequestLogBehavior extends CBehavior {

    /**
     * 日志保存路径, 使用yii路径别名格式
     * @var string
     */
    public $requestLogSavePath;

    public function events() {
        return array_merge(
            parent::events(), array(
            'onRequestLogRecord' => 'saveRequestLog',
            )
        );
    }

    /**
     * 将日志记录到文件中
     * @param obj $event
     */
    abstract public function saveRequestLog($event);
}
