<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
abstract class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * @desc 获取get和 post的参数  可能会出现覆盖
     */
    public function getParam($key, $defaultValue = null) {
        return $defaultValue ? Yii::app()->request->getParam($key, $defaultValue) : Yii::app()->request->getParam($key);
    }

    /**
     * @desc 获取get和 post的参数
     */
    public function get($key, $defaultValue = null) {
        return $defaultValue ? Yii::app()->request->getQuery($key, $defaultValue) : Yii::app()->request->getQuery($key);
    }

    /**
     * @desc	获取信息客户端POST请求
     */
    public function getPost($key, $defaultValue = null) {
        return $defaultValue ? Yii::app()->request->getPost($key, $defaultValue) : Yii::app()->request->getPost($key);
    }

    /**
     * @desc 是否POST请求
     */
    public function isPost() {
        return Yii::app()->request->isPostRequest;
    }

    /**
     * @desc 是否ajax请求
     */
    public function isAjaxRequest() {
        return Yii::app()->request->isAjaxRequest;
    }

    public function baseUrl() {
        return Yii::app()->request->baseUrl;
    }

}

?>