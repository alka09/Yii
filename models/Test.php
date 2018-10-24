<?php


namespace app\models;

use app\behaviors\MyBehavior;
use app\events\TestFooEvent;
use yii\base\Model;

class Test extends Model
{
    public $title;
    public $content;

    const EVENT_FOO_START = 'foo_start';
    const EVENT_FOO_END = 'foo_end';

    public function rules()
    {
        return [
            [['title'], 'myValidate'],
            [['content'], 'safe']
        ];
    }

    public function behaviors()
    {
        return [
            'my' => [
                'class' => MyBehavior::class,
                'message' => 'hello, world'
                ]
        ];
    }

    public function myValidate($attribute, $params)
    {
        if ($this->$attribute != 'test') {
            $this->addError($attribute, 'Наша валидация не прошла');
        }
    }

    public function fields()
    {
        return [
            'name' => 'title'
        ];
    }

    public function foo()
    {

        $event = new TestFooEvent();
        $event->message = date("Y-m-d");

        $this->trigger(static::EVENT_FOO_START, $event);
        echo "действие 1 <br>";
        echo "действие 2 <br>";
        echo "действие 3 <br>";
        $this->trigger(static::EVENT_FOO_END);

    }

}


