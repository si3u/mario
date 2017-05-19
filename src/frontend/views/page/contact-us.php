<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="site-contact">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us. Thank
            you.
        </p>
        <div class="row">
            <div class="col-lg-5">
                <form method="post" id="contact-us" role="form">
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input name="Mailbox[name]" id="name" class="form-control" autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="Mailbox[email]" id="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input name="Mailbox[phone]" id="phone" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung</label>
                        <textarea name="Mailbox[message]" id="message" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn-contact-us" id="btn-contact-us" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>

    </div>

<?php
$url = Url::to(['site/mail']);
$js = <<<JS
    (function($) {
        'use strict';
        $('#contact-us').submit(function(e) {
           e.preventDefault();
           $('#btn-contact-us').attr('disabled', true);
           $.ajax({
                type: 'POST',
                url: '$url',
                data: $('#contact-us').serialize()
           });
        });
    })(jQuery);
JS;
$this->registerJs($js, View::POS_END);