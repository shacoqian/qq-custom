<?php
/**
 *users 数据模型 
 */
class Tongji extends ActiveRecord {
	
	
	
    public static function  model($className = __CLASS__) {
            return parent::model($className);
    }

    /**
     * 表名	
     */
    public function tableName() {
            return 'tongji';
    }

    public function rules() {
            return array(
                    array('qq,nickname,refer,url,city,isp,ctime,ip','safe'),
            );
    }

	
    /**
     * 规则
     */
    public function relations()
    {
        return array(
            'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
            'categories'=>array(self::MANY_MANY, 'Category',
                'tbl_post_category(post_id, category_id)'),
        );
    }
    
    public function getTotals($domain_id,$custom_status) {
         $query = ' select count(*) as count from tongji t left join qq q on t.qq_id = q.q_id where t.domain_id ='.$domain_id 
                .($custom_status != -1 ? ' and c_status = ' .$custom_status :'').' order by t.id ';
        return Yii::app()->db->createCommand($query)->queryRow();
    }
    
    public function getDatas($domain_id,$custom_status ,$page=1) {
        $query = ' select t.* , q.qq, q.nick from tongji t left join qq q on t.qq_id = q.q_id where t.domain_id ='.$domain_id 
                .($custom_status != -1 ? ' and c_status = ' .$custom_status :'').' order by t.ctime desc limit '. ($page-1)*10 .', 10' ;
        return Yii::app()->db->createCommand($query)->queryAll();
    }
}