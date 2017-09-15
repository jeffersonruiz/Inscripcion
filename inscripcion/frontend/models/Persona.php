<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $IdPersona
 * @property string $PrimerNombre
 * @property string $SegundoNombre
 * @property string $PrimerApellido
 * @property string $SegundoApellido
 * @property integer $IdDocumentoIdentidad
 * @property integer $NumeroDocumento
 * @property integer $IdSexo
 *
 * @property Documentoidentidad $idDocumentoIdentidad
 * @property Sexo $idSexo
 * @property Profesor[] $profesors
 */
class Persona extends \yii\db\ActiveRecord
{
    public $perfil;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PrimerNombre', 'PrimerApellido', 'IdDocumentoIdentidad', 'NumeroDocumento', 'IdSexo'], 'required'],
            [['IdDocumentoIdentidad', 'NumeroDocumento', 'IdSexo'], 'integer'],
            [['PrimerNombre', 'SegundoNombre', 'PrimerApellido', 'SegundoApellido'], 'string', 'max' => 45],
            [['NumeroDocumento'], 'unique'],
            [['IdDocumentoIdentidad'], 'exist', 'skipOnError' => true, 'targetClass' => Documentoidentidad::className(), 'targetAttribute' => ['IdDocumentoIdentidad' => 'IdDocumentoIdentidad']],
            [['IdSexo'], 'exist', 'skipOnError' => true, 'targetClass' => Sexo::className(), 'targetAttribute' => ['IdSexo' => 'IdSexo']],
            [['perfil'],'safe'],
         ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPersona' => 'ID',
            'PrimerNombre' => 'Primer Nombre',
            'SegundoNombre' => 'Segundo Nombre',
            'PrimerApellido' => 'Primer Apellido',
            'SegundoApellido' => 'Segundo Apellido',
            'IdDocumentoIdentidad' => 'Documento Identidad',
            'NumeroDocumento' => 'Numero Documento',
            'IdSexo' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocumentoIdentidad()
    {
        return $this->hasOne(Documentoidentidad::className(), ['IdDocumentoIdentidad' => 'IdDocumentoIdentidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSexo()
    {
        return $this->hasOne(Sexo::className(), ['IdSexo' => 'IdSexo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesors()
    {
        return $this->hasMany(Profesor::className(), ['IdPersona' => 'IdPersona']);
    }
}
