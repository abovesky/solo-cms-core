<?php

namespace SoloCms\exception;

class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $error_code = 99999;
}