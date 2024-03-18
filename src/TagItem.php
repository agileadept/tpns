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

    public $tags;// array of string
    public $is_not = false;
    public $tags_operator = "";
    public $items_operator = "";
    public $tag_type = "";

    public function filter()
    {
        if (isset($this->tags) && $this->tags == null) {
            unset($this->tags);
        }
    }
}