<?php

namespace Douyasi\EasyTaoKe\PinDuoDuo\Request;

use Douyasi\EasyTaoKe\PinDuoDuo\RequestInterface;

class DdkOrderDetailGetRequest implements RequestInterface
{
    /**
     * 查询订单详情
     * @var string
     */
    private $type = 'pdd.ddk.order.detail.get';

    private $orderSN;

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getOrderSN()
    {
        return $this->orderSN;
    }

    public function setOrderSN($orderSN)
    {
        $this->orderSN = $orderSN;
    }

    public function getParams()
    {
        $params = [
            'type' => $this->type,
            'order_sn' => $this->orderSN
        ];
        return array_filter($params);
    }
}
