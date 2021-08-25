<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use app\models\AppModel;
use ishop\App;
use ishop\libs\Pagination;

class ProductController extends AdminController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 5;
        $count = \R::count('product');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $products = \R::getAll("SELECT product.*, category.title AS cat FROM product JOIN category ON category.id = product.category_id ORDER BY product.title LIMIT $start, $perpage");
        $this->setMeta('Категория товаров');
        $this->set(compact('pagination', 'products', 'count'));
    }

    public function addImageAction()
    {
        if(isset($_GET['upload'])) {
            if($_POST['name'] == 'single') {
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            }else {
                $wmax = App::$app->getProperty('gallery_width');
                $hmax = App::$app->getProperty('gallery_height');
            }
            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function addAction()
    {
        if(!empty($_POST)) {
            $products = new Product();
            $data = $_POST;
            $products->load($data);
            $products->attributes['status'] = $products->attributes['status'] ? '1' : '0';
            $products->attributes['hit'] = $products->attributes['hit'] ? '1' : '0';
            $products->getImg();

            if(!$products->validate($data)) {
                $products->gerErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            if ($id = $products->save('product')) {
                $products->saveGallery($id);
                $alias = AppModel::createAlias('product','alias', $data['title'], $id);
                $p = \R::load('product', $id);
                $p->alias = $alias;
                \R::store($p);
                $products->editFilter($id, $data);
                $products->editRelatedProduct($id, $data);
                $_SESSION['success'] = 'Товар добавлен';
            }
        }

        $this->setMeta('Добавить товар');
    }

    public function editAction()
    {
        if(!empty($_POST)) {
            $id = $this->getRequestID(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';
            $product->getImg();
            if(!$product->validate($data)){
                $product->getErrors();
                redirect();
            }
            if($product->update('product', $id)) {
                $product->editFilter($id,$data);
                $product->editRelatedProduct($id,$data);
                $product->saveGallery($id);
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $product = \R::load('product', $id);
                $product->alias = $alias;
                \R::store($product);
                $_SESSION['success'] = 'Изменение сохранены';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $product = \R::load('product', $id);
        App::$app->setProperty('parent_id', $product->category_id);
        $filter = \R::getCol('SELECT attr_id FROM attribute_product WHERE product_id = ?', [$id]);
        $related_product = \R::getAll("SELECT related_product.related_id, product.title FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$id]);
        $gallery = \R::getCol('SELECT img FROM gallery WHERE product_id = ?', [$id]);
        $this->setMeta("Редактирование товара {$product->title}");
        $this->set(compact('product', 'filter', 'related_product', 'gallery'));
    }

    public function relatedProductAction()
    {
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $data['items'] = [];
        $products = \R::getAssoc("SELECT id, title FROM product WHERE title LIKE ? LIMIT 10", ["%{$q}%"]);
        if($products) {
            $i = 0;
            foreach ($products as $id => $title) {
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        echo json_encode($data);
        die;
    }
    public function deleteAction() {
        $product_id = $this->getRequestID();
        $product = \R::load('product', $product_id);
        \R::trash($product);
        $_SESSION['success'] = 'Товар удален';
        redirect(ADMIN . '/product');
    }

}