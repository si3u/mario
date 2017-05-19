<?php

use yii\helpers\Html;
use mario\admin\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MailboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mailboxes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box mailbox-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-body no-padding">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name',
                'email:email',
                'phone',
                'message:ntext',
                'created_at',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}',
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
