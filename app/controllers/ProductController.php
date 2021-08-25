<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use ishop\App;

class ProductController extends AppController
{
    public function viewAction ()
    {
        $alias = $this->route['alias'];
        $products = \R::findOne('product',"alias = ? AND status = '1'",[$alias]);
        if (!$products) {
            throw new \Exception("Продукт не найден {$alias}", 404);
        }

        //Хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($products->category_id, $products->title);

        //Галерея
        $galery = \R::findAll('gallery', 'product_id = ?', [$products->id]);

        // Связанные товары
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$products->id]);

        //модификация
        $mods = \R::findAll('modification', 'product_id = ?', [$products->id]);

        $this->setMeta($products->title, $products->description, $products->keywords);
        $this->set(compact('products', 'galery','related','breadcrumbs','mods'));
    }



}