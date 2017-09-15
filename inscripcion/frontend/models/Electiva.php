<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "electiva".
 *
 * @property integer $IdElectiva
 * @property string $NombreElectiva
 * @property integer $IdProfesor
 * @property string $descripción
 * @property integer $NumeroCupones
 * @property integer $UsuarioGraba
 * @property string $FechaGraba
 * @property integer $UsuarioModifica
 * @property string $FechaModifica
 *
 * @property Profesor $idProfesor
 */
class Electiva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'electiva';
    }
    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['FechaGraba', 'FechaModifica'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['FechaModifica'],
                ],
            'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'UsuarioGraba',
                'updatedByAttribute' => 'UsuarioModifica',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreElectiva', 'IdProfesor', 'descripción', 'NumeroCupones'], 'required'],
            [['IdProfesor', 'NumeroCupones'], 'integer'],
            [['descripción'], 'string'],
            [['NombreElectiva'], 'string', 'max' => 70],
            [['IdProfesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['IdProfesor' => 'IdProfesor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdElectiva' => 'ID',
            'NombreElectiva' => 'Nombre Electiva',
            'IdProfesor' => 'Profesor',
            'descripción' => 'Descripción',
            'NumeroCupones' => 'Numero Cupones',
            'UsuarioGraba' => 'Usuario Graba',
            'FechaGraba' => 'Fecha Graba',
            'UsuarioModifica' => 'Usuario Modifica',
            'FechaModifica' => 'Fecha Modifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfesor()
    {
        return $this->hasOne(Profesor::className(), ['IdProfesor' => 'IdProfesor']);
    }
    
    public function getNombreProfesor(){
        return $this->idProfesor ? $this->idProfesor->idPersona->PrimerNombre . ' ' .
                                  $this->idProfesor->idPersona->SegundoNombre . ' ' .
                                  $this->idProfesor->idPersona->PrimerApellido . ' ' .
                                  $this->idProfesor->idPersona->SegundoApellido : '-';
    }

        public static  function  getListaElectiva(){
        $data = Electiva::find()->orderBy('NombreElectiva')->asArray()->all();
        $lista = ArrayHelper::map($data, 'IdElectiva', 'NombreElectiva');
        return $lista;
    }  
}
