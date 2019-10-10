<?php

namespace SoloCms\model;

use think\Model;
use think\model\concern\SoftDelete;

class Attachment extends Model
{
    use SoftDelete;
    protected $autoWriteTimestamp = 'datetime';
    protected $hidden = ['delete_time', 'update_time'];
}