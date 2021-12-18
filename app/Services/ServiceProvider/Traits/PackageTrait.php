<?php

namespace App\Services\ServiceProvider\Traits;

trait PackageTrait
{
    public function getPackageNo() {
        return $this->getPackageInstance()->getPackageNo();
    }

    /**
     * 获取本地的PackageMkcLocalPrice金额
     *
     * @return float
     * @auther houxin 2021/12/18 18:28
     */
    public function getPackageMkcLocalPrice()
    {
        return $this->getPackageInstance()->packageMkcLocalPrice($this->getPackageInstance()->getPackageMkcUsdPrice(), 'USD', 'currency');
    }
}
