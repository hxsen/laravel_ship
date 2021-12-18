<?php

namespace App\Services\ServiceProvider\Contracts;

interface ImportData
{
    // 加载数据
    public function init(): void;
}
