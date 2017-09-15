<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Profesor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Electiva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-primary">


    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Registrar Electiva' : 'Actualizar Electiva' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container"> 

            <div class="col-sm-11"> 

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-lg-5">
                        <?= $form->field($model, 'NombreElectiva')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-5">
                        <?= $form->field($model, 'IdProfesor')->dropDownList(Profesor::getListaProfesores(), ['prompt' => ' Seleccionar Profesor ... ']);
                        ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $form->field($model, 'NumeroCupones')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <?= $form->field($model, 'descripción')->textarea(['rows' => 6]) ?>

                    </div>
                </div>



                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>    
</div>
