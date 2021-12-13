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

    public function getPackageInstance()
    {
        if (!$this->package) {
            $this->package = new $this->packageClass();
        }
        return $this->package;
    }
}
