<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;

use yii\helpers\Url;
use kartik\detail\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = 'Actualizar Rol : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Rol' : 'Actualizar Rol'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">  

                <!--
                <h1><?= Html::encode($this->title) ?></h1>
                -->

                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Esta Seguro de Eliminar Este Registro?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?php
                    $attributes = [
                        [
                            'group'=>true,
                            'label'=>'Sección 1: Información Rol',
                            'rowOptions'=>['class'=>'info']
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'id', 
                                    'format'=>'raw', 
                                    'value'=>'<kbd>'.$model->id.'</kbd>',
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],
                            ],    
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'nombre', 
                                    'format'=>'raw', 
                                    'value'=>$model->nombre,
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],                                                     
                            ],
                        ],            
                        [
                            'columns' => [
                                [
                                    'attribute'=>'descripcion', 
                                    'format'=>'raw', 
                                    'value'=>$model->descripcion,
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],                                                     
                            ],
                        ],
                    ]
                ?>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => $attributes,
                    'mode' => DetailView::MODE_VIEW,
                    /*'panel'=>[
                        'heading'=>'ID Persona No ' . $model->IdPersona,
                        'type' => DetailView::TYPE_INFO,
                    ],*/
                    'bordered' => TRUE,
                    'striped' => FALSE,
                    'condensed' => FALSE,
                    'responsive' => TRUE,
                    'hover' => TRUE,
                    'hAlign'=> 'left',
                    'vAlign'=>'middle',
                    'fadeDelay'=>800,
                    'deleteOptions'=>[ // your ajax delete parameters
                        'params' => ['id' => $model->id, 'kvdelete'=>true],
                    ],
                    'container' => ['id'=>'kv-demo'],
                    'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
                ]) ?>

                <div>
                    <h3 class="titulos"><?= Html::encode('Sección 2: Acceso Al Sistema') ?></h3>
                </div> 

                <?= GridView::widget([
                    'dataProvider' => $dataProviderOperacion,
                    //'filterModel' => $searchModelOperacion,
                    'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                            'headerOptions' => ['width' => '50'],
                        ],
                        [
                            'attribute'=>'NombreMenu',
                            'options' => ['width' => '100'],
                        ],            
                        [
                            'attribute'=>'NombreOperacion',
                            'options' => ['width' => '100'],
                        ],

                        ['class' => 'yii\grid\ActionColumn',
                            'header'=>'Acción',
                            'headerOptions' => ['width' => '150'],
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
