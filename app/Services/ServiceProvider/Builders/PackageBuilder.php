<?php

namespace App\Services\ServiceProvider\Builders;

use App\Services\ServiceProvider\Package;

class PackageBuilder
{
    protected $packageNo;

    /**
     * @return mixed
     */
    public function getPackageNo()
    {
        return $this->packageNo;
    }


    /**
     * @param mixed $packageNo
     */
    public function setPackageNo($packageNo): self
    {
        $this->packageNo = $packageNo;

        return $this;
    }

    /**
     * 构建包裹类
     *
     * @param string $class
     * @return Package
     * @auther houxin 2021/12/18 23:47
     */
    public function build($className)
    {
        return new $className($this);
    }
}
