<?php

namespace mario;

class Common {
    public static function getMetaTags($model) {
        \Yii::$app->view->title = $model->meta_title ? $model->meta_title : $model->title;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->meta_desc,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->meta_keyword,
        ]);
    }
}