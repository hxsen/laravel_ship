<?php

namespace App\Services\ServiceProvider;

interface PackageGoods
{
    /**
     * 获取商品名称
     *
     * @return string
     * @auther houxin 2021/12/18 15:57
     */
    public function getGoodsName(): string;

    /**
     * 获取商品的重量
     *
     * @return float
     * @auther houxin 2021/12/18 15:57
     */
    public function getGoodsWeight(): float;

    /**
     * 获取商品的价格
     *
     * @return float
     * @auther houxin 2021/12/18 15:57
     */
    public function getGoodsPrice(): float;

    /**
     * 获取商品的数量
     *
     * @return int
     * @auther houxin 2021/12/18 15:57
     */
    public function getGoodsNumber(): int;
}