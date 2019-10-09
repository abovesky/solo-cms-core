<?php

namespace SoloCms\validate;

use Cms\exception\ParameterException;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * @return bool
     * @throws ParameterException
     */
    public function goCheck()
    {
        //获取HTTP传入的参数
        $params = Request::param();
        //对这些参数做校验
        $result = $this->batch()->check($params);
        if (!$result) {
            $e = new ParameterException([
                'msg' => $this->error,
            ]);
            throw $e;
        } else {
            return true;
        }
    }
}