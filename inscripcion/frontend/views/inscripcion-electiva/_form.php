<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Estudiante;
use frontend\models\Electiva;

/* @var $this yii\web\View */
/* @var $model frontend\models\InscripcionElectiva */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel panel-primary">


    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Registrar Inscripcion' : 'Actualizar Inscripcion' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container"> 

            <div class="col-sm-11"> 

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-lg-6">
                        <?=
                        $form->field($model, 'IdEstudiante')->dropDownList(Estudiante::getListaEstudiantes(), [ 'disabled' => TRUE,
                            'prompt' => ' Seleccionar Estudiante ... ']);
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'IdElectiva')->dropDownList(Electiva::getListaElectiva(), ['prompt' => ' Seleccionar Electiva ... ']);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>    
</div>

