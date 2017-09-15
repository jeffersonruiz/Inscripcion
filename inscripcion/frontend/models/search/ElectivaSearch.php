<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Electiva;

/**
 * ElectivaSearch represents the model behind the search form about `frontend\models\Electiva`.
 */
class ElectivaSearch extends Electiva
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdElectiva', 'IdProfesor', 'NumeroCupones', 'UsuarioGraba', 'UsuarioModifica'], 'integer'],
            [['NombreElectiva', 'descripción', 'FechaGraba', 'FechaModifica'], 'safe'],
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
        $query = Electiva::find();

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
            'IdElectiva' => $this->IdElectiva,
            'IdProfesor' => $this->IdProfesor,
            'NumeroCupones' => $this->NumeroCupones,
            'UsuarioGraba' => $this->UsuarioGraba,
            'FechaGraba' => $this->FechaGraba,
            'UsuarioModifica' => $this->UsuarioModifica,
            'FechaModifica' => $this->FechaModifica,
        ]);

        $query->andFilterWhere(['like', 'NombreElectiva', $this->NombreElectiva])
            ->andFilterWhere(['like', 'descripción', $this->descripción]);

        return $dataProvider;
    }
}
