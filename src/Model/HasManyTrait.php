<?php
namespace Gabe\Dayu\Model;

trait HasManyTrait
{
    public function dayus()
    {
           return $this->morphMany('\Gabe\Dayu\Model\DaYu', 'dayuable');
    }
}