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

    public function init(): void
    {
        // 该步骤需要查询所有有需要的数据
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}
