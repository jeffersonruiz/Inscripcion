<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Operacion[] $operacions
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre','descripcion'], 'required'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 250],
            [['nombre'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacions()
    {
        return $this->hasMany(Operacion::className(), ['menu_id' => 'id']);
    }
    
    public static  function  getListaMenus(){
        $menus = Menu::find()->orderBy('nombre')->asArray()->all();
        $listamenus = ArrayHelper::map($menus, 'id', 'nombre');
        return $listamenus;
    }
    
}
