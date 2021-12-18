<?php

namespace App\Services\ServiceProvider\PackageImpl;

use App\Services\ServiceProvider\Interfaces\ExportData;
use App\Services\ServiceProvider\Interfaces\ImportData;
use App\Services\ServiceProvider\Package;

abstract class BasePackage implements Package, ImportData, ExportData
{
    /**
     * @var bool 数据是否加载完成
     */
    public $loadStatus = false;

    /**
     * @var string 包裹号
     */
    protected $packageNo;

    public function init(): void
    {
        // 该步骤需要查询所有有需要的数据
    }

    public function toArray(): array
    {
        // 读取所有get前缀的值，并转成数据并返回
    }

    public function getPackageMkcUsdPrice(): float
    {
        return 0.00;
    }

    public function packageMkcLocalPrice($price, $from, $to): float
    {
        return 0.00;
    }
}
