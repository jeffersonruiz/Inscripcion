<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\detail\DetailView;

use common\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Electiva */

$this->title = $model->IdElectiva;
$this->params['breadcrumbs'][] = ['label' => 'Electiva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Registrar Electiva' : 'Actualizar Electiva' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-11">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->IdElectiva], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('Eliminar', ['delete', 'id' => $model->IdElectiva], [
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
                        'group' => true,
                        'label' => 'Sección 1: Información Personal',
                        'rowOptions' => ['class' => 'info']
                    ],
                    [
                        'columns' => [
                             [
                                    'attribute' => 'IdElectiva',
                                    'displayOnly'=>true,
                                    'value' => $model->IdElectiva,                                     
                                    'labelColOptions'=>['style'=>'width:10%'],
                                    'valueColOptions'=>['style'=>'width:10%']
                            ],
                            [
                                    'attribute' => 'NombreElectiva',
                                    'displayOnly'=>true,
                                    'value' => $model->NombreElectiva,                                     
                                    'labelColOptions'=>['style'=>'width:10%'],
                                    'valueColOptions'=>['style'=>'width:10%']
                            ],
                            [
                                    'attribute' => 'IdProfesor',
                                    'displayOnly'=>true,
                                    'value' => $model->NombreProfesor,                                     
                                    'labelColOptions'=>['style'=>'width:10%'],
                                    'valueColOptions'=>['style'=>'width:10%']
                            ],
                            [
                                    'attribute' => 'descripción',
                                    'displayOnly'=>true,
                                    'value' => $model->descripción,                                     
                                    'labelColOptions'=>['style'=>'width:10%'],
                                    'valueColOptions'=>['style'=>'width:10%']
                            ],
                            [
                                    'attribute' => 'NumeroCupones',
                                    'displayOnly'=>true,
                                    'value' => $model->NumeroCupones,                                     
                                    'labelColOptions'=>['style'=>'width:10%'],
                                    'valueColOptions'=>['style'=>'width:10%']
                            ],
                        ],
                    ],
                    [
                        'group' => true,
                        'label' => 'Sección 2: Auditoria',
                        'rowOptions' => ['class' => 'info']
                    ],
                    [
                            'columns' => [
                                [
                                    'attribute'=> 'UsuarioGraba', 
                                    'format'=>'raw', 
                                    'value' => User::getDatosUsuario($model->UsuarioGraba),                                        
                                    'labelColOptions'=>['style'=>'width:10%'], 
                                    'valueColOptions'=>['style'=>'width:15%'],
                                    //'inputWidth'=>'25%',
                                    'displayOnly'=>true
                                ],     
                                [
                                    'attribute'=>'FechaGraba', 
                                    //'format'=>'date', 
                                    'value' => $model->FechaGraba,                                        
                                    'labelColOptions'=>['style'=>'width:10%'], 
                                    'valueColOptions'=>['style'=>'width:15%'], 
                                    //'inputWidth'=>'25%',
                                    //'widgetOptions'=>[
                                    //    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                                    //],
                                    'displayOnly'=>true
                                ],                         
                                [
                                    'attribute'=>'UsuarioModifica', 
                                    //'format'=>'raw', 
                                    'value' => User::getDatosUsuario($model->UsuarioModifica),                                        
                                    'labelColOptions'=>['style'=>'width:10%'], 
                                    'valueColOptions'=>['style'=>'width:15%'], 
                                    //'inputWidth'=>'25%',
                                    'displayOnly'=>true
                                ],
                                [
                                    'attribute'=>'FechaModifica', 
                                    //'format'=>'date', 
                                    'value' => $model->FechaModifica,                                        
                                    'labelColOptions'=>['style'=>'width:10%'], 
                                    'valueColOptions'=>['style'=>'width:15%'], 
                                    //'inputWidth'=>'25%',
                                    //'widgetOptions'=>[
                                    //    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                                    //],
                                    'displayOnly'=>true
                                ],                    
                            ],

                        ],
                ]
                ?>


                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' =>$attributes,
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
                        'params' => ['id' => $model->IdElectiva, 'kvdelete'=>true],
                    ],
                    'container' => ['id'=>'kv-demo'],
                    'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
                ]) 
                ?>

            </div>
        </div>
    </div>    
</div>
