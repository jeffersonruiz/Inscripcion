<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rol".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property User[] $users
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre','descripcion'], 'required'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 255],
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
    public function getUsers()
    {
        // rol_id atributo de la tabla hija (Foreign key)
        // id atributo de la tabla padre (Primary key)
        return $this->hasMany(User::className(), ['rol_id' => 'id']);
    }
    
    public static  function  getListaRoles(){
        $roles = Rol::find()->orderBy('nombre')->asArray()->all();
        $listaroles = ArrayHelper::map($roles, 'id', 'nombre');
        return $listaroles;
    }
    
}
