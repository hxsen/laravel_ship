<?php

namespace App\Services\ServiceProvider\Transport;

use App\Services\ServiceProvider\ForecastImpl\DeliveryForecast;
use App\Services\ServiceProvider\PackageImpl\DeliveryPackage;
use App\Services\ServiceProvider\Transport;

class delivery extends Transport
{
    /**
     * 包裹数据类
     *
     * @var string
     */
    protected $packageClass = DeliveryPackage::class;

    /**
     * 预报类
     *
     * @var string
     */
    protected $forecastClass = DeliveryForecast::class;

    public function register()
    {
        // 设置包裹类名
        $this->packageClass = DeliveryPackage::class;
        // 设置预报类型
        $this->forecastClass = DeliveryForecast::class;
    }
}
