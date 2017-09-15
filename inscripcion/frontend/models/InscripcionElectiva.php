<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "inscripcionelectiva".
 *
 * @property integer $IdInscripcionElectiva
 * @property integer $IdEstudiante
 * @property integer $IdElectiva
 *
 * @property Estudiante $idEstudiante
 * @property Electiva $idElectiva
 */
class InscripcionElectiva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcionelectiva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdEstudiante', 'IdElectiva'], 'required'],
            [['IdEstudiante', 'IdElectiva'], 'integer'],
            [['IdEstudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['IdEstudiante' => 'IdEstudiante']],
            [['IdElectiva'], 'exist', 'skipOnError' => true, 'targetClass' => Electiva::className(), 'targetAttribute' => ['IdElectiva' => 'IdElectiva']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdInscripcionElectiva' => 'ID',
            'IdEstudiante' => 'Estudiante',
            'IdElectiva' => 'Electiva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['IdEstudiante' => 'IdEstudiante']);
    }
     public function getNombreEstudiante(){
        return $this->idEstudiante ? $this->idEstudiante->idPersona->PrimerNombre . ' ' .
                                  $this->idEstudiante->idPersona->SegundoNombre . ' ' .
                                  $this->idEstudiante->idPersona->PrimerApellido . ' ' .
                                  $this->idEstudiante->idPersona->SegundoApellido : '-';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdElectiva()
    {
        return $this->hasOne(Electiva::className(), ['IdElectiva' => 'IdElectiva']);
    }
    
    public function getNombreElectiva(){
        return $this->idElectiva ? $this->idElectiva->NombreElectiva : '-';
    }
}
