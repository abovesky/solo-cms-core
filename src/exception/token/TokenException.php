<?php

namespace SoloCms\exception\token;

use SoloCms\exception\BaseException;

class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $error_code = 10000;
}