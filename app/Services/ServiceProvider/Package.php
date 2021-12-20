<?php

namespace App\Services\ServiceProvider;

use App\Services\ServiceProvider\Builders\PackageBuilder;

/**
 * 定义一些包裹的通用属性
 */
interface Package
{
    /**
     * 通过数据模型实例化数据
     *
     * @param PackageBuilder $builder
     */
    public function __construct(PackageBuilder $builder);

    /**
     * 获取包裹号
     *
     * @return mixed
     * @auther houxin 2021/12/13 22:13
     */
    public function getPackageNo();

    /**
     * 获取包裹的重量
     *
     * @return mixed
     * @auther houxin 2021/12/13 22:14
     */
    public function getPackageWeight();

    /**
     * 获取package_mkc_usd_price金额
     *
     * @return mixed
     * @auther houxin 2021/12/18 18:27
     */
    public function getPackageMkcUsdPrice(): float;

    /**
     * 获取汇率
     *
     * @param $price
     * @param $from
     * @param $to
     * @return float
     * @auther houxin 2021/12/18 18:25
     */
    public function packageMkcLocalPrice($price, $from, $to): float;
}
