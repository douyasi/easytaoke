<?php
/**
 * 苏宁开放平台接口 -
 *
 * @author suning
 * @date   2019-4-15
 */

namespace Douyasi\EasyTaoKe\SuNing\Request\Netalliance;

use Douyasi\EasyTaoKe\SuNing\SelectSuningRequest;
use Douyasi\EasyTaoKe\SuNing\RequestCheckUtil;

class OrderQueryRequest extends SelectSuningRequest
{

    /**
     *
     */
    private $endTime;

    /**
     *
     */
    private $orderLineStatus;


    /**
     *
     */
    private $startTime;

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
        $this->apiParams["endTime"] = $endTime;
    }

    public function getOrderLineStatus()
    {
        return $this->orderLineStatus;
    }

    public function setOrderLineStatus($orderLineStatus)
    {
        $this->orderLineStatus = $orderLineStatus;
        $this->apiParams["orderLineStatus"] = $orderLineStatus;
    }


    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
        $this->apiParams["startTime"] = $startTime;
    }

    public function getApiMethodName()
    {
        return 'suning.netalliance.order.query';
    }

    public function getApiParams()
    {
        return $this->apiParams;
    }

    public function check()
    {
        //非空校验
        RequestCheckUtil::checkNotNull($this->endTime, 'endTime');
        RequestCheckUtil::checkNotNull($this->pageNo, 'pageNo');
        RequestCheckUtil::checkNotNull($this->pageSize, 'pageSize');
        RequestCheckUtil::checkNotNull($this->startTime, 'startTime');
    }

    public function getBizName()
    {
        return "queryOrder";
    }
}
