<?php
/**
 * Created by wanxin on 2018/4/11.
 * Email: 987763485@qq.com
 */

namespace app\api\validate;

use app\lib\exception\ParamdterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取id的参数验证
        $request = Request::instance();
        $params = $request ->param();

        $result = $this -> batch() -> check($params);

        if(!$result){
            $e = new ParamdterException(['msg'=>$this->error,'errorCode'=> 1002]);
            throw $e;
        }else{
            return true;
        }
    }

    /**
     * 验证值必须是整数
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    protected function isPositiveInteger($value, $rule = '',$data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0)
        {
            return true;
        }
        else
            {
            return false;
        }
    }

    /**
     * 验证值不能为空
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    public function isNotEmpty($value,$rule='',$data='',$field=''){
        if(empty($value))
        {
            return false;
        }
        else
            {
            return true;
        }
    }

    /**
     * 验证手机号码
     * @param $value
     * @return bool
     */

    public static function isMobile($value){
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule,$value);
        if ($result){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $arrays
     * @return array
     * @throws ParamdterException
     */
    public function getDataByRule($arrays){
        if(array_key_exists('user_id',$arrays) || array_key_exists('uid',$arrays))
        {
            throw new ParamdterException([
                'msg'=>'请求参数非法'
            ]);
        }
        $newArray = [];

        foreach ($this->rule as $key => $value)
        {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }

}