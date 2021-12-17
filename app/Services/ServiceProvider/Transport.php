<?php

namespace App\Services\ServiceProvider;

use App\Exceptions\ServiceProvider\ClassNotInstantiatedException;
use App\Services\ServiceProvider\Traits\PackageTrait;

abstract class Transport
{
    use PackageTrait;

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
     * @var array[] 包裹商品信息
     */
    protected $packageGoods;

    /**
     * @param Package $package
     */
    protected function setPackage(Package $package): void
    {
        $this->package = $package;
    }

    /**
     * @param Forecast $forecast
     */
    protected function setForecast(Forecast $forecast): void
    {
        $this->forecast = $forecast;
    }

    /**
     * @param array[] $packageGoods
     */
    protected function setPackageGoods(array $packageGoods): void
    {
        $this->packageGoods = $packageGoods;
    }

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
        return $this->getPropertyInstance($this->package);
    }

    /**
     * 获取预报的数据
     *
     * @return Forecast|mixed
     * @auther houxin 2021/12/13 22:46
     */
    public function getForecastInstance()
    {
        return $this->getPropertyInstance($this->forecast);
    }


    /**
     * 设置子类的属性示例
     *
     * @param Object $instance
     * @return mixed
     * @throws ClassNotInstantiatedException
     * @author houxin 2021/12/17 10:55
     */
    protected function getPropertyInstance($instance)
    {
        // 如果该类的属性不存在，则报错提示
        if (!$instance) {
            throw new ClassNotInstantiatedException(get_class($instance) . '：未实例化');
        }
        // 如果类的属性未加载，则调用该属性加载
        if ($instance->loadStatus) {
            $instance->init();
            $instance->loadStatus = true;
        }

        return $instance;
    }
}
