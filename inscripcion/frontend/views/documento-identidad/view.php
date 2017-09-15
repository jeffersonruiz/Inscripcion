<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocumentoIdentidad */

$this->title = $model->IdDocumentoIdentidad;
$this->params['breadcrumbs'][] = ['label' => 'Documento Identidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Estado Civil' : 'Actualizar Estado Civil' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">  

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->IdDocumentoIdentidad], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('Eliminar', ['delete', 'id' => $model->IdDocumentoIdentidad], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ])
                    ?>
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
                                    'attribute'=>'IdDocumentoIdentidad',
                                    'format'=>'raw', 
                                    'value'=>'<kbd>'.$model->IdDocumentoIdentidad.'</kbd>',
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],
                            ],    
                        ],
                        [
                            'columns' => [
                                [
                                    'attribute'=>'TipoDocumentoIdentidad', 
                                    'format'=>'raw', 
                                    'value'=>$model->TipoDocumentoIdentidad,
                                    'labelColOptions'=>['style'=>'width:13%'],
                                    'valueColOptions'=>['style'=>'width:87%'], 
                                    'displayOnly'=>true
                                ],                                                     
                            ],
                        ],                        
                    ]
                ?>

                <?=
             
               DetailView::widget([
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
                        'params' => ['id' => $model->IdDocumentoIdentidad, 'kvdelete'=>true],
                    ],
                    'container' => ['id'=>'kv-demo'],
                    'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
                ])
                ?>

            </div>
        </div>
    </div>
</div>

