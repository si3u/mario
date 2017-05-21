<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MailboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý SEO');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box mailbox-index">
    <div class="box-body no-padding">
        <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'page',
                'meta_title:ntext',
                'meta_desc:ntext',
//                 'content:ntext',
                'meta_keyword:ntext',
                // 'updated_at',

                [
                    'class' => 'yii\grid\ActionColumn', 'template' => '{update}',
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
