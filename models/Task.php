<?php


namespace app\models;

use yii\base\Model;
//use app\validators\MyValidator;

class Task extends Model{

    public $welcome;
    public $sayHello;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['welcome', 'sayHello'], 'app\\validators\\MyValidator'],
        ];
    }

   // public function myValidate($model, $attribute)
   // {
    //    $attributeValue = $model->$attribute;
     //   if (!is_string($attributeValue)) {
     //       $this->addError($model, $attribute, 'Значения должны быть строкой');
     //   }
   // }
}


