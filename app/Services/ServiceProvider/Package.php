<?php

namespace App\Services\ServiceProvider;

/**
 * 定义一些包裹的通用属性
 */
interface Package
{
    /**
     * 初始化 然后加载数据
     *
     * @return mixed
     * @auther houxin 2021/12/13 22:40
     */
    public function init();

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
}
