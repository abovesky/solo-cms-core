<?php

namespace SoloCms\exception\user;

use SoloCms\exception\BaseException;

class TicketUserException extends BaseException
{
    public $code = 404;
    public $msg  = '用户不存在';
    public $error_code = '20000';
}