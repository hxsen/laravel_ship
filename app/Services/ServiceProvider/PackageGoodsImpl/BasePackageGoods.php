<?php

namespace App\Services\ServiceProvider\PackageGoodsImpl;

use App\Services\ServiceProvider\Contracts\ExportData;
use App\Services\ServiceProvider\Contracts\ImportData;
use App\Services\ServiceProvider\Builders\PackageGoodsBuilder;
use App\Services\ServiceProvider\PackageGoods;

abstract class BasePackageGoods implements PackageGoods, ImportData, ExportData
{
    /**
     * @var PackageGoodsBuilder 包裹商品数据类
     */
    protected $packageGoodsDTO;

    /**
     * @var bool 数据是否加载完成
     */
    public $loadStatus = false;

    public function __construct(PackageGoodsBuilder $packageGoodsDTO)
    {
        $this->packageGoodsDTO = $packageGoodsDTO;
    }

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    public function init(): void
    {
        // TODO: Implement init() method.
    }
}
