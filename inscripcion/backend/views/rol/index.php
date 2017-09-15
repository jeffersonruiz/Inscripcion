<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rol';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Rol de Persona'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">   

                <!--
                <h1><?= Html::encode($this->title) ?></h1>
                -->
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Registrar Rol', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                            'headerOptions' => ['width' => '50'],
                        ],
                        [
                            'attribute'=>'id',
                            'options' => ['width' => '100'],
                        ],
                        [
                            'attribute'=>'nombre',
                            'options' => ['width' => '250'],
                        ],
                        [
                         'attribute'=>'descripcion',
                         'contentOptions'=>['style'=>'width: 500px;']
                        ],

                        ['class' => 'yii\grid\ActionColumn',
                            'header'=>'Acción',
                            'headerOptions' => ['width' => '150'],
                            'template' => '{view} {update} {operacion} {delete}',
                            'buttons' => [
                                'operacion' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-lock"></span>', $url, [
                                                'title' => 'Operaciones',
                                    ]);
                                },
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'operacion') {
                                    return Url::toRoute(['indexoperacion', 'rol_id' => $model->id]);
                                } else {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            }                        
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>    
</div>
