<?php
/**
 * 苏宁开放平台接口 - 网盟订单结算信息查询
 *
 * @author suning
 * @date   2014-10-16
 */

namespace Douyasi\EasyTaoKe\SuNing\Request\NetallianceTx;

use Douyasi\EasyTaoKe\SuNing\SuningRequest;
use Douyasi\EasyTaoKe\SuNing\RequestCheckUtil;

class GetNetallianceOrderSettleRequest extends SuningRequest
{

    /**
     * 订单行项目号
     */
    private $orderLineNumber;

    public function getOrderLineNumber()
    {
        return $this->orderLineNumber;
    }

    public function setOrderLineNumber($orderLineNumber)
    {
        $this->orderLineNumber = $orderLineNumber;
        $this->apiParams["orderLineNumber"] = $orderLineNumber;
    }

    public function getApiMethodName()
    {
        return 'suning.netalliance.ordersettle.get';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //非空校验
        RequestCheckUtil::checkNotNull($this->orderLineNumber, 'orderLineNumber');
    }

    public function getBizName()
    {
        return "getOrderSettle";
    }
}
