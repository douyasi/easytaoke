<?php
/**
 * 苏宁开放平台接口 -
 *
 * @author suning
 * @date   2019-4-30
 */

namespace Douyasi\EasyTaoKe\SuNing\Request\Netalliance;

use Douyasi\EasyTaoKe\SuNing\SuningRequest;
use Douyasi\EasyTaoKe\SuNing\RequestCheckUtil;

class ThirdpartypromotionGetRequest extends SuningRequest
{

    /**
     *
     */
    private $channel;

    /**
     *
     */
    private $outerId;

    /**
     *
     */
    private $subUser;

    public function getChannel()
    {
        return $this->channel;
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
        $this->apiParams["channel"] = $channel;
    }

    public function getOuterId()
    {
        return $this->outerId;
    }

    public function setOuterId($outerId)
    {
        $this->outerId = $outerId;
        $this->apiParams["outerId"] = $outerId;
    }

    public function getSubUser()
    {
        return $this->subUser;
    }

    public function setSubUser($subUser)
    {
        $this->subUser = $subUser;
        $this->apiParams["subUser"] = $subUser;
    }

    public function getApiMethodName()
    {
        return 'suning.netalliance.thirdpartygetpromotion.get';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //非空校验
        RequestCheckUtil::checkNotNull($this->channel, 'channel');
        RequestCheckUtil::checkNotNull($this->outerId, 'outerId');
    }

    public function getBizName()
    {
        return "getThirdpartygetpromotion";
    }
}
