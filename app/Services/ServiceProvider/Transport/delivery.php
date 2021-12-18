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
        // 使用建造者模式的原因，是防止构造函数传递太多参数
        // 在生成对应的类之前可以对数据进行多一步的校验和处理
        // 传递一个数组，不就可以了？
        // 是否有点过度设计了？

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
