<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\DocumentoIdentidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documento Identidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title"><?php echo 'Listado Documento Identidade' ?></h3>
    </div>

    <div class="panel-body">
        <div class="container">  
            <div class="col-sm-11">  

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Documento Identidad', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'IdDocumentoIdentidad',
                        'TipoDocumentoIdentidad',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>
            </div>   
        </div>
    </div>    
</div>

