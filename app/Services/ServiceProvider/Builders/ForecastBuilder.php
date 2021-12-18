<?php

namespace App\Services\ServiceProvider\Builders;

use App\Services\ServiceProvider\ForecastImpl\DeliveryForecast;

class ForecastBuilder
{
    protected $ruleId;

    /**
     * @return mixed
     */
    public function getRuleId()
    {
        return $this->ruleId;
    }

    /**
     * @param mixed $ruleId
     */
    public function setRuleId($ruleId): self
    {
        $this->ruleId = $ruleId;

        return $this;
    }


    /**
     * @param $className
     * @return DeliveryForecast
     * @auther houxin 2021/12/19 0:10
     */
    public function build($className)
    {
        return new $className($this);
    }
}
