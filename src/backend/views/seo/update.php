<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mailbox */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Seo',
]) . $model->page;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hộp thư'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box mailbox-update">
<div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
