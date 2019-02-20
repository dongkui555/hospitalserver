<?php
/**
 * Created by wanxin on 2018/5/10.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class CasesServe extends BaseModel
{
    public function serveId(){
        return $this->belongsTo('Serve','serve_id','Id');
    }

}