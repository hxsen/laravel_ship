<?php

namespace App\Services\ServiceProvider;

use App\Exceptions\ServiceProvider\ClassNotInstantiatedException;
use App\Services\ServiceProvider\Traits\DeclaredValue;
use App\Services\ServiceProvider\Traits\PackageTrait;

abstract class Transport
{
    use PackageTrait, DeclaredValue;

    /**
     * @var Package 获取包裹数据
     */
    private $package;

    /**
     * 预报信息类
     *
     * @var Forecast
     */
    private $forecast;

    /**
     * 包裹商品列表
     *
     * @var PackageGoods[] 包裹商品信息
     */
    private $packageGoodsList;

    /**
     * 设置package类实例
     *
     * @param Package $package
     * @return $this
     * @auther houxin 2021/12/18 15:37
     */
    protected function setPackage(Package $package): self
    {
        $this->package = $package;
        return $this;
    }

    /**
     * 设置预报类
     *
     * @param Forecast $forecast
     * @return $this
     * @auther houxin 2021/12/18 15:37
     */
    protected function setForecast(Forecast $forecast): self
    {
        $this->forecast = $forecast;
        return $this;
    }

    /**
     * 设置包裹商品实例
     *
     * @param array $packageGoods
     * @return $this
     * @auther houxin 2021/12/18 15:38
     */
    protected function setPackageGoodsList(array $packageGoodsList): self
    {
        $this->packageGoodsList = $packageGoodsList;
        return $this;
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
    public function getPackageInstance(): Package
    {
        return $this->getPropertyInstance($this->package);
    }

    /**
     * 获取预报的数据
     *
     * @return Forecast|mixed
     * @auther houxin 2021/12/13 22:46
     */
    public function getForecastInstance(): Forecast
    {
        return $this->getPropertyInstance($this->forecast);
    }

    /**
     * 获取预报的数据
     *
     * @return PackageGoods[]
     * @auther houxin 2021/12/18 17:48
     */
    public function getPackageGoodsList()
    {
        return $this->getPropertyListInstance($this->packageGoodsList);
    }


    /**
     * 设置子类的属性实例
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

    /**
     * 设置子类的属性集合实例
     *
     * @param array $instanceList
     * @return array
     * @throws ClassNotInstantiatedException
     * @auther houxin 2021/12/18 17:54
     */
    protected function getPropertyListInstance(array $instanceList)
    {
        // 循环处理内部的单个类
        return tap($instanceList, function () use($instanceList) {
            foreach ($instanceList as $instance) {
                $this->getPropertyInstance($instance);
            }
        });
    }

    /**
     * 获取当前类的所有商品
     *
     * @return array
     * @auther houxin 2021/12/18 16:11
     */
    public function toArray()
    {
        // 包裹商品数据处理
        $packageGoodsArray = [];
        foreach ($this->packageGoodsList as $packageGoods) {
            $packageGoodsArray[] = $packageGoods->toArray();
        }

        // 加载所有的数据
        $list = [
            'package' => $this->getPackageInstance()->toArray(),
            'forecast' => $this->getPackageInstance()->toArray(),
            'packageGoods' => $packageGoodsArray,
        ];

        return $list;
    }
}
