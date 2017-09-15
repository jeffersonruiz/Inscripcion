<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\DocumentoIdentidad;

/**
 * DocumentoIdentidadSearch represents the model behind the search form about `frontend\models\DocumentoIdentidad`.
 */
class DocumentoIdentidadSearch extends DocumentoIdentidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdDocumentoIdentidad'], 'integer'],
            [['TipoDocumentoIdentidad'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DocumentoIdentidad::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdDocumentoIdentidad' => $this->IdDocumentoIdentidad,
        ]);

        $query->andFilterWhere(['like', 'TipoDocumentoIdentidad', $this->TipoDocumentoIdentidad]);

        return $dataProvider;
    }
}
