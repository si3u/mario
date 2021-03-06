<?php

namespace console\controllers;

use common\models\User;
use mario\rbac\OwnModelRule;
use yii\console\Controller;
use yii\db\Exception;
use yii\helpers\Console;

class RbacController extends Controller {
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        //User
        $user = $auth->createRole(ROLE_MEMBER);
        $user->description = 'Member - Tài khoản người dùng bình thường';
        $auth->add($user);

        //Own Model Permission
        $ownModelRule = new OwnModelRule();
        $auth->add($ownModelRule);

        //Editor
        $editor = $auth->createRole(ROLE_EDITOR);
        $editor->description = 'Editor - Tài khoản người dùng thêm sửa xóa bài viết và tối ưu hóa bài viết chuẩn SEO';
        $auth->add($editor);
        $auth->addChild($editor, $user);

        //Access to Backend Permission
        $accessBackend = $auth->createPermission('accessBackend');
        $accessBackend->description = 'Cho phép user có quyền vào backend';
        $auth->add($accessBackend);
        $auth->addChild($editor, $accessBackend);

        //Sales
        $sales = $auth->createRole(ROLE_SALES);
        $sales->description = 'Manager - Có quyền quản lý';
        $auth->add($sales);
        $auth->addChild($sales, $editor);

        //Manager
        $accountant = $auth->createRole(ROLE_ACCOUNTANT);
        $accountant->description = 'Manager - Có quyền quản lý';
        $auth->add($accountant);
        $auth->addChild($accountant, $sales);

        //Manager
        $manager = $auth->createRole(ROLE_MANAGER);
        $manager->description = 'Manager - Có quyền quản lý';
        $auth->add($manager);
        $auth->addChild($manager, $accountant);

        //Admin
        $admin = $auth->createRole(ROLE_ADMIN);
        $admin->description = 'Admin';
        $auth->add($admin);
        $auth->addChild($admin, $manager);

        //Admin
        $super_admin = $auth->createRole(ROLE_SUPER_ADMIN);
        $super_admin->description = 'Super Admin';
        $auth->add($super_admin);
        $auth->addChild($super_admin, $admin);

        try {
            //Create first user
            $user = new User();
            $user->email = 'admin@admin.com';
            $user->name = 'Admin';
            $user->role = ROLE_SUPER_ADMIN;
            $user->setPassword('admin123');
            $user->generateAuthKey();
            $user->save();
            $uid = $user->getId();
            //Assign user
            $auth->assign($super_admin, $uid);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }


        Console::output('Success! RBAC roles has been added.');

    }
}