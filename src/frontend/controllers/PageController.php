<?php

namespace frontend\controllers;

use common\models\Page;
use yii\web\NotFoundHttpException;

class PageController extends \yii\web\Controller
{
    public function actionView($slug)
    {
        $model = $this->findModel($slug);
        return $this->render($model->layout);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slug)
    {
        if (($model = Page::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
