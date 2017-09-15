<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Profesor */

$this->title = 'Create Profesor';
$this->params['breadcrumbs'][] = ['label' => 'Profesors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
