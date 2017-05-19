<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Mailbox */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mailboxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box mailbox-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>