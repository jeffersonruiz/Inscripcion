<?php

use yii\helpers\Html;
use yii\grid\GridView;

use frontend\models\Profesor;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ElectivaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Electivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Electiva' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-11">   

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Resgistrar Electiva', ['create'], ['class' => 'btn btn-success']) ?>
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
                            'attribute' => 'IdElectiva',
                            'options' => ['width' => '10'],
                        ],
                        [
                            'attribute' => 'NombreElectiva',
                            'options' => ['width' => '100'],
                        ],
                        [
                            'attribute' => 'IdProfesor',
                            'value' => 'NombreProfesor',
                            'filter'=> Profesor::getListaProfesores(),
                            'options' => ['width' => '100'],
                        ],
                        [
                            'attribute' => 'descripción',
                            'options' => ['width' => '150'],
                        ],
                        [
                            'attribute' => 'NumeroCupones',
                            'options' => ['width' => '50'],
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

