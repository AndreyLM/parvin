<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model domain\entities\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'subject')->textInput() ?>

    <?= $form->field($model, 'message')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

A Product of Yii Software LLC

Powered by Yii Framework
