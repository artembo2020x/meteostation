<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meteostation */

$this->title = 'Обновить метеостанцию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Метеостанции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->meteoId]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="meteostation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
