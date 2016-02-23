<?php

Yii::import('base.components.widgets.Widgets');

class Header extends Widgets {
    public function run() {
        $this->render('header');
    }
}