<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sexos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-primary">
      
    
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Sexo' : 'Actualizar Sexo'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container"> 
            
            <div class="col-sm-10">    

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-lg-8">                

                        <?= $form->field($model, 'TipoSexo',['inputOptions' => 
                                                                [   'class' => 'form-control',
                                                                    'autofocus' => 'autofocus', 
                                                                ]
                                                            ])->textInput(['maxlength' => true]) ?>
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
