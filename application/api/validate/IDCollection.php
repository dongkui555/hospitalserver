<?php
/**
 * Created by wanxin on 2018/4/12.
 * Email: 987763485@qq.com
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];
    protected $message = [
        'ids' => 'ids 必须是多个逗号分开的正整数'
    ];
    protected function checkIDs($value){
        $value = explode(',',$value);
        if(empty($value)){
            return false;
        }
        foreach ($value as $id){
            if (!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }

}