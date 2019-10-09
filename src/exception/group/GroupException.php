<?php

namespace SoloCms\exception\group;

use SoloCms\exception\BaseException;

class GroupException extends BaseException
{
    public $code = 400;
    public $msg  = '分组错误';
    public $error_code  = 30000;
}