<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

use backend\models\Menu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Operación / Menú del Sistema'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">   

                <!--
                <h1><?= Html::encode($this->title) ?></h1>
                -->

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Registrar Operacion', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
                    'columns' => [
                        [   'class' => 'yii\grid\SerialColumn',
                            'headerOptions' => ['width' => '50']],
                        [
                            'attribute'=>'id',
                            'options' => ['width' => '50'],
                        ],
                        [
                            'attribute'=>'descripcion',
                            'options' => ['width' => '300'],
                        ],                                    
                        [
                            'attribute'=>'menu_id',
                            'value' => 'nombremenu',
                            'label' => 'Menú',
                            'options' => ['width' => '150'],
                            'filter' => Menu::getListaMenus(),
                            /*'content'=> function($data){
                                return Menu::getNombreMenu($data->menu_id);
                            },*/
                        ],            
                        [
                            'attribute'=>'nombre',
                            'options' => ['width' => '200'],
                        ],
                        ['class' => 'yii\grid\ActionColumn',
                            'header'=>'Acción',
                            'headerOptions' => ['width' => '150'],
                        ],                        
                    ],
                ]); ?>
            </div>
        </div>
    </div>    
</div>
