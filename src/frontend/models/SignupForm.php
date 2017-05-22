<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\db\Exception;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $password_confirm;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 70],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 5],

            [['password_confirm'], 'compare', 'compareAttribute' => 'password', 'message' => \Yii::t('app', 'Passwords do not match')],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $user->save();
            $uid = $user->getId();
            $auth = \Yii::$app->authManager;
            $auth->assign($auth->getRole(ROLE_MEMBER), $uid);
            $transaction->commit();
            return $user;
        } catch (Exception $exception) {
            $transaction->rollBack();
            return null;
        }
    }
}
