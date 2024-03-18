<?php

namespace Agileadept\Tpns;

/**
 * Class TagItem
 * @package Agileadept\Tpns
 */
class TagItem
{
    const XG_USER_DEFINE = 'xg_user_define';                // 自定义标签，tag1，tag2 等
    const XG_AUTO_VERSION = 'xg_auto_version';              // App版本，1.1.0，1.2.0.1等
    const XG_AUTO_PROVINCE = 'xg_auto_province';            // 设备省份信息，guangdong，shanghai 等
    const XG_AUTO_ACTIVE = 'xg_auto_active';                // 活跃信息，20200131，20200201等
    const XG_AUTO_SDKVERSION = 'xg_auto_sdkversion';        // XG SDK版本，1.1.5.2，1.1.5.3等
    const XG_AUTO_SYSTEMLANGUAGE = 'xg_auto_systemlanguage';// 系统语言，zh，en 等
    const XG_AUTO_DEVICEBRAND = 'xg_auto_devicebrand';      // 手机品牌，Xiaomi，vivo 等
    const XG_AUTO_DEVICEVERSION = 'xg_auto_deviceversion';  // 手机机型，MI 9 SE，vivo X9Plus 等
    const XG_AUTO_COUNTRY = 'xg_auto_country';              // 国家，CN，SG 等

    public $tags;               // array of string，具体标签值，类型：string，如 tag1，guangdong 等。
    public $is_not = false;     // 是否对 tag 数组的运算结果进行非运算。true：非运算；false：不进行非运算
    public $tags_operator = ""; // tags 内标签对应的运算符。OR：或运算；AND：且运算
    public $items_operator = "";// tag_items 数组内各元素的运算符，第一个 tag_items 元素的 items_operator 为无效数据，第二个 tag_items 元素的 items_operator 作为第一个和第二个 tag_items 元素之间的运算符。 OR ：或运算 ;AND ：且运算。注意：不同规则之间运算符逻辑优先级「AND」>「OR」
    public $tag_type = "";      // 参见  tag_type 取值表

    public function filter()
    {
        if (isset($this->tags) && $this->tags == null) {
            unset($this->tags);
        }
    }
}