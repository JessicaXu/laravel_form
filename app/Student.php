<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const SEX_UN = 10;
    const SEX_BOY = 20;
    const SEX_GIRL = 30;

    // 指定模型对应的表
    protected $table = 'student';

    // 保留系统维护的时间戳
    public $timestamp = true;

    protected $fillable = ['name', 'age', 'sex'];

    // 设置时间
    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($val)
    {
        return $val;
    }

    public function sex($ind = null){
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女'
        ];

        if($ind){
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }
}