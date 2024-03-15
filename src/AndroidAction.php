<?php

namespace Agileadept\Tpns;

/**
 * Class AndroidAction
 * @package Agileadept\Tpns
 */
class AndroidAction
{
    public $action_type = 1;
    public $activity = "";
    /**
     * @var AndroidActionActivityAttr
     */
    public $aty_attr;
    /**
     * @var AndroidActionBrowserAttr
     */
    public $browser;
    public $intent = "";

    public function filter()
    {
        if (isset($this->aty_attr) && $this->aty_attr != null) {
            if (method_exists($this->aty_attr, 'filter')) {
                $this->aty_attr->filter();
            }
        } else {
            unset($this->aty_attr);
        }

        if (isset($this->browser) && $this->browser != null) {
            if (method_exists($this->browser, 'filter')) {
                $this->browser->filter();
            }
        } else {
            unset($this->browser);
        }
    }
}