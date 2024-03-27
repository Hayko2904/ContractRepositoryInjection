<?php


namespace App\Contracts;


use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;

interface BaseRepositoryContract extends WhereClauseContract
{
    public function setModel($model);

    public function getModel();

    public function create(Request $request);
}
