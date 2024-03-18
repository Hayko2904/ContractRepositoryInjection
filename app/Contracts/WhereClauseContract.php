<?php


namespace App\Contracts;


interface WhereClauseContract
{
    /**
     * @param $attr
     * @param null $operator
     * @param null $value
     * @param string $boolean
     * @return mixed
     */
    public function where($attr, $operator = null, $value = null, $boolean = 'and');
}
