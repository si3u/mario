<?php

namespace frontend\controllers;

use common\models\Mailbox;
use common\models\Page;
use mario\Common;
use Yii;
use yii\web\NotFoundHttpException;

class PageController extends \yii\web\Controller
{
    public function actionView($slug)
    {
        $node = $this->findBySlug($slug);
        return $this->render($node->layout);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findBySlug($slug)
    {
        if (($model = Page::findOne(['slug' => $slug])) !== null) {
            Common::getMetaTags($model);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
