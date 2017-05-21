<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $source
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $secret_key
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
            [['meta_title', 'meta_desc', 'meta_keyword'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
			'page' => Yii::t('app', 'Trang'),
            'meta_title' => Yii::t('app', 'SEO - Tiêu đề'),
			'meta_desc' => Yii::t('app', 'SEO - Mô tả'),
			'meta_keyword' => Yii::t('app', 'SEO - Từ khóa'),
        ];
    }

    /**
     * @inheritdoc
     * @return MailboxQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeoQuery(get_called_class());
    }
}
