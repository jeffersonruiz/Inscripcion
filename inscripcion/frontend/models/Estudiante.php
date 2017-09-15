<?php

namespace frontend\models;
use yii\db\Expression;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "estudiante".
 *
 * @property integer $IdEstudiante
 * @property integer $IdPersona
 *
 * @property Persona $idPersona
 * @property Inscripcionelectiva[] $inscripcionelectivas
 */
class Estudiante extends \yii\db\ActiveRecord
{
    public $NombreCompleto;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante';
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
            'IdEstudiante' => 'ID',
            'IdPersona' => 'Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['IdPersona' => 'IdPersona']);
    }
    
     public function getNombreEstudiante(){
        return $this->idPersona ? $this->idPersona->PrimerNombre . ' ' .
                                  $this->idPersona->SegundoNombre . ' ' .
                                  $this->idPersona->PrimerApellido . ' ' .
                                  $this->idPersona->SegundoApellido : '-';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionelectivas()
    {
        return $this->hasMany(Inscripcionelectiva::className(), ['IdEstudiante' => 'IdEstudiante']);
    }
    public static function getListaEstudiantes() {
        $estudiantes = Estudiante::find()->select(['EST.IdEstudiante', 
                                                    new Expression("CONCAT_WS(' ',"
                                                            . "PER.PrimerNombre, "
                                                            . "PER.SegundoNombre, "
                                                            . "PER.PrimerApellido, "
                                                            . "PER.SegundoApellido) AS NombreCompleto"
                                                        )
                                ])-> from('estudiante AS EST')
                                  -> join('INNER JOIN', 
                                            'Persona AS PER', 
                                            'EST.IdPersona = PER.IdPersona')
                                  ->orderBy('PER.PrimerNombre')
                                  ->all();
        
        $listData=ArrayHelper::map($estudiantes,'IdEstudiante','NombreCompleto');
        
        return $listData;
    }
}
