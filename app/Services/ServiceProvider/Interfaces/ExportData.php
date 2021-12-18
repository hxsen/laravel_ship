<?php

namespace App\Services\ServiceProvider\Interfaces;

interface ExportData
{
    /**
     * 展示类内部的所有数据
     *
     * @return array
     * @auther houxin 2021/12/18 15:53
     */
    public function toArray(): array;
}
