<?php

/**
 *
 */
Yii::import('base.components.HttpRequestComponent');

class HttpRequest extends HttpRequestComponent
{
	public function behaviors()
	{
		return array(
			'HttpRequestLogBehavior' => array(
				'class' => 'application.components.behaviors.HttpRequestLogBehavior',
				'requestLogSavePath' => 'webroot.runtime.logs.http',
			),
		);
	}
	
	public function init()
	{
		$this->behaviors = $this->behaviors();
		parent::init();
	}
	
}

/* /community/wuye_system/protected/components/WuyeHttpRequestComponent.php */