<?php

namespace App\Services\ServiceProvider;

use App\Services\ServiceProvider\Traits\PackageTrait;

abstract class Transport
{
    use PackageTrait;

    /**
     * 包裹数据类
     *
     * @var string
     */
    protected $packageClass;

    /**
     * 预报数据类
     *
     * @var string
     */
    protected $forecastClass;

    /**
     * @var Package 获取包裹数据
     */
    protected $package;

    /**
     * 预报信息类
     *
     * @var Forecast
     */
    protected $forecast;

    /**
     * 启动注册完成后的启动函数
     *
     * @return void
     * @auther houxin 2021/12/13 21:40
     */
    public function boot() {

    }

    /**
     * 注册函数，用来设置各个类的属性
     *
     * @return void
     * @auther houxin 2021/12/13 21:38
     */
    public abstract function register();

    /**
     * 获取包裹的属性
     *
     * @return Package
     * @auther houxin 2021/12/13 22:43
     */
    public function getPackageInstance()
    {
        if (!$this->package) {
            $this->package = new $this->packageClass();
            $this->package->init();
        }
        return $this->package;
    }

    /**
     * 获取预报的数据
     *
     * @return Forecast|mixed
     * @auther houxin 2021/12/13 22:46
     */
    public function getForecastInstance()
    {
        if (!$this->forecast) {
            $this->forecast = new $this->forecastClass();
            $this->forecast->init();
        }
        return $this->forecast;
    }
}
