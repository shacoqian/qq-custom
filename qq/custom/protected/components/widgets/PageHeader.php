<?php

Yii::import('base.components.widgets.Widgets');

class PageHeader extends Widgets {
    public $pageTitle = '';
    
    public function run() {
        $this->render('pageHeader',array('pageTitle'=>$this->pageTitle));
    }
}