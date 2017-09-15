<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use backend\models\Menu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RolOperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Registrar Operaciones / Rol';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Operación / Rol'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">   

                <!--
                <h1><?= Html::encode($this->title) ?></h1>
                -->

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Registrar Operación', ['createoperacion', 'rol_id'=>$rol_id], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'NombreRol',
                        [
                            'attribute'=>'NombreMenu',
                            'value' => 'NombreMenu',
                            'label' => 'Menú',
                            'options' => ['width' => '150'],
                            //'filter' => Menu::getListaMenus(),
                            /*'content'=> function($data){
                                return Menu::getNombreMenu($data->menu_id);
                            },*/
                        ],            
                        [   
                            'attribute' => 'NombreOperacion',
                            'label' => 'Nombre Operación',
                            'options' => ['width' => '200'],
                        ],              
                        [   
                            'attribute' => 'DescripcionOperacion',
                            'label' => 'Descripción Operación',
                            'options' => ['width' => '500'],
                        ],                          
                        ['class' => 'yii\grid\ActionColumn',
                            'header'=>'Acción',
                            'headerOptions' => ['width' => '100'],
                            'template' => '{delete}',
                            'buttons' => [
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => 'Eliminar',
                                                'data-confirm' => 'Esta Seguro de Eliminar Este Registro?',
                                                'data-method' => 'post',
                                    ]);

                                },
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'delete') {
                                    return Url::toRoute(['deleteoperacion', 'id' => $model->id]);
                                }
                            }        
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>    
</div>
