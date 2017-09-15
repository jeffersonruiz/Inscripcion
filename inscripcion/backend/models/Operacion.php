<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "operacion".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $menu_id
 *
 * @property Menu $menu
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'menu_id', 'descripcion'], 'required'],
            [['menu_id'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 250],
            [['descripcion'], 'unique']
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
            'menu_id' => 'Menú',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    public function getIdMenu (){
        return $this->menu ? $this->menu->id : '';
    }
    
    public function getNombreMenu (){
        return $this->menu ? $this->menu->nombre : '';
    }
    
    public static function getOperacionesByMenu($IdOperacion){
        
        $data  = Operacion:: find () 
                -> select ([ 'operacion.id AS id' , 
                    'operacion.nombre AS name' ]) 
                -> from('operacion')
                -> join('INNER JOIN', 
                    'menu', 
                    'operacion.menu_id = menu.id')
                -> where ([ 'operacion.menu_id' => $IdOperacion ])
                -> asArray () 
                -> all (); 
        
        //$value  =  ( count ( $data )  ==  0 )  ?  [ ''  =>  '' ]  :  $data ; 
        
        return  $data; 
    }    
    
    public static  function  getListaOperaciones(){
        $operaciones = Operacion::find()->orderBy('nombre')->asArray()->all();
        $listaoperaciones = ArrayHelper::map($operaciones, 'id', 'nombre');
        return $listaoperaciones;
    }
    
    
}
