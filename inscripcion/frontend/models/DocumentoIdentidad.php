<?php

namespace frontend\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "documentoidentidad".
 *
 * @property integer $IdDocumentoIdentidad
 * @property string $TipoDocumentoIdentidad
 */
class DocumentoIdentidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documentoidentidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TipoDocumentoIdentidad'], 'required'],
            [['TipoDocumentoIdentidad'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdDocumentoIdentidad' => 'ID',
            'TipoDocumentoIdentidad' => 'Tipo Documento Identidad',
        ];
    }
    
    public static  function  getListaTipoDocumento(){
        $tipodocumento = DocumentoIdentidad::find()->all();
        $listatipodocumento = ArrayHelper::map($tipodocumento, 'IdDocumentoIdentidad', 'TipoDocumentoIdentidad');
        return $listatipodocumento;
    }      
    
}
