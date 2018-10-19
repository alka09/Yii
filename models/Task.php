<?php


namespace app\models;

use yii\base\Model;
//use app\validators\MyValidator;

class Task extends Model{

    public $title;
    public $content;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title'], 'myValidator'],
            [['content'], 'safe']
        ];
    }

    public function myValidate($attribute, $params)
    {
        if ($this->$attribute !='task') {
            $this->addError($attribute, 'Валидация не прошла!');
        }
    }

    public function fields()
    {
        return [
          'name' =>'title'
        ];
    }
}


