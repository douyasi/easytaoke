<?php

namespace Douyasi\EasyTaoKe;

use Douyasi\EasyTaoKe\TaoBao\Application as TaoBao;
use Douyasi\EasyTaoKe\PinDuoDuo\Application as PinDuoDuo;
use Douyasi\EasyTaoKe\JingDong\Application as JingDong;

/**
 * Class Factory.
 */
class Factory
{

    /**
     * @var 单例模式
     */
    private static $instance;


    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $obj = self::getInstance();
        return $obj->make($name, ...$arguments);
    }


    /**
     * 单例获取当前对象
     * @return static
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * 获取配置文件名字
     * @return string
     */
    public function getConfigName()
    {
        return "EasyTaoKe";
    }

    /**
     * @param $name
     * @param array $config
     * @return mixed
     */
    public function make($name, array $config = [])
    {
        if (!in_array($name, ['taobao', 'jingdong', 'pinduoduo'])) {
            throw new \InvalidArgumentException('static method is not exists');
        }
        $config = $this->getConfig($name, $config);
        return $this->getClient($name, $config);
    }


    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return string[]
     */
    protected function getConfig(string $name, array $config)
    {
        if ($name == "taobao") {
            if (!array_key_exists('app_key', $config) || !array_key_exists('app_secret', $config)) {
                throw new \InvalidArgumentException('The top client requires api keys.');
            }
            $config['app_key'] = (string) $config['app_key'];
            return $this->arrayOnly($config, ['app_key', 'app_secret', 'format']);
        }
        if ($name == "pinduoduo") {
            if (!array_key_exists('client_id', $config) || !array_key_exists('client_secret', $config)) {
                throw new \InvalidArgumentException('The pinduoduo client requires client_id and client_secret.');
            }
            return $this->arrayOnly($config, ['client_id', 'client_secret', 'format']);
        }
        if ($name == "jingdong") {
            if (!array_key_exists('app_key', $config) || !array_key_exists('app_secret', $config)) {
                throw new \InvalidArgumentException('The jingdong client requires app_key and app_secret.');
            }
            return $this->arrayOnly($config, ['app_key', 'app_secret', 'format']);
        }
    }

    /**
     * Get the topclient client.
     *
     * @param string[] $auth
     *
     * @return CloudsearchClient
     */
    protected function getClient(string $name, array $config)
    {
        if ($name == "taobao") {
            $c = new TaoBao();
            $c->appkey = (string) $config['app_key'];
            $c->secretKey = $config['app_secret'];
            $c->format = isset($config['format']) ? $config['format'] : 'json';
            return $c;
        }
        if ($name == "pinduoduo") {
            $c = new PinDuoDuo();
            $c->clientId = $config['client_id'];
            $c->clientSecret = $config['client_secret'];
            $c->format = isset($config['format']) ? $config['format'] : 'json';
            return $c;
        }
        if ($name == "jingdong") {
            $c = new JingDong();
            $c->appKey = $config['app_key'];
            $c->appSecret = $config['app_secret'];
            $c->format = isset($config['format']) ? $config['format'] : 'json';
            return $c;
        }
    }

    /**
     * Array only
     *
     * @param array $array
     * @param array $keys
     * @return array function array_only() in laravel
     */
    private function arrayOnly($array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }
}
