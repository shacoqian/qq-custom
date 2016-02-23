<?php
/**
 * 所有的模型应当继承此类
 * 
 * 不推荐写复杂的方法
 * 
 * @author 001425
 *
 */
abstract class ActiveRecord extends CActiveRecord
{
	public function getAll()
	{
		return $this->findAll();
	}
}