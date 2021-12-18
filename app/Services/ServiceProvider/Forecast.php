<?php

namespace App\Services\ServiceProvider;

use App\Services\ServiceProvider\Builders\ForecastBuilder;

interface Forecast
{
    /**
     * 实例化预报类的数据
     *
     * @param ForecastBuilder $forecastDTO
     */
    public function __construct(ForecastBuilder $forecastDTO);

    /**
     * 获取规则ID
     *
     * @return int
     * @auther houxin 2021/12/18 22:19
     */
    public function getRuleId(): int;
}
