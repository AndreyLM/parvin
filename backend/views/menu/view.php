<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $menu domain\entities\Menu */

$this->title = $menu->name;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $menu->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $menu->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-header with-border">Common</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $menu,
                'attributes' => [
                    'id',
                    'name',
                    [
                        'label' => 'Parent category',
                        'value' => $menu->parent->name,
                    ],
                    [
                        'label' => 'type',
                        'value' => $menu->getType(),
                    ],
                    'related_id',
                ],
            ]) ?>
        </div>
    </div>

</div>
