<?php

use yii\helpers\Html;
use yii\grid\GridView;


use frontend\models\Estudiante;
use frontend\models\Electiva;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\InscripcionElectivaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripcion Electivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Inscripciones' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-11">   

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Registrar Inscripcion', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                            'headerOptions' => ['width' => '50']
                        ],
                        [
                            'attribute' => 'IdInscripcionElectiva',
                           'options' => ['width' => '100'],
                        ],
                        [
                            'attribute' => 'IdEstudiante',
                            'value' => 'NombreEstudiante',
                            'filter'=> Estudiante::getListaEstudiantes(),
                            'options' => ['width' => '100'],
                        ],
                        [
                            'attribute' => 'IdElectiva',
                            'value' => 'NombreElectiva',
                            'filter'=> Electiva::getListaElectiva(),
                            'options' => ['width' => '100'],
                        ],
                        
                        
                        
                        [   'class' => 'yii\grid\ActionColumn',
                            'header'=>'Acción',
                            'headerOptions' => ['width' => '100'],
                        ],
                    ],
                ]);
                ?>
            </div>   
        </div>
    </div>    
</div>


