<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use kartik\depdrop\DepDrop;

use backend\models\Rol;
use backend\models\Menu;
use backend\models\Operacion;

/* @var $this yii\web\View */
/* @var $model backend\models\RolOperacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-primary">
          
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $model->isNewRecord ? 'Asignar Operación / Rol' : 'Actualizar Operación / Rol'?></h3>
    </div>
    
    <div class="panel-body">
        <div class="container"> 

            <div class="col-sm-10">   

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-lg-4">        
                        <?= $form->field($model, 'rol_id',['inputOptions' => 
                                                        [   'class' => 'form-control',
                                                            'autofocus' => 'autofocus', 
                                                        ]
                                                    ])->dropDownList(Rol::getListaRoles(), 
                                                                    [   'prompt' => ' Seleccionar Rol ... ' 
                                                                    ])->label('Rol');?>                         
                    </div>
                </div>    

                <div class="row">
                    <div class="col-lg-4">            
                        <?= $form->field($model, 'menu_id',['inputOptions' => 
                                                        [   'class' => 'form-control',
                                                            'autofocus' => 'autofocus', 
                                                            'class' => 'form-control'
                                                        ]
                                                    ])->dropDownList(Menu::getListaMenus(), 
                                                                    [   'id'=>'cat-id',
                                                                        'prompt' => ' Seleccionar Menú ... ' 
                                                                    ])->label('Menú');?>             
                    </div>    
                </div>  

                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'operacion_id')->widget(DepDrop::classname(), [
                            'options'=>['id'=>'subcat-id'],
                            'pluginOptions'=>[
                                'depends'=>['cat-id'],
                                'placeholder'=>'Seleccionar Operación',
                                'url'=>Url::to(['/rol-operacion/operacion'])
                                ]
                            ]);
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
