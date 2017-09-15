<?php

namespace backend\controllers;

use Yii;
use backend\models\Rol;
use backend\models\search\RolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\RolOperacion;
use backend\models\search\RolOperacionSearch;

/**
 * RolController implements the CRUD actions for Rol model.
 */
//class RolController extends Controller
class RolController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rol models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rol model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModelOperacion = new RolOperacionSearch();
        $dataProviderOperacion = $searchModelOperacion->search(Yii::$app->request->queryParams, $id);        
                
        $model = $this->findModel($id);
        if ($model){
            
            return $this->render('view',['model' => $model,
                                        'searchModelOperacion' => $searchModelOperacion,
                                        'dataProviderOperacion' => $dataProviderOperacion,            
            ]);
        }
    }

    /**
     * Creates a new Rol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rol();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rol model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rol::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIndexoperacion($rol_id)
    {        
        $searchModel = new RolOperacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $rol_id);

        return $this->render('indexoperacion', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'rol_id' => $rol_id,
        ]);        
    }
    
    public function actionCreateoperacion ($rol_id){
        
        $model = new RolOperacion();
        
        $model->rol_id = $rol_id;
                
        if ($model->load(Yii::$app->request->post())) {            
            if ($model->save()){
                return $this->redirect(['indexoperacion', 'rol_id' => $rol_id]);
            }else{
                return $this->render('createoperacion', [
                    'model' => $model,
                    'rol_id' => $rol_id,
                ]);                    
            }
        }else{
            return $this->render('createoperacion', [
                'model' => $model, 
                'rol_id' => $rol_id,
            ]);    
        }
        
    }
    
    public function actionDeleteoperacion($id)
    {
        $model = $this->findModelOperacion($id);
        
        $rol_id = $model->rol_id;
        
        if ($model){
            try {
                $model->delete();
            }catch (\yii\db\Exception $e) {
                throw new \yii\web\ForbiddenHttpException('No Se Puede Eliminar El Registro.');
            }
        }
        
        return $this->redirect(['indexoperacion', 'rol_id' => $rol_id]);
    }
    
    protected function findModelOperacion($id)
    {
        if (($model = RolOperacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
