<?php

namespace App\Services\ServiceProvider\Traits;

trait PackageTrait
{
    public function getPackageNo() {
        return $this->getPackageInstance()->getPackageNo();
    }
}
