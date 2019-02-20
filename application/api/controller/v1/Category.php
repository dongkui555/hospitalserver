<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getCategoryAll(){
        $result = CategoryModel::getCategoryList();
        if ($result->isEmpty()){
            throw new CategoryException();
        }
        return $result;

    }

}