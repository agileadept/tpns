<?php

namespace Agileadept\Tpns;

/**
 * Class AndroidMessage
 * @package Agileadept\Tpns
 */
class AndroidMessage
{
    public $n_ch_id = "";                          // 通知渠道 ID（仅移动推送自建通道生效），请参见 创建通知渠道。
    public $n_ch_name = "";                        // 通知渠道名称（仅移动推送自建通道生效） ，请参见 创建通知渠道。
    public $n_category = "";                       // 通知分类（仅移动推送自建通道且 Android SDK1.4.3.1及以上版本生效），请参见 移动推送自建通道通知分类说明。注意：适配华为本地通知自分类可使用此字段，详细请参见 华为本地通知适配说明。
    public $n_importance = 4;                      // 通知渠道优先级（仅移动推送自建通道且 Android SDK1.4.3.1及以上版本生效），请参见 移动推送自建通道通知渠道优先级说明。1: 对应 Android 系统的 IMPORTANCE_MIN；2: 对应 Android 系统的 IMPORTANCE_LOW；3: 对应 Android 系统的 IMPORTANCE_DEFAULT；4: 对应 Android 系统的 IMPORTANCE_HEIGHT。注意：仅在首次创建通知的 Channel 时生效，如本地已有相同的通知渠道此字段不生效。
    public $xm_ch_id = "";                         // 小米渠道 ID（仅小米推送通道生效）。
    public $fcm_ch_id = "";                        // FCM 渠道 ID（仅 FCM 推送通道生效）。
    public $hw_biz_type = 0;                       // 是否开启华为快通知：1：开启；0：关闭。注意：仅华为通道有效，其需要 联系华为商务 开通
    public $urgency = "NORMAL";                    // 华为/荣耀通道下发的消息紧急程度，取值HIGH、NORMAL（默认）。
    public $oppo_top_notification_bar_show = false;// OPPO 置顶功能：true：置顶；false：不置顶。注意：仅OPPO通道有效，其需要 联系 OPPO 商务 开通
    public $oppo_senior_push = false;              // OPPO 商业化推送（用于置顶和免折叠） ：true：不占个人配额和总配额；false：占用普通总额和个人配额。其需要 联系 OPPO 商务 开通。
    public $oppo_advertiser_id = "";               // OPPO 广告主 ID，OPPO 厂商分配。
    public $vivo_marketing = "";                   // vivo vpush 商业化字段，仅 vivo 通道有效，包含广告模板 ID、消息样式等，详情参见 vivo_marketing 参数说明，其需要 联系 vivo 商务 开通。
    public $hw_ch_id = "";                         // 华为渠道 ID（仅 华为推送通道生效）说明：如果您应用的数据处理位置为中国区时通知渠道无效，详细说明请您参见华为自定义渠道文档。
    public $hw_category = "";                      // 华为消息类型标识，确定消息提醒方式，对特定类型消息加快发送，参数详情请参见 华为的请求参数说明 的 category 参数。IM：即时聊天；VOIP：音视频通话；SUBSCRIPTION：订阅
    public $hw_importance = 0;                     // 华为消息的提醒级别，取值如下：1：表示通知栏消息预期的提醒方式为静默提醒，消息到达手机后，无铃声震动。；2：表示通知栏消息预期的提醒方式为强提醒，消息到达手机后，以铃声、震动提醒用户。终端设备实际消息提醒方式将根据 hw_category 字段取值或者 智能分类 结果进行调整。荣耀消息分类，对不同类别消息的展示 ，取值如下：1：表示消息为资讯营销类，默认展示方式为静默通知，仅在下拉通知栏展示。2：表示消息为服务通讯类，默认展示方式为锁屏展示+下拉通知栏展示。
    public $oppo_ch_id = "";                       // OPPO 渠道 ID（仅 OPPO 推送通道生效）
    public $vivo_category = "";                    // vivo 消息类型标示，根据 vivo 推送消息分类规范，自行对消息进行分类，请在发送消息时携带 vivo_category 字段并正确赋值，参数值详情请参见 vivo 消息分类。IM：即时聊天；ACCOUNT：账号与资产变动；SUBSCRIPTION：订阅提醒。注意：赋值请按照消息分类规则填写，且必须大写；若传入错误无效的值，否则返回错误码10096。
    public $vivo_ch_id = "";                       // vivo 渠道 ID：“0”代表运营消息，“1”代表系统消息（仅 vivo 推送通道生效）。说明：该字段即将下线，请6月30号之前申请 vivo_category 参数传值，否则被判为运营消息（推送受限）。
    public $builder_id = 0;                        // 本地通知样式标识，指定成您在终端预设的样式id， 不传则不指定。
    public $badge_type = -1;                       // 通知角标：-2：自动增加1，支持华为设备。-1：不变，支持华为、vivo 设备。[0, 100)：直接设置，支持华为、vivo 设备。注意：不同厂商设备的角标适配能力不同，各参数值实现效果请参见 角标适配指南  。
    public $ring = 1;                              // 是否有铃声：0：没有铃声；1：有铃声
    public $ring_raw = "";                         // 指定 Android 工程里 raw 目录中的铃声文件名，不需要后缀名。说明：自定义铃声仅华为、小米、FCM 和移动推送自建通道支持，需配合n_ch_id字段使用，配置步骤可参考 如何设置自定义铃声。
    public $vibrate = 1;                           // 是否使用震动：0：没有震动；1：有震动
    public $lights = 1;                            // 是否使用呼吸灯：0：不使用呼吸灯；1：使用呼吸灯
    public $clearable = 1;                         // 通知栏是否可清除:0: 不可清理；1:  可清理
    public $icon_type = 0;                         // 指定通知栏缩略图显示的是应用内图标还是网络资源图标 ：0：应用内图标，仅对移动推送自建通道有效。1：网络资源图标，仅移动推送自建通道、FCM、华为、荣耀通道支持
    public $icon_res = "";                         // 指定通知栏缩略图的具体图片资源 ：当 icon_type = 0：填写 Android 应用内的图片资源文件名称（不带文件后缀），仅对移动推送自建通道有效；当前 icon_type = 1：填写缩略图 url 地址，缩略图格式要求可参见 富媒体通知文档，仅移动推送自建通道、FCM、华为、荣耀通道支持
    public $style_id = 0;                          // 设置是否覆盖指定编号的通知样式:0: 不覆盖下发的样式；1: 优先使用在终端设置的样式
    public $small_icon = "";                       // 消息在状态栏显示的图标，若不设置，则显示应用图标
    /**
     * @var AndroidAction
     */
    public $action;             // 设置点击通知栏之后的行为，默认为打开 App，详情参考  action 参数说明
    public $custom_content = "";// 用户自定义的参数（需要序列化为 JSON String）获取方式详见 通知点击跳转-客户端获取参数。说明：华为官方通知：「2021年9月30日起停用V2协议」。移动推送已将华为推送协议升级到V5，V5协议不支持通过【附加参数】字段携带自定义参数。如果您集成了华为厂商通道，建议您改用 Intent 方式携带自定义参数，否则将导致自定义参数不能成功通过华为推送通道下发。
    public $show_type = 2;      // 应用前台时，是否展示通知 。 默认展示，仅对移动推送自建通道、FCM 通道有效。1：不展示；2：展示。说明：若取值为1且应用在前台，终端用户对该条推送无感知，但有抵达数据上报。
    public $icon_color = 0;     // 通知栏小图标染色，仅移动推送自建通道有效。需要使用 RGB 颜色的十进制值，例如 RGB 颜色 #01e240，请填入123456，0：默认不染色。

    public function filter()
    {
        if (isset($this->action) && $this->action != null) {
            if (method_exists($this->action, 'filter')) {
                $this->action->filter();
            }
        } else {
            unset($this->action);
        }
    }
}