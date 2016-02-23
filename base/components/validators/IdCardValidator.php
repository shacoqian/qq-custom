<?php

/**
 * 身份证验证规则
 *
 * @author 001425
 */
class IdCardValidator extends CValidator {

    public $allowEmpty = FALSE;
    protected $pattern_fiften = "~^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$~";  //15位数
    protected $pattern_eighten = "~^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{4}$~";   //18位数

    protected function validateAttribute($object, $attribute) {
        $value = $object->$attribute;
        if ($this->allowEmpty && $this->isEmpty($value)) {
            return;
        }
        if (is_array($value) ||
            ((!preg_match($this->pattern_fiften, $value) &&
            !preg_match($this->pattern_eighten, $value)))) {
            $message = $this->message !== null ? $this->message : Yii::t('yii', '{attribute} is invalid.');
            $this->addError($object, $attribute, $message);
        }
    }

}
