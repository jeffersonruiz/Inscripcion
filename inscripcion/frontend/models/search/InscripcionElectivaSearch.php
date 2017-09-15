<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\InscripcionElectiva;

/**
 * InscripcionElectivaSearch represents the model behind the search form about `frontend\models\InscripcionElectiva`.
 */
class InscripcionElectivaSearch extends InscripcionElectiva
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdInscripcionElectiva', 'IdEstudiante', 'IdElectiva'], 'integer'],
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
        $query = InscripcionElectiva::find();

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
            'IdInscripcionElectiva' => $this->IdInscripcionElectiva,
            'IdEstudiante' => $this->IdEstudiante,
            'IdElectiva' => $this->IdElectiva,
        ]);

        return $dataProvider;
    }
}
