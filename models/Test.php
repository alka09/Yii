<?php


namespace app\models;

use Yii;
use yii\base\Model;


class Test extends Model
{

    public $title;
    public $content;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title'], 'myValidate'],
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


