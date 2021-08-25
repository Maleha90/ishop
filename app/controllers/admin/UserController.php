<?php

namespace app\controllers\admin;

use app\models\User;
use ishop\libs\Pagination;

class UserController extends AdminController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = \R::count('user');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $users = \R::findAll('user', "LIMIT $start, $perpage");

        $this->setMeta('Список пользователей');
        $this->set(compact('users','pagination','count'));
    }

    public function addAction()
    {
        $this->setMeta('Добавить пользователя');
    }

    public function editAction()
    {
        if (!empty($_POST)){
            $id = $this->getRequestID(false);
            $user = new \app\models\admin\User();
            $data = $_POST;
            $user->load($data);
            if (!$user->attributes['password']){
                unset($user->attributes['password']);
            }else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            $this->setMeta('Пользователь');
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->gerErrors();
                redirect();
            }
            if ($user->update('user', $id)) {
                $_SESSION['success'] = 'Изменение сохранены';
            }
            redirect();
        }

        $user_id = $this->getRequestID();
        $user = \R::load('user', $user_id);

        $orders = \R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`, `order`.`currency`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
  JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
  WHERE user_id = {$user_id} GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id`");

        $this->setMeta('Редактирование пользователя');
        $this->set(compact('orders','user'));
    }

    public function loginAdminAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login(true)) {
                $_SESSION['success'] = 'Успешно авторизованы';
            }else {
                $_SESSION['error'] = 'Логин.пароль введены не верно';
            }
            if (User::isAdmin()) {
                redirect(ADMIN);
            }else {
                redirect();
            }
        }
        $this->layout = 'login';
    }

    public function deleteAction()
    {
        $user_id = $this->getRequestID();
        $user = \R::load('user', $user_id);
        \R::trash($user);
        $_SESSION['success'] = 'Пользователь удален';
        redirect(ADMIN . '/user');
    }
}