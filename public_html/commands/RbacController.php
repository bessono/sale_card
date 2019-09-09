<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "managerCards"
        $manageCards = $auth->createPermission('manageCards');
        //$manageCards->description = 'Add, Edit, or Delete saleCards';
        $auth->add($manageCards);

        // Добавляем разрешение управлять пользователями "manageManagers"
        $manageManagers = $auth->createPermission('manageManagers');
        //$manageManagers = $auth->description = 'Add, Edit, or Delete managers(admins,sellers and ets.)';
        $auth->add($manageManagers);

        // добавляем разрешение "updatePost"
        $manageCustomers = $auth->createPermission('manageCustomers');
        //$manageCustomers->description = 'manage customer data';
        $auth->add($manageCustomers);
        // Добавляем разрешение изменять скидки

        $manageDiscount = $auth->createPermission('manageDiscount');
        $auth->add($manageDiscount);

        // добавляем роль "admininstrator" и даём роли разрешение "manageCards"
        $administrator = $auth->createRole('administrator');
        $auth->add($administrator);
        $auth->addChild($administrator, $manageCards);
        $auth->addChild($administrator, $manageCustomers);
        $auth->addChild($administrator, $manageManagers);
        $auth->addChild($administrator, $manageDiscount);

        // добавляем роль "seller" 
        $seller = $auth->createRole('seller');
        $auth->add($seller);
        $auth->addChild($seller, $manageCustomers);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($seller, 2);
        $auth->assign($administrator, 1);
    }
}