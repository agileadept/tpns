<?php

namespace Agileadept\Tpns;

/**
 * Class Message
 * @package Agileadept\Tpns
 */
class Message
{
    public $title = "";
    public $content = "";
    /**
     * @var AcceptTimeRange[]
     */
    public $accept_time;
    public $thread_id = "";
    public $thread_sumtext = "";
    public $xg_media_resources = "";
    public $xg_media_audio_resources = "";
    /**
     * @var AndroidMessage
     */
    public $android;
    /**
     * @var iOSMessage
     */
    public $ios;

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