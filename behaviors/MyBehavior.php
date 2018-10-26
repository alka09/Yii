<?php

namespace app\behaviors;

use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $message = 'message';

    public function bar() {
        echo $this->message . $this->owner->title;
    }

}