<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // 指定模型对应的表
    protected $table = 'student';

    // 保留系统维护的时间戳
    public $timestamp = true;

    // 设置时间
    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($val)
    {
        return $val;
    }
}