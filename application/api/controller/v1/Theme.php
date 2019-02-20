<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;

use app\api\model\Theme as ThemeModel;
use app\api\validate\IDCollection;
use app\lib\exception\ThemeException;

class Theme
{
    public function getSimpleList($ids){
        $validate = new IDCollection();
        $validate->goCheck();

        $ids = explode(',', $ids);
        $result = ThemeModel::getThemeByID($ids);
        if ($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }

}