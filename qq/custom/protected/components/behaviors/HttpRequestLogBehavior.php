<?php
/**
 * http请求 行为类
 * 记录日志
 */
class HttpRequestLogBehavior extends CBehavior
{
	/**
	 * 日志保存路径, 使用yii路径别名格式
	 * @var string
	 */
	public $requestLogSavePath;
	
	public function events()
	{
		return array_merge(
			parent::events(),
			array(
				'onRequestLogRecord' => 'saveRequestLog',
			)
		);
	}
	
	/**
	 * 将日志记录到文件中
	 * @param obj $event
	 */
	public function saveRequestLog($event)
	{
		$save_path = Yii::getPathOfAlias($this->requestLogSavePath);
		@mkdir($save_path, 0777, TRUE);
		
		$separator = "\n" . str_repeat('/', 80) . "\n";
		
		$save_file = $save_path . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
		file_put_contents($save_file, var_export($event->sender, TRUE) . $separator, FILE_APPEND);
	}
}