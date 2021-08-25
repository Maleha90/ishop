<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\Category;
use ishop\App;

class CategoryController extends AdminController
{
    public function indexAction()
    {
        $this->setMeta('Список категорий');
    }

    public function deleteAction()
    {
        $id = $this->getRequestID();
        $child = \R::count('category', "parent_id = ?", [$id]);
        $errors = '';
        if($child) {
            $errors .= '<li>Удаление не возможно есть вложеные категории</li>';
        }
        $product = \R::count('product', "category_id = ?", [$id]);
        if ($product) {
            $errors .= '<li>Удаление невозможно, в категории есть товары</li>';
        }
        if ($errors) {
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect();
        }
        $category = \R::load('category', $id);
        \R::trash($category);
        $_SESSION['success'] = 'Категория удалена';
        redirect();
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->gerErrors();
                redirect();
            }
            if($id = $category->save('category')) {
                $alias = AppModel::createAlias('category','alias',$data['title'],$id);
                $cat = \R::load('category',$id);
                $cat->alias = $alias;
                \R::store($cat);
                $_SESSION['success'] = 'Категория добавлена';
            }
            redirect();
        }
        $this->setMeta('Новая категория');
    }

    public function editAction()
    {
        if(!empty($_POST)) {
            $id = $this->getRequestID(false);
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->gerErrors();
                redirect();
            }
            if ($category->update('category', $id)) {
                $alias = AppModel::createAlias('category','alias', $data['title'], $id);
                $category = \R::load('category', $id);
                $category->alias = $alias;
                \R::store($category);
                $_SESSION['success'] = 'Изменение сохранены';
            }
            redirect();
        }
        $id = $this->getRequestID();
        $category = \R::load('category', $id);
        App::$app->setProperty('parent_id',$category->parent_id);
        $this->setMeta("Категория {$category->title}");
        $this->set(compact('category'));
    }

}
