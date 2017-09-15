<?php

namespace backend\models;

use Yii;
use backend\models\Menu;

/**
 * This is the model class for table "rol_operacion".
 *
 * @property integer $rol_id
 * @property integer $operacion_id
 *
 * @property Operacion $operacion
 * @property Rol $rol
 */
class RolOperacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $menu_id;
    
    public static function tableName()
    {
        return 'rol_operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_id', 'operacion_id'], 'required'],
            [['rol_id', 'operacion_id'], 'integer'],
            // rol_id y operacion_id necesitan ser únicos juntos, 
            // Solo operacion_id Recibe el error del mensaje
            ['operacion_id', 'unique', 'targetAttribute' => ['rol_id', 'operacion_id'], 'message' => 'La Operación Ya Esta Asociadad al Rol']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rol_id' => 'Rol ID',
            'operacion_id' => 'Operación',
            'NombreOperacion' => 'Nombre Operación',
            'NombreMenu' => 'Nombre Menú',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacion()
    {
        return $this->hasOne(Operacion::className(), ['id' => 'operacion_id']);
    }
    
    public function getDescripcionOperacion (){
        return $this->operacion ? $this->operacion->descripcion : '';
    }

    public function getNombreOperacion (){
        return $this->operacion ? $this->operacion->nombre : '';
    }
    
    public function getIdMenu (){
        return $this->operacion ? $this->operacion->IdMenu : '';
    }    
    
    public function getNombreMenu (){
        return $this->operacion ? $this->operacion->NombreMenu : '';
    }    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }
    
    public function getNombreRol (){
        return $this->rol ? $this->rol->nombre : '';
    }
}
