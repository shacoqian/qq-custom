<?php
/**
 *users 数据模型 
 */
class User extends ActiveRecord {
	
	public $uname;
        public $upass;
	
	public static function  model($className = __CLASS__) {
		return parent::model($className);
	}
	
	/**
	 * 表名	
	 */
	public function tableName() {
		return 'user';
	}
	
	public function rules() {
		return array(
			array('uname, upass','safe'),
		);
	}

	
	/**
	 * 规则
	 */
        /*
	public function relations()
    {
        return array(
            'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
            'categories'=>array(self::MANY_MANY, 'Category',
                'tbl_post_category(post_id, category_id)'),
        );
    }
	*/
	
	
}