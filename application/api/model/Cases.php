<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class Cases extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];

    public function getTopicImgUrlAttr($value,$data){
        return $this->topicImgUrl($value,$data);
    }

    public function getMainImgUrlAttr($value,$data){
        return $this->mainImgUrl($value,$data);
    }

    public function imgList(){
        return $this->hasMany('CasesImg','cases_id','Id');
    }

    public function casePpt(){
        return $this->hasOne('CasesProperty','cases_id','Id');
    }
    public function caseServe(){
        return $this->hasMany('CasesServe','cases_id','Id');
    }

    public static function getCasesByCategoryID($id){
        return self::where('category_id','=',$id)->select();
    }

    public static function getCasesDetail($id){
        return self::with(['casePpt','caseServe.serveId'])->with(['imgList' => function($query){$query->with('imgUrl')->order('index','asc');}])->find($id);
    }

}