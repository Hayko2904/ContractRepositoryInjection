<?php

namespace service;

use Closure;
use Illuminate\Http\Request;
use service\Contract\BaseContract;

class BaseService implements BaseContract
{

    /**
     * @inheritDoc
     */
    public function doCreate(Request $request, Closure $method = null){}
}
