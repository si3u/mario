<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mailbox".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $verifyCode
 * @property integer $created_at
 * @property integer $updated_at
 */
class Mailbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mailbox}}';
    }

    public function behaviors()
    {
        return [
          TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['name'], 'trim'],
            [['phone'], 'string', 'min' => 6],
            [['phone'], 'match', 'pattern' => '/^[\d|\+|\(]+[\)|\d|\s|-]*[\d]$/'],
            ['published', 'default', 'value' => STATUS_ACTIVE],
            ['published', 'in', 'range' => [STATUS_ACTIVE, STATUS_DEACTIVATED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'message' => Yii::t('app', 'Message'),
            'verifyCode' => Yii::t('app', 'Verify Code'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return MailboxQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MailboxQuery(get_called_class());
    }
}
