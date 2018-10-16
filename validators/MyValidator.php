<?php
/**
 * Created by PhpStorm.
 * User: Alena
 * Date: 16.10.2018
 * Time: 2:05
 */

namespace app\validators;


use yii\validators\Validator;

class MyValidator extends Validator
{
    public function myValidate($model, $attribute)
    {
        $attributeValue = $model->$attribute;
        if (!is_string($attributeValue)) {
            $this->addError($model, $attribute, 'Значения должны быть строкой');
        }
    }
}