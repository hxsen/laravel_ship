<?php

namespace App\Services\ServiceProvider\Traits;

use App\Services\DeclaredValue\DeclaredValueService;

trait DeclaredValue
{
    /**
     * 获取申报价值
     *
     * @return float
     * @auther houxin 2021/12/18 18:12
     */
    public function getDeclaredValue(): float
    {
        // 申报规则ID
        $ruleId = $this->getForecastInstance()->getRuleId();
        // 参数1
        $param1 = 'param1';
        // 参数2
        $param2 = 'param2';

        return DeclaredValueService::calcDeclaredValue($ruleId, $param1, $param2);
    }
}
