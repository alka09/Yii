<?php
namespace app\models;

use Yii;
use yii\base\Model;

class CartProduct extends Model
{
    public $name;
    public $description;
    public $price;
    public $producer;
    public $img;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'producer'], 'required'],
            [['name', 'description', 'producer'], 'string'],
            ['price', 'int']
        ];
    }

    /**
     * @return array customizes attribute labels
     */
    public function attributeLabels()
    {
        return [
         'description' => 'Описание товара',
            'price' => 'Цена',
            'producer' => 'Производитель'
        ];
    }
}
