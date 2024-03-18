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
    public $tag_items;     // 标签规则，参见 tag_items 说明
    public $is_not = false;// 是否对 tag_items 数组的运算结果进行非运算。true：进行非运算；false：不进行非运算
    public $operator = ""; // tag_rules 数组内各元素的运算符，第一个 tag_rules 元素的 operator 为无效数据，第二个 tag_rules 元素的 operator 作为第一个和第二个 tag_rules 元素之间的运算符。OR： 或运算;AND：且运算

    public function filter()
    {
        if (isset($this->tag_items) && $this->tag_items == null) {
            unset($this->tag_items);
        }
    }
}