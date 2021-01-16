<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EspecialidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="especialidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddato_especialidad') ?>

    <?= $form->field($model, 'nombre_especialidad') ?>

    <?= $form->field($model, 'descripcion_especialidad') ?>

    <?= $form->field($model, 'nivel_dificultad_especialidad') ?>

    <?= $form->field($model, 'anios_min_experiencia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
