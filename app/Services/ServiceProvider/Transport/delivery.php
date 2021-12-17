<?php

namespace App\Services\ServiceProvider\Transport;

use App\Services\ServiceProvider\ForecastImpl\DeliveryForecast;
use App\Services\ServiceProvider\PackageImpl\DeliveryPackage;
use App\Services\ServiceProvider\Transport;

class delivery extends Transport
{
    public function register()
    {
        // 设置包裹类名
        $this->package = new DeliveryPackage();
        // 设置预报类型
        $this->forecast = new DeliveryForecast();
    }
}
