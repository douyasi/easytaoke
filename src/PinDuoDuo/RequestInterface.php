<?php
/**
 * Created by PhpStorm.
 * User: Douyasi
 * Date: 2019/1/8
 * Time: 15:43
 */

namespace Douyasi\EasyTaoKe\PinDuoDuo;


interface RequestInterface
{
    public function getParams();

    public function setType($type);

    public function getType();
}