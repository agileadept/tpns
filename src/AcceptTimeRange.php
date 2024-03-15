<?php

namespace Agileadept\Tpns;

/**
 * Class AcceptTimeRange
 * @package Agileadept\Tpns
 */
class AcceptTimeRange
{
    /**
     * @var AcceptTime
     */
    public $start;
    /**
     * @var AcceptTime
     */
    public $end;

    public function filter()
    {
        if (isset($this->start) && $this->start != null) {
            if (method_exists($this->start, 'filter')) {
                $this->start->filter();
            }
        } else {
            unset($this->start);
        }

        if (isset($this->end) && $this->end != null) {
            if (method_exists($this->end, 'filter')) {
                $this->end->filter();
            }
        } else {
            unset($this->end);
        }
    }
}