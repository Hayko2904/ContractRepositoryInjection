<?php


namespace App\Repositories;


class BaseRepository extends Repository
{
    /**
     * @inheritDoc
     */
    public function where($attr, $operator = null, $value = null, $boolean = 'and')
    {
        dd('where');
    }
}
