<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menú';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Menú del Sistema'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">   

                <!--
                <h1><?= Html::encode($this->title) ?></h1>
                -->
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Registrar Menú', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                            'headerOptions' => ['width' => '50']],
                        [
                         'attribute'=>'id',
                            'options' => ['width' => '100'],
                        ],
                        [
                         'attribute'=>'descripcion',
                         'contentOptions'=>['style'=>'width: 500px;']
                        ],                        
                        [
                         'attribute'=>'nombre',
                            'options' => ['width' => '250'],
                         //'contentOptions'=>['style'=>'width: 150px;']
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
