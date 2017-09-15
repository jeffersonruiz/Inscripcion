<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\DetailView;

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RolOperacion */

$this->title = 'Actualizar Operación / Rol : ' .$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operación / Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Asignar Operación / Rol' : 'Actualizar Operación / Rol'?></h3>
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
                            'label'=>'Sección 1: Información Operación - Rol',
                            'rowOptions'=>['class'=>'info']
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'id', 
                                    'format'=>'raw', 
                                    'value'=>'<kbd>'.$model->id.'</kbd>',
                                    'label' => 'ID',
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],
                            ],    
                        ],            
                        [
                            'columns' => [
                                [
                                    'attribute'=>'NombreRol', 
                                    'format'=>'raw', 
                                    'value'=>$model->NombreRol,
                                    'label' => 'Rol',
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],
                            ],    
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'NombreMenu', 
                                    'format'=>'raw', 
                                    'value'=>$model->NombreMenu,
                                    'label' => 'Menú',
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],                                                     
                            ],
                        ],                        
                        [
                            'columns' => [
                                [
                                    'attribute'=>'NombreOperacion', 
                                    'format'=>'raw', 
                                    'value'=>$model->NombreOperacion,
                                    'label' => 'Operación',
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
                                    'value'=>$model->DescripcionOperacion,
                                    'label' => 'Descripción',
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
            </div>
        </div>
    </div>        
</div>
