<?php

namespace frontend\models;
use yii\db\Expression;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "profesor".
 *
 * @property integer $IdProfesor
 * @property integer $IdPersona
 *
 * @property Electiva[] $electivas
 * @property Persona $idPersona
 */
class Profesor extends \yii\db\ActiveRecord
{
    public $NombreCompleto;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona'], 'required'],
            [['IdPersona'], 'integer'],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'IdPersona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdProfesor' => 'ID',
            'IdPersona' => 'Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectivas()
    {
        return $this->hasMany(Electiva::className(), ['IdProfesor' => 'IdProfesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['IdPersona' => 'IdPersona']);
    }
    
    public function getNombreProfesor(){
        return $this->idPersona ? $this->idPersona->PrimerNombre . ' ' .
                                  $this->idPersona->SegundoNombre . ' ' .
                                  $this->idPersona->PrimerApellido . ' ' .
                                  $this->idPersona->SegundoApellido : '-';
    }

        public static function getListaProfesores() {
        $profesores = Profesor::find()->select(['PRO.IdProfesor', 
                                                    new Expression("CONCAT_WS(' ',"
                                                            . "PER.PrimerNombre, "
                                                            . "PER.SegundoNombre, "
                                                            . "PER.PrimerApellido, "
                                                            . "PER.SegundoApellido) AS NombreCompleto"
                                                        )
                                ])-> from('Profesor AS PRO')
                                  -> join('INNER JOIN', 
                                            'Persona AS PER', 
                                            'PRO.IdPersona = PER.IdPersona')
                                  ->orderBy('PER.PrimerNombre')
                                  ->all();
        
        $listData=ArrayHelper::map($profesores,'IdProfesor','NombreCompleto');
        
        return $listData;
    }
}
