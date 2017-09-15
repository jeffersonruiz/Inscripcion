<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\detail\DetailView;

//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sexo */

$this->title = 'Consultar Sexo : ' . $model->IdSexo;
$this->params['breadcrumbs'][] = ['label' => 'Sexo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Sexo' : 'Actualizar Sexo'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">    

                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->IdSexo], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->IdSexo], [
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
                            'label'=>'Sección 1: Información Datos Básicos',
                            'rowOptions'=>['class'=>'info']
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'IdSexo', 
                                    'format'=>'raw', 
                                    'value'=>'<kbd>'.$model->IdSexo.'</kbd>',
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],
                            ],    
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'TipoSexo', 
                                    'format'=>'raw', 
                                    'value'=>$model->TipoSexo,
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
                        'params' => ['id' => $model->IdSexo, 'kvdelete'=>true],
                    ],
                    'container' => ['id'=>'kv-demo'],
                    'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
                ]) ?>
            </div>
        </div>
    </div>
</div>
