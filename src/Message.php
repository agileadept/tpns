<?php

namespace Agileadept\Tpns;

/**
 * Class Message
 * @package Agileadept\Tpns
 */
class Message
{
    public $title = "";  // 消息标题
    public $content = "";// 消息内容
    /**
     * @var AcceptTimeRange[]
     */
    public $accept_time;                  // 消息将在哪些时间段允许推送给用户。单个元素由 "start" 和 "end" 组成的起止时间对组成。"start" 和 "end" 由 hour （小时）和 min（分钟）描述对应时刻，详细参考具体示例。注意：因厂商限制， 仅对移动推送自建通道有效
    public $thread_id = "";               // 通知分组折叠的组别识别名。注意：因厂商限制， 仅对移动推送自建通道有效
    public $thread_sumtext = "";          // 通知分组折叠后显示的摘要，thread_id 非空时有效。注意：因厂商限制， 仅对移动推送自建通道有效
    public $xg_media_resources = "";      // 通知栏大图片 url 地址，仅对移动推送自建通道和小米通道生效；注意：如需使用小米通道大图通知功能，需先调用小米图片上传接口上传图片文件，获取小米指定的图片地址 pic_url ，再填入移动推送推送对应的参数 xg_media_resources 中。
    public $xg_media_audio_resources = "";// 音频富媒体元素地址。支持 mp3 格式音频，建议大小在5MB以内。注意：仅移动推送自建通道支持该参数下发，其他通道不下发该参数

    /**
     * @var AndroidMessage
     */
    public $android;// 安卓通知高级设置结构体，请参见 Android 结构体说明
    /**
     * @var iOSMessage
     */
    public $ios;// iOS 消息结构体，请参见 iOS 字段说明

    public function filter()
    {
        if (isset($this->accept_time) && $this->accept_time == null) {
            unset($this->accept_time);
        }

        if (isset($this->android) && $this->android != null) {
            if (method_exists($this->android, 'filter')) {
                $this->android->filter();
            }
        } else {
            unset($this->android);
        }

        if (isset($this->ios) && $this->ios != null) {
            if (method_exists($this->ios, 'filter')) {
                $this->ios->filter();
            }
        } else {
            unset($this->ios);
        }
    }
}