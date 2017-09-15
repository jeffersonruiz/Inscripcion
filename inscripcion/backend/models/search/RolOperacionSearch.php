<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RolOperacion;

/**
 * RolOperacionSearch represents the model behind the search form about `backend\models\RolOperacion`.
 */
class RolOperacionSearch extends RolOperacion
{
    /**
     * @inheritdoc
     */
    public $NombreOperacion;
    public $NombreMenu;
    
    public function rules()
    {
        return [
            [['rol_id', 'operacion_id'], 'integer'],
            [['NombreOperacion','NombreMenu','menu_id'],'safe'],
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
    public function search($params, $rol_id)
    {
        /*if ($rol_id){
            $query = RolOperacion::find()->where('rol_id = :idrol', [':idrol' => $rol_id]);
        }else{
            $query = RolOperacion::find();
            
            $query = RolOperacion::find()
                -> select ([ 'RO.*', 'OP.nombre AS NombreOperacion', 'ME.nombre AS NombreMenu']) 
                -> from('rol_operacion AS RO')
                -> join('INNER JOIN', 
                    'operacion AS OP', 
                    'RO.operacion_id = OP.id')
                -> join('INNER JOIN', 
                    'menu AS ME', 
                    'OP.menu_id = ME.id');            
        } */   
        
        $query = RolOperacion::find();
        
        $query = RolOperacion::find()
                -> select ([ 'RO.*', 'OP.nombre AS NombreOperacion', 'ME.nombre AS NombreMenu']) 
                -> from('rol_operacion AS RO')
                -> join('INNER JOIN', 
                    'operacion AS OP', 
                    'RO.operacion_id = OP.id')
                -> join('INNER JOIN', 
                    'menu AS ME', 
                    'OP.menu_id = ME.id');            
        
        if ($rol_id){
            $query = $query->where('rol_id = :idrol', [':idrol' => $rol_id]);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
            'attributes'=>[
                'NombreMenu',
                'NombreOperacion'=>[
                    'asc'=>['operacion.nombre'=>SORT_ASC],
                    'desc'=>['operacion.nombre'=>SORT_DESC],
                    'label'=>'Operación'
                ],   
            ],
        ]);    

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith(['operacion'=>function ($q) {
            $q->where('operacion.nombre LIKE "%' . 
            $this->NombreOperacion . '%"');
        }]);        

        $query->andFilterWhere([
            'rol_id' => $this->rol_id,
            'operacion_id' => $this->operacion_id,
        ]);

        $query->andFilterWhere(['like', 'ME.Nombre', $this->NombreMenu]);
                 
        $query->orderBy([
           'rol_id'=>SORT_ASC,
           'operacion_id' => SORT_ASC,
        ]);
                
        

        return $dataProvider;
    }
}
