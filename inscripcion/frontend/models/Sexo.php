<?php

namespace frontend\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "sexo".
 *
 * @property integer $IdSexo
 * @property string $TipoSexo
 */
class Sexo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sexo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TipoSexo'], 'required'],
            [['TipoSexo'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdSexo' => 'ID',
            'TipoSexo' => 'Tipo Sexo',
        ];
    }
    
    public static  function  getListaSexos(){
        $sexos = Sexo::find()->all();
        $listasexos = ArrayHelper::map($sexos, 'IdSexo', 'TipoSexo');
        return $listasexos;
    }
}
