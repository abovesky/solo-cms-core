<?php

namespace SoloCms\exception\token;

use SoloCms\exception\BaseException;

class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg  = '权限不足，请联系管理员';
    public $error_code = 10002;
}