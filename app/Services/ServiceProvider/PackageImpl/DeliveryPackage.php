<?php

namespace App\Services\ServiceProvider\PackageImpl;

use App\Services\ServiceProvider\Package;

class DeliveryPackage implements Package
{
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
