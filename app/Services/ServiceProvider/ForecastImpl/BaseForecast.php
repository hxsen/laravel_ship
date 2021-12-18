<?php

namespace App\Services\ServiceProvider\ForecastImpl;

use App\Services\ServiceProvider\Builders\ForecastBuilder;
use App\Services\ServiceProvider\Forecast;
use App\Services\ServiceProvider\Contracts\ExportData;
use App\Services\ServiceProvider\Contracts\ImportData;

abstract class BaseForecast implements Forecast, ImportData, ExportData
{
    /**
     * @var int 规则id
     */
    protected $ruleId;

    public function __construct(ForecastBuilder $builder)
    {
        $this->ruleId = $builder->getRuleId();
    }

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
