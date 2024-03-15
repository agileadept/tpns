<?php

namespace Agileadept\Tpns;

/**
 * Class iOSMessage
 * @package Agileadept\Tpns
 */
class iOSMessage
{
    /**
     * @var Aps
     */
    public $aps;
    public $custom = "";

    public function filter()
    {
        if (isset($this->aps) && $this->aps != null) {
            if (method_exists($this->aps, 'filter')) {
                $this->aps->filter();
            }
        } else {
            unset($this->aps);
        }
    }
}