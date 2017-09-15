<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use backend\models\Rol;
use backend\models\Operacion;
use backend\models\Menu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RolOperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operación / Rol';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Operación / Rol del Sistema'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">   


                <!--
                <h1><?= Html::encode($this->title) ?></h1>
                -->
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Registrar Operacion / Rol', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute'=>'rol_id',
                            'value' => 'NombreRol',
                            'label' => 'Rol',
                            'options' => ['width' => '200'],
                            'filter' => Rol::getListaRoles(),
                        ],             
                        [
                            'attribute'=>'NombreMenu',
                            'value' => 'NombreMenu',
                            'label' => 'Menú',
                            'options' => ['width' => '200'],
                        ],             
                        [
                            'attribute'=>'NombreOperacion',
                            'value' => 'NombreOperacion',
                            'label' => 'Operación',
                            'options' => ['width' => '200'],
                            //'filter' => Operacion::getListaOperaciones(),                
                        ],     
                        [
                            'attribute' => 'DescripcionOperacion',
                            'label' => 'Descripción Operación',
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
                                    return Url::toRoute(['delete', 'id' => $model->id]);
                                }
                            }        

                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>    
</div>
