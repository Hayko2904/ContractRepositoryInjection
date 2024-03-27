<?php

namespace service\Contract;

use Illuminate\Http\Request;
use Closure;

interface BaseContract
{
    /**
     * @param Request $request
     * @param Closure|null $method
     * @return mixed
     */
    public function doCreate(Request $request, ?Closure $method = null);
}
