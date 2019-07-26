<?php
/**
 * 苏宁开放平台接口 - 网盟订单信息单笔查询
 *
 * @author suning
 * @date   2014-10-16
 */

namespace Cstopery\EasyTaoKe\SuNing\Request\NetallianceTx;

use Cstopery\EasyTaoKe\SuNing\SuningRequest;
use Cstopery\EasyTaoKe\SuNing\RequestCheckUtil;

class GetNetallianceOrderRequest extends SuningRequest
{
    /**
     * 订单号
     */
    private $orderCode;

    public function getOrderCode()
    {
        return $this->orderCode;
    }

    public function setOrderCode($orderCode)
    {
        $this->orderCode = $orderCode;
        $this->apiParams["orderCode"] = $orderCode;
    }

    public function getApiMethodName()
    {
        return 'suning.netalliance.order.get';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //非空校验
        RequestCheckUtil::checkNotNull($this->orderCode, 'orderCode');
    }

    public function getBizName()
    {
        return "getOrder";
    }

}

?>