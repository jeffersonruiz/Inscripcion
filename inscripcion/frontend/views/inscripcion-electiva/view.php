<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\InscripcionElectiva */

$this->title = $model->IdInscripcionElectiva;
$this->params['breadcrumbs'][] = ['label' => 'Inscripcion Electivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Registrar Inscripcion' : 'Actualizar Inscripcion' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-11">
                <!--
                    <h1><?= Html::encode($this->title) ?></h1>-->

                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->IdInscripcionElectiva], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('Eliminar', ['delete', 'id' => $model->IdInscripcionElectiva], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ])
                    ?>
                </p>

                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'attribute' => 'IdInscripcionElectiva',
                            'displayOnly' => true,
                            'value' => $model->IdInscripcionElectiva,
                            'labelColOptions' => ['style' => 'width:10%'],
                            'valueColOptions' => ['style' => 'width:90%']
                        ],
                        [
                            'attribute' => 'IdEstudiante',
                            'displayOnly' => true,
                            'value' => $model->NombreEstudiante,
                            'labelColOptions' => ['style' => 'width:10%'],
                            'valueColOptions' => ['style' => 'width:90%']
                        ],
                        [
                            'attribute' => 'IdElectiva',
                            'displayOnly' => true,
                            'value' => $model->NombreElectiva,
                            'labelColOptions' => ['style' => 'width:10%'],
                            'valueColOptions' => ['style' => 'width:90%']
                        ],
                        
                        
                        
                    ],
                ])
                ?>

            </div>
        </div>
    </div>    
</div>
