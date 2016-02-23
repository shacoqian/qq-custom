<?php

/**
 * 扩展共用
 */


Yii::import('base.extensions.mailer.*');

class Mailers extends SmtpMailer
{
	public function send($to, $subject, $message)
	{
		parent::send($to, $subject, $message);
	}
}