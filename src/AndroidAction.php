<?php

namespace Agileadept\Tpns;

/**
 * Class AndroidAction
 * @package Agileadept\Tpns
 */
class AndroidAction
{
    public $action_type = 1;// 点击动作类型，1：打开 activity 或 App 本身；2：打开浏览器；3：打开 App 自定义页面（推荐使用，参考 使用 Intent 方式跳转指引）
    public $activity = "";  // activity 完整名称，例如 com.x.y.PushActivity
    /**
     * @var AndroidActionActivityAttr
     */
    public $aty_attr;// activity 属性，if：Intent 的 Flag 属性，类型为 Integer；pf：PendingIntent 的 Flag 属性，类型为 Integer

    /**
     * @var AndroidActionBrowserAttr
     */
    public $browser;// 打开浏览器操作，url：网页地址，仅支持 http、https，类型为 String；confirm：是否需要用户确认，类型为 Integer。1：需要确认；0：不需要确认

    public $intent = "";// 自定义 scheme，例如 xgscheme://com.tpns.push/notify_detail

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