<?php

namespace App\Services\ServiceProvider\PackageImpl;

class DeliveryPackage extends BasePackage
{
    public function toArray(): array
    {
        $properties = parent::toArray();

        // $properties['package_weight'] = $this->getPackageWeight();

        return $properties;
    }

    /**
     * @inheritDoc
     */
    public function getPackageNo()
    {
        // TODO: Implement getPackageNo() method.

        return $this->packageNo;
    }

    /**
     * @inheritDoc
     */
    public function getPackageWeight()
    {
        // TODO: Implement getPackageWeight() method.
    }

}
