<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Meteostation;

/* @var $this yii\web\View */
/* @var $model app\models\Meteostation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meteostation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'required'=>'required']) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' =>255,'required'=>'required']) ?>

    <?= $form->field($model, 'meteoId')->textInput(['type'=>'number','required'=>'required']) ?>

    <?= $form->field($model, 'meteoDriver')->dropdownList(Meteostation::getDrivers()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
