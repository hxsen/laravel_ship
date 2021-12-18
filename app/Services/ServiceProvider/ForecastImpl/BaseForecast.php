<?php

namespace App\Services\ServiceProvider\ForecastImpl;

use App\Services\ServiceProvider\Forecast;
use App\Services\ServiceProvider\Interfaces\ExportData;
use App\Services\ServiceProvider\Interfaces\ImportData;

abstract class BaseForecast implements Forecast, ImportData, ExportData
{
    /**
     * @var bool 数据是否加载完成
     */
    public $loadStatus = false;

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    public function init(): void
    {
        // TODO: Implement init() method.
    }

    public function getRuleId(): int
    {
        return 9;
    }
}
