<?php

namespace frontend\controllers;

use yii\helpers\Url;

class PaypalController extends \yii\web\Controller
{
    public function actionCancel()
    {
        return $this->render('cancel');
    }

    public function actionIndex()
    {
        $isSandbox = true;
        $sandboxUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr?';
        $liveUrl = 'https://www.paypal.com/cgi-bin/webscr?';
        $params = [
            'business' => 'tuan@sieu.com',
            'cmd' => '_xclick',
            'item_name' => 'Tester',
            'item_number' => 'SKU_ABC',
            'invoice' => 'INVOICE_' . time(),
            'amount' => '10.00',
            'discount_amount' => '2.95',
            'currency_code' => 'USD',
            'notify_url' => Url::to(['paypal/notify'], true),
            'return' => Url::to(['paypal/success'], true),
            'cancel_return' => Url::to(['paypal/cancel'], true),
        ];
        $paymentUrl = $isSandbox ? $sandboxUrl : $liveUrl;
        $redirectUrl = $paymentUrl . http_build_query($params);
        $this->redirect($redirectUrl);
    }

    public function actionNotify()
    {
        \Yii::info($_POST);
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

}
