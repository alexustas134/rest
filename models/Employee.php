<?php

namespace app\models;

use Yii;


class Employee extends \yii\db\ActiveRecord
{



	//const SCENARIO_CREATE = 'create';

    public static function tableName()
    {
        return 'employee';
    }


    public function rules()
    {
        return [
            //[['name', 'email', 'country'], 'required'],
            //[['name', 'email', 'country', 'status'], 'string', 'max' => 255],
            [['name', 'email', 'country', 'status', 'names'], 'safe'],
            [['created_at', 'modify_at'], 'safe'],
        ];
    }


   /* public function scenarios()
    {
    	$scenarios = parent::scenarios();
    	$scenarios['create'] = ['name', 'email', 'country'];
    	return $scenarios;
    }*/

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'country' => 'Country',
	        'status' => 'Статус',
        ];
    }
}
