<?php

namespace App\Services\ServiceProvider\PackageImpl;

use App\Services\ServiceProvider\Package;

class DeliveryPackage implements Package
{
    /**
     * @var bool 数据是否加载完成
     */
    public $loadStatus = false;

    public function init()
    {
        // 该步骤需要查询所有有需要的数据
    }

    /**
     * @inheritDoc
     */
    public function getPackageNo()
    {
        // TODO: Implement getPackageNo() method.
    }

    /**
     * @inheritDoc
     */
    public function getPackageWeight()
    {
        // TODO: Implement getPackageWeight() method.
    }
}
