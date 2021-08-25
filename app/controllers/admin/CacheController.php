<?php

namespace app\controllers\admin;

use ishop\Cache;

class CacheController extends AdminController
{
    public function indexAction()
    {
        $this->setMeta('Очистка кэша');
    }

    public function deleteAction()
    {
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch ($key) {
            case 'category':
                $cache->delete('cats');
                $cache->delete('ishop2_menu');
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
        }
        $_SESSION['success'] = 'Кэш удален';
        redirect();
    }

}