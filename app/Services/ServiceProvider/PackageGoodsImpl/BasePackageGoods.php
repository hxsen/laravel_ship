<?php

namespace App\Services\ServiceProvider\PackageGoodsImpl;

use App\Services\ServiceProvider\Interfaces\ExportData;
use App\Services\ServiceProvider\Interfaces\ImportData;
use App\Services\ServiceProvider\PackageGoods;

abstract class BasePackageGoods implements PackageGoods, ImportData, ExportData
{
    /**
     * @var bool 数据是否加载完成
     */
    public $loadStatus = false;

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    public function init(): void
    {
        // TODO: Implement init() method.
    }
}
