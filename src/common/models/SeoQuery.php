<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Mailbox]].
 *
 * @see Mailbox
 */
class SeoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Mailbox[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Mailbox|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
