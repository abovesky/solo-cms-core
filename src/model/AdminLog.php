<?php

namespace SoloCms\model;

use SoloCms\exception\logger\LoggerException;
use think\Model;

class AdminLog extends Model
{
    protected $createTime = 'create_time';
    protected $updateTime = false;
    protected $autoWriteTimestamp = 'datetime';

    /**
     * @param $params
     * @return array
     * @throws LoggerException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getLogs($params)
    {
        $filter = [];
        if (isset($params['name'])) {
            $filter ['user_name'] = $params['name'];
        }

        if (isset($params['start']) && isset($params['end'])) {
            $filter['create_time'] = [$params['start'], $params['end']];
        }

        list($start, $count) = paginate();

        $logs = self::withSearch(['user_name', 'create_time'], $filter)
            ->order('create_time desc');

        $totalNums = $logs->count();
        $logs = $logs->limit($start, $count)->select();

        if (!count($logs)) throw new LoggerException(['code' => 404, 'msg' => '没有查询到更多日志']);

        $result = [
            'collection' => $logs,
            'total_nums' => $totalNums
        ];
        return $result;

    }

    public function searchUserNameAttr($query, $value, $data)
    {
        if (!empty($value)) {
            $query->where('user_name', $value);
        }
    }

    public function searchTimeAttr($query, $value, $data)
    {
        if (!empty($value)) {
            $query->whereBetweenTime('create_time', $value[0], $value[1]);
        }
    }
}