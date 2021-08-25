<?php

namespace app\controllers\admin;

class MainController extends AdminController
{
    public function indexAction()
    {
        $countNewOrder = \R::count('order', "status = '0'");
        $countUser = \R::count('user');
        $countProduct = \R::count('product');
        $countCategories = \R::count('category');

        $this->setMeta('Панель управления');
        $this->set(compact('countCategories','countNewOrder','countProduct','countUser'));
    }

}