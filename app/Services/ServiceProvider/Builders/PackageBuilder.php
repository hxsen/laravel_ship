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
        // 这块设计的目的有以下两点
        // 1、在实例化package类之前，对数据进行默认值处理
        // 2、可以对数据进行校验，有些数据可能依赖其他的数据而存在

        return new $className($this);
    }
}
