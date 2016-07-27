<?php

/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/27
 * Time: 11:15
 */
namespace app\rbac;

use yii\rbac\Role;
class TeacherRole extends Role
{
    public $name = 'isTeacher';

    /**
     * @param string|integer $user 用户 ID.
     * @param Item $item 该规则相关的角色或者权限
     * @param array $params 传给 ManagerInterface::checkAccess() 的参数
     * @return boolean 代表该规则相关的角色或者权限是否被允许
     */
    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    }
}