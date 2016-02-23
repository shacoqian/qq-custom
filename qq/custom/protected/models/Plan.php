<?php
/**
 *plan 数据模型 
 */
class Plan extends ActiveRecord {
		
	public static function  model($className = __CLASS__) {
		return parent::model($className);
	}
	
	/**
	 * 表名	
	 */
	public function tableName() {
		return 'plan';
	}
	
	
	
	public function rules() {
		return array(
			array('u_id, p_title, p_content','safe'),
		);
	}
	
	/**
	 * 规则
	 */
	public function relations()
    {
        return array(
            'user'=>array(self::BELONGS_TO, 'Users',  'u_id'),
        );
    }
	
	
	
}