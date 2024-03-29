<?php

namespace SoloCms\model;

use think\Model;

class AdminAuth extends Model
{
    protected $hidden = ['id'];

    /**
     * @param $id
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getAuthByGroupID($id)
    {
        $result = self::where('group_id', $id)
            ->field('group_id', true)
            ->select()->toArray();
        return $result;
    }

    /**
     * @param $params
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function dispatchAuths($params)
    {
        foreach ($params['auths'] as $value) {
            $auth = self::where(['group_id' => $params['group_id'], 'auth' => $value])->find();
            if (!$auth) {
                $authItem = findAuthModule($value);
                $authItem['group_id'] = $params['group_id'];
                self::create($authItem);
            }
        }
    }
}