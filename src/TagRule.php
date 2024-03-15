<?php

namespace Agileadept\Tpns;

/**
 * Class TagRule
 * @package Agileadept\Tpns
 */
class TagRule
{
    /**
     * @var TagItem[]
     */
    public $tag_items;
    public $is_not = false;
    public $operator = "";

    public function filter()
    {
        if (isset($this->tag_items) && $this->tag_items == null) {
            unset($this->tag_items);
        }
    }
}