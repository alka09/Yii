<?php
/**
 * Created by PhpStorm.
 * User: Alena
 * Date: 25.10.2018
 * Time: 2:54
 */

namespace app\components;

use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\base\Component;
use yii\base\Event;


class EventsComponent extends Component
{

    public function init()
    {
        parent::init();

        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function (Event $event) {
            $model = $event->sender;

            $user = Users::findOne($model->user_id);
            $message = "Уважаемый {$user->login}! На вас поставлена новая задача {$model->name}. Дедлайн до {$model->date}";


            \Yii::$app->mailer->compose()
                ->setTo($user->email)
                //->setFrom([$this->email => $this->name])
                ->setSubject("New Task")
                ->setTextBody($message)
                ->send();
        });
    }
}