<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `frontend\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona', 'IdDocumentoIdentidad', 'NumeroDocumento', 'IdSexo'], 'integer'],
            [['PrimerNombre', 'SegundoNombre', 'PrimerApellido', 'SegundoApellido'], 'safe'],
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
        $query = Persona::find();

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
            'IdPersona' => $this->IdPersona,
            'IdDocumentoIdentidad' => $this->IdDocumentoIdentidad,
            'NumeroDocumento' => $this->NumeroDocumento,
            'IdSexo' => $this->IdSexo,
        ]);

        $query->andFilterWhere(['like', 'PrimerNombre', $this->PrimerNombre])
            ->andFilterWhere(['like', 'SegundoNombre', $this->SegundoNombre])
            ->andFilterWhere(['like', 'PrimerApellido', $this->PrimerApellido])
            ->andFilterWhere(['like', 'SegundoApellido', $this->SegundoApellido]);

        return $dataProvider;
    }
}
