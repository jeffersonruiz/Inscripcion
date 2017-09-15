<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-primary">
      
    
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Crear Menú' : 'Actualizar Menú'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container"> 

            <div class="col-sm-10">   

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-lg-4">

                        <?= $form->field($model, 'nombre',['inputOptions' => 
                                                        [   'class' => 'form-control',
                                                            'autofocus' => 'autofocus', 
                                                            'class' => 'form-control'
                                                        ]
                                                    ])->textInput(['maxlength' => true]) ?>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>                
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
