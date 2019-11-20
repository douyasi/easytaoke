<?php
/**
 * Created by PhpStorm.
 * User: Douyasi
 * Date: 2019/1/8
 * Time: 15:54
 */

namespace Douyasi\EasyTaoKe\JingDong;


interface RequestInterface
{
    public function getMethod();

    public function getParamJson();
}