<?php

namespace App\Services\ServiceProvider\PackageImpl;

class RejectedPackage extends BasePackage
{
    public function toArray(): array
    {
        $properties = parent::toArray();

        return $properties;
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
