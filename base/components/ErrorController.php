<?php

class ErrorController extends Controller {

    public function actionError() {
        $error = Yii::app()->errorHandler->error;

        if ($error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                //错误处理
                echo $error['message'];
            }
        }
    }

}
