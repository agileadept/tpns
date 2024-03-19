<?php

namespace Agileadept\Tpns;

/**
 * Class AndroidActionBrowserAttr
 * @package Agileadept\Tpns
 */
class AndroidActionBrowserAttr
{
    public $url = "";   // 网页地址，仅支持 http、https，类型为 String
    public $confirm = 0;// 是否需要用户确认，类型为 Integer。1：需要确认；0：不需要确认

    public function filter()
    {
    }
}