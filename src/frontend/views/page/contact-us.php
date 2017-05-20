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
                    <div id="contact-us-success"></div>
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="Mailbox[name]" id="name" class="form-control" autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="Mailbox[email]" id="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="Mailbox[phone]" id="phone" class="form-control"/>
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
                data: $('#contact-us').serialize(),
                success: function(data) {
                    $('#btn-contact-us').removeAttr('disabled');
                },
                error: function(err) {
                    $('#btn-contact-us').removeAttr('disabled');
                    $('html, body').animate({
                        scrollTop: $('body').offset().top
                    }, 500);
                    $('#contact-us').find('.text-danger').remove();
                    var errors = JSON.parse(err.responseText).message;
                    Object.keys(errors).forEach(function(key) {
                        $('#'+key).after('<p class="text-danger">' + errors[key] + '</p>');
                    });
                }
           });
        });
    })(jQuery);
JS;
$this->registerJs($js, View::POS_END);