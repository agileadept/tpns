<?php

namespace Agileadept\Tpns;

/**
 * Class Request
 * @package Agileadept\Tpns
 */
class Request
{
    public $audience_type = "";// 推送目标
    public $platform = "";
    /**
     * @var Message
     */
    public $message;          // 消息体，请参见 消息体类型
    public $message_type = "";// 消息类型：notify：通知;message：透传消息/静默消息

    /**
     * @var TagRule[]
     */
    public $tag_rules;                // 签组合推送，可设置'与'、'或'、'非'组合规则，注意：当与 tag_list 二者共存时，tag_list 字段自动无效，参数说明请查看 tag_rules 参数说明
    public $token_list;               // array of string，若单设备推送：要求 audience_type=token参数格式：[ "token1" ]若设备列表推送：参数格式：[ "token1","token2" ]，最多1000个 token
    public $account_list;             // array of string，若单账号推送：要求 audience_type = account参数格式：[ "account1" ]若账号列表推送：参数格式：["account1","account2"]，最多1000 个 account
    public $environment = "";         // 用户指定推送环境，仅限 iOS 平台推送使用：product： 推送生产环境dev： 推送开发环境，注册打包的环境与推送环境需要保存一致，请参见 推送环境选择说明
    public $upload_id = 0;            // 号码包或 token 包的上传 ID
    public $expire_time = 259200;     // 消息离线存储时间（单位为秒），最长72小时，若 expire_time = 0，则表示实时消息；若 expire_time 大于0，且小于800s，则系统会重置为800s；若expire_time >= 800s，按实际设置时间存储，最长72小时设置的最大值不得超过259200，否则会导致推送失败，如需调整离线消息时间，请联系 在线客服 申请
    public $send_time = "";           // 定时推送任务，指定推送时间，可选择未来90天内的时间：格式为 yyyy-MM-DD HH:MM:SS；若小于服务器当前时间，则会立即推送；仅全量推送、号码包推送和标签推送支持此字段
    public $multi_pkg = false;        // 多包名推送：当 App 存在多个渠道包（例如应用宝、豌豆荚等），并期望推送时所有渠道的 App 都能收到消息，可将该值设置为 true。注意：该参数默认控制移动推送自建通道的多包名推送，需要实现厂商通道多包名推送详见 厂商通道多包名配置 文档
    public $plan_id = "";             // 推送计划 ID，推送计划创建及使用方式可 参考文档
    public $account_push_type = 0;    // 0：往账号的最新的 device 上推送信息；1：往账号关联的所有 device 设备上推送信息
    public $account_type = 0;         // 账号类型，需要与推送的账号所属类型一致，取值可参考 账号类型取值表
    public $collapse_id = 0;          // 消息覆盖参数，在前一条推送任务已经调度下发后，如果第二条推送任务携带相同的 collapse_id  则会停止前一条推送中尚未下发的移动推送自建通道数据，同时会覆盖展示第一条推送任务的消息。已完成任务的 collapse_id 可以通过 单个任务推送信息查询接口 获取。目前仅支持全推、标签推送、号码包推送。
    public $push_speed = 0;           // 推送限速设置每秒 X 条，X 取值参数范围1000 - 50000；仅全量推送、号码包推送和标签推送有效
    public $tpns_online_push_type = 0;// 在线设备是否通过移动推送自建通道下发：0：默认在线走移动推送自建通道下发；1：在线不优先走移动推送自建通道下发
    public $ignore_invalid_token = 0; // 0：代表如果有无效的token则这个接口调用失败；1：代表忽略无效的token继续进行下发；注意：仅对 token 列表推送和单 token 推送有效
    public $force_collapse = false;   // 对于不支持消息覆盖的 OPPO 、vivo 通道的设备，是否进行消息下发。false：不下发消息；true：下发消息

    /**
     * @var ChannelRule[]
     */
    public $channel_rules;// 推送通道选择策略。可自定义该条推送允许通过哪些通道下发，默认允许通过所有通道下发，详细推送策略参考 通道策略，channel_rules  数组单元素数据结构见下 channel_rules 参数说明

    /**
     * @var LoopParam
     */
    public $loop_param;// 仅全量推送、号码包推送和标签推送支持此字段，详情见下文 loop_param 参数说明

    public function filter()
    {
        if (isset($this->message) && $this->message != null) {
            if (method_exists($this->message, 'filter')) {
                $this->message->filter();
            }
        } else {
            unset($this->message);
        }

        if (isset($this->tag_rules) && $this->tag_rules == null) {
            unset($this->tag_rules);
        }

        if (isset($this->token_list) && $this->token_list == null) {
            unset($this->token_list);
        }

        if (isset($this->account_list) && $this->account_list == null) {
            unset($this->account_list);
        }

        if (isset($this->channel_rules) && $this->channel_rules == null) {
            unset($this->channel_rules);
        }

        if (isset($this->loop_param) && $this->loop_param != null) {
            if (method_exists($this->loop_param, 'filter')) {
                $this->loop_param->filter();
            }
        } else {
            unset($this->loop_param);
        }
    }

    public function Validate()
    {
        if (empty($this->audience_type)) {
            throw new \Exception("audience_type is not set");
        }

        if ($this->audience_type != Tpns::AUDIENCE_ALL &&
            $this->audience_type != Tpns::AUDIENCE_TAG &&
            $this->audience_type != Tpns::AUDIENCE_TOKEN &&
            $this->audience_type != Tpns::AUDIENCE_TOKEN_LIST &&
            $this->audience_type != Tpns::AUDIENCE_ACCOUNT &&
            $this->audience_type != Tpns::AUDIENCE_ACCOUNT_LIST &&
            $this->audience_type != Tpns::AUDIENCE_ACCOUNT_PACKAGE &&
            $this->audience_type != Tpns::AUDIENCE_TOKEN_PACKAGE) {
            throw new \Exception ("invalid audience_type: " . $this->audience_type);
        }

        if ($this->audience_type == Tpns::AUDIENCE_TOKEN || $this->audience_type == Tpns::AUDIENCE_TOKEN_LIST) {
            if (empty($this->token_list)) {
                throw new \Exception ("empty token_list");
            }
            if (!is_array($this->token_list)) {
                throw new \Exception ("token_list need to be array");
            }
        }

        if ($this->audience_type == Tpns::AUDIENCE_ACCOUNT || $this->audience_type == Tpns::AUDIENCE_ACCOUNT_LIST) {
            if (empty($this->account_list)) {
                throw new \Exception ("empty account_list");
            }
            if (!is_array($this->account_list)) {
                throw new \Exception ("account_list need to be array");
            }
        }

        if ($this->audience_type == Tpns::AUDIENCE_TAG) {
            if (empty($this->tag_rules)) {
                throw new \Exception ("empty tag_rules");
            }
            if (!is_array($this->tag_rules)) {
                throw new \Exception ("tag_rules need to be array");
            }
        }

        //if (empty($this->platform)) {
        //    throw new \Exception("empty platform");
        //}

        //if ($this->platform != PLATFORM_ANDROID && $this->platform != PLATFORM_IOS) {
        //    throw new \Exception("invalid platform: " . $this->platform);
        //}

        if ($this->message == null) {
            throw new \Exception("empty message");
        }

        if (empty($this->message_type)) {
            throw new \Exception("empty message_type");
        }

        if ($this->message_type != Tpns::MESSAGE_NOTIFY && $this->message_type != Tpns::MESSAGE_MESSAGE) {
            throw new \Exception("invalid message_type: " . $this->message_type);
        }

        //if ($this->platform == PLATFORM_IOS) {
        if ($this->message->ios != null) {
            if (empty($this->environment)) {
                throw new \Exception("empty environment");
            }
            if ($this->environment != Tpns::ENVIRONMENT_PROD && $this->environment != Tpns::ENVIRONMENT_DEV) {
                throw new \Exception("invalid environment: " . $this->environment);
            }
        }

        if (isset($this->channel_rules)) {
            if (!is_array($this->channel_rules)) {
                throw new \Exception ("channel_rules need to be array");
            }
        }
    }

    public function Marshal()
    {
        $this->filter();

        //if ($this->platform == PLATFORM_ANDROID) {
        //    unset($this->message->ios);
        //}

        //if ($this->platform == PLATFORM_IOS) {
        //    unset($this->message->android);

        if (isset($this->message) && $this->message != null) {
            if (isset($this->message->ios) && $this->message->ios != null) {
                if (isset($this->message->ios->aps) && $this->message->ios->aps != null) {
                    $aps = $this->message->ios->aps;
                    if (isset($aps->content_available) && $aps->content_available != null &&
                        isset($aps->mutable_content) && $aps->mutable_content != null) {
                        $this->message->ios->aps = [
                            "alert" => $aps->alert,
                            "badge_type" => $aps->badge_type,
                            "category" => $aps->category,
                            "content-available" => $aps->content_available,
                            "sound" => $aps->sound,
                            "mutable-content" => $aps->mutable_content,
                        ];
                    }
                }
            }
        }
        //}

        $data = json_encode($this);
        return $data;
    }
}