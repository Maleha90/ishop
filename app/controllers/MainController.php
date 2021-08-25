<?php


namespace app\controllers;


use ishop\base\Controller;
use ishop\Cache;

class MainController extends AppController
{
    public function indexAction ()
    {
        $products = \R::findAll('product',"hit = '1' LIMIT 5");
        $this->setMeta('Shopper');
        $this->set(compact('products'));
    }

}