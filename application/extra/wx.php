<?php
/**
 * Created by wanxin on 2018/5/7.
 * Email: 987763485@qq.com
 */

return [
    'app_id' => '',
    'app_secret' => '',
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?".
    "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code"
];