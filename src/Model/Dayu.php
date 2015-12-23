<?php

namespace Gabe\Dayu\Model;

use Illuminate\Database\Eloquent\Model;

class DaYu extends Model
{
    private $ak = '';
    private $sk = '';

    protected $table = 'gabe_dayus';

    public function config($ak,$sk)
    {
        $this->ak = $ak;
        $this->sk = $sk;
    }

    public function dayuable()
    {
        return $this->morphTo();
    }

    public function scopeFindByDayuable($query, $parent)
    {
        return $query->where(['dayuable_type'=>get_class($parent),'dayuable_id'=>$parent->getKey()]);
    }

    public static function createByDayuable($dayuable)
    {
        $config = $dayuable->dayuConfig();
        $dayu = new self;
        $dayu->smsType = $config['smsType'];
        $dayu->smsFreeSignName = $config['smsFreeSignName'];
        $dayu->smsParam = $config['smsParam'];
        $dayu->recNum = $config['recNum'];
        $dayu->smsTemplateCode = $config['smsTemplateCode'];
        $dayu->dayuable_type = get_class($dayuable);
        $dayu->dayuable_id = $dayuable->getKey();
        $dayu->save();
        return $dayu;
    }

    public function send()
    {
        include_once __DIR__ . "/../../taobao-sdk-PHP-auto/TopSdk.php";
        date_default_timezone_set('Asia/Shanghai');
        $c = new \TopClient;
        $c->appkey = $this->ak;
        $c->secretKey  = $this->sk;
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $sessionKey = null;
        $req->setSmsType($this->smsType);
        $req->setSmsFreeSignName($this->smsFreeSignName);
        $req->setSmsParam($this->smsParam);
        $req->setRecNum($this->recNum);
        $req->setSmsTemplateCode($this->smsTemplateCode);
        $resp = $c->execute($req, $sessionKey);
        $json = json_encode($resp);
        $array = json_decode($json,TRUE);
        if($result['result']['success'])
        {
            $this->send_at = new \DateTime('NOW');
            $this->save();
        }else{
            $this->send_at = null;
            $this->save();
        }
    }
}
