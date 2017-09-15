<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\DocumentoIdentidad;
use frontend\models\Sexo;

/* @var $this yii\web\View */
/* @var $model frontend\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-primary">


    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Registrar Persona' : 'Actualizar Persona' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container"> 

            <div class="col-sm-11"> 

                <?php $form = ActiveForm::begin(); ?>

                <div class="row"> 
                    <div class="col-lg-3">
                        <?= $form->field($model, 'PrimerNombre')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'SegundoNombre')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'PrimerApellido')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'SegundoApellido')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <?= $form->field($model, 'IdDocumentoIdentidad')->dropDownList(DocumentoIdentidad::getListaTipoDocumento(), ['prompt' => ' Seleccionar Tipo Documento ... ']);
                        ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'NumeroDocumento')->textInput() ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'IdSexo')->dropDownList(Sexo::getListaSexos(), ['prompt' => ' Seleccionar Sexo ... ']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'perfil')->dropDownList(['0' => 'Estudiante', '1' => 'Profesor'], ['prompt' => ' Seleccionar Perfil ... ']); ?>
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

