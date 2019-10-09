<?php

namespace SoloCms\exception\logger;

use SoloCms\exception\BaseException;

class LoggerException extends BaseException
{
    public $code = 400;
    public $msg  = '日志信息不能为空';
    public $error_code = 40001;
}