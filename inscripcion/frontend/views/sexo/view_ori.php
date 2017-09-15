<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sexo */

$this->title = $model->IdSexo;
$this->params['breadcrumbs'][] = ['label' => 'Sexos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sexo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdSexo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdSexo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdSexo',
            'TipoSexo',
        ],
    ]) ?>

</div>
