<?php


namespace ishop\base;


use ishop\Db;
use Valitron\Validator;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct ()
    {
        Db::instance();
    }

    public function load ($data)
    {
        foreach ($this->attributes as $key => $value) {
            if (isset($data[$key])) {
                $this->attributes[$key] = $data[$key];
            }
        }
    }

    public function save ($table, $valide = true)
    {
        if ($valide) {
            $tbl = \R::dispense($table);
        }else {
            $tbl = \R::xdispense($table);
        }
        foreach ($this->attributes as $name => $value) {
            $tbl->$name = $value;
        }
        return \R::store($tbl);
    }

    public function update($table, $id)
    {
        $brean = \R::load($table, $id);
        foreach ($this->attributes as $name => $value) {
            $brean->$name = $value;
        }
        return \R::store($brean);
    }

    public function validate ($data)
    {
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if ($v->validate()) {
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function gerErrors ()
    {
        $errors = '<ul>';
            foreach ($this->errors as $error) {
                foreach ($error as $item) {
                    $errors .= "<li>$item</li>";
                }
            }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }

}