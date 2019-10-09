<?php

namespace SoloCms\exception\user;

use SoloCms\exception\BaseException;

class UserException extends BaseException
{
    public $code = 404;
    public $msg = '账户不存在';
    public $error_code = '20000';
}