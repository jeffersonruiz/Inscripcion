<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\SexosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sexo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">
        
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Sexo de Persona'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-10">    

                <!--
                <h1><?= Html::encode($this->title) ?></h1>
                -->

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Registrar Sexo', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "Mostrando {begin} - {end} de {totalCount} Registro(s)",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                            'headerOptions' => ['width' => '50']
                        ],
                        [
                            'attribute'=>'IdSexo',
                            'options' => ['width' => '50'],
                        ],
                        [
                            'attribute'=>'TipoSexo',
                            'options' => ['width' => '200'],
                        ],            
                                   

                        ['class' => 'yii\grid\ActionColumn',
                            'header'=>'Acción',
                            'headerOptions' => ['width' => '100']
                        ],
                    ],
                ]); ?>
            </div>   
        </div>
    </div>    
</div>
