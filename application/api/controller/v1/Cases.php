<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;


use app\api\validate\BaseValidate;
use app\api\model\Cases as CasesModel;
use app\lib\exception\CasesException;
use think\Exception;

class Cases
{
    public function getAllInCategory($id){
        $validate = new BaseValidate();
        $validate->goCheck();

        $result =CasesModel::getCasesByCategoryID($id);
        if ($result->isEmpty()){
            throw new CasesException();
        }
        return $result;
    }

    public function getCasesOne($id){
        $validate = new  BaseValidate();
        $validate->goCheck();

        $result = CasesModel::getCasesDetail($id);
        if (!$result){
            throw new CasesException();
        }
        return $result;
    }

}