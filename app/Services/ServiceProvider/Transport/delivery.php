<?php

namespace App\Services\ServiceProvider\Transport;

use App\Services\ServiceProvider\Builders\ForecastBuilder;
use App\Services\ServiceProvider\Builders\PackageBuilder;
use App\Services\ServiceProvider\ForecastImpl\DeliveryForecast;
use App\Services\ServiceProvider\PackageImpl\DeliveryPackage;
use App\Services\ServiceProvider\Transport;

class delivery extends Transport
{
    public function register()
    {
        // 包裹数据设置
        $package = (new PackageBuilder())
            ->setPackageNo('abc')
            ->build(DeliveryPackage::class);

        // 预报数据构建
        $forecast = (new ForecastBuilder())
            ->build(DeliveryForecast::class);

        // 设置包裹类名
        $this->setPackage($package)
            // 设置预报类型
            ->setForecast($forecast);
    }
}
