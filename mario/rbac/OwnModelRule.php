<?php

namespace mario\rbac;

use yii\rbac\Item;
use yii\rbac\Rule;

class OwnModelRule extends Rule {

    public $name = 'ownModelRule';
    /**
     * Executes the rule.
     *
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]].
     * @return bool a value indicating whether the rule permits the auth item it is associated with.
     */
    public function execute($user, $item, $params)
    {
        $attribute = isset($params['attribute']) ? $params['attribute'] : 'created_by';

        return $user && isset($params['model']) && $user === $params['model']->getAttribute($attribute);
    }
}