<?php


require_once ("yamaha_xml.php");
require_once("yamaha_functions.php");
require_once("yamaha_config.php");


$yamaha = new YamahaController($URL_yamaha, [
    'getAll_infos' => $xml_get_full_info,
    'getVolume' => $xml_get_volume,
    'setVolume' => $xml_set_volume,
    'stepVolume' => $xml_step_volume,
    'getSurround' => $xml_get_surround,
    'setSurround' => $xml_set_surround,
    'getPower' => $xml_get_power,
    'setPower' => $xml_set_power,
    'setSleep' => $xml_set_sleep,
    'getSleep' => $xml_get_sleep,
    'setMute' => $xml_set_mute,
    'getMute' => $xml_get_mute,
    'setInput' => $xml_set_input,
    'getInput' => $xml_get_input,
    'setTreble' => $xml_set_treble,
    'getTreble' => $xml_get_treble,
    'setHDMIOutput' => $xml_set_hdmi_output,
    'getHDMIOutput' => $xml_get_hdmi_output,
    'setVideoOutput' => $xml_set_video_output,
    'getVideoOutput' => $xml_get_video_output,
    'setUkwChannelInfo' => $xml_set_ukw_tuner_select_channel,
    'getUkwChannelInfo' => $xml_get_ukw_tuner_select_channel,
    'getIpodMetaInfo' => $xml_get_ipod_meta_info,
    'setIpodShuffle' => $xml_set_ipod_play_mode_shuffle,
    'getIpodShuffle' => $xml_get_ipod_play_mode_shuffle,
    'setIpodRepeat' => $xml_set_ipod_play_mode_repeat,
    'getIpodRepeat' => $xml_get_ipod_play_mode_repeat,
    'getIpodUsbPlayPause' => $xml_get_ipod_usb_play_pause,
    'setIpodUsbPlayPause' => $xml_set_ipod_usb_play_pause,
    'getUsbMetaInfo' => $xml_get_usb_meta_info,
    'getUsbPlayStopNextPrev' => $xml_get_usb_play_stop_next_prev,
    'setUsbPlayStopNextPrev' => $xml_set_usb_play_stop_next_prev,
    'getUsbShuffle' => $xml_get_usb_shuffle,
    'setUsbShuffle' => $xml_set_usb_shuffle,
    'getUsbRepeat' => $xml_get_usb_repeat,
    'setUsbRepeat' => $xml_set_usb_repeat,
    'setBassHeadphone' => $xml_set_bass_headphone,
    'getBassHeadphone' => $xml_get_bass_headphone,
]);




//######################################################## 
class YamahaController {
    private $url_yamaha;
    private $xml_strings = [];

    public function __construct($url_yamaha, $xml_strings) {
        $this->url_yamaha = $url_yamaha;
        $this->xml_strings = $xml_strings;
    }

    public function getAll_infos($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getAll_infos'], $this->url_yamaha, $as_array, $debug);
    }

    public function getVolume($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getVolume'], $this->url_yamaha, $as_array, $debug);
    }

    public function setVolume($value, $debug = false) {
        return set_param_curl($this->xml_strings['setVolume'], $this->url_yamaha, $value, $debug);
    }

    public function stepVolume($value, $debug = false) {
        return set_param_curl($this->xml_strings['stepVolume'], $this->url_yamaha, $value, $debug);
    }

    public function getSurround($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getSurround'], $this->url_yamaha, $as_array, $debug);
    }

    public function setSurround($value, $debug = false) {
        return set_param_curl($this->xml_strings['setSurround'], $this->url_yamaha, $value, $debug);
    }

    public function getPower($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getPower'], $this->url_yamaha, $as_array, $debug);
    }

    public function setPower($value, $debug = false) {
        return set_param_curl($this->xml_strings['setPower'], $this->url_yamaha, $value, $debug);
    }

    public function setSleep($value, $debug = false) {
        return set_param_curl($this->xml_strings['setSleep'], $this->url_yamaha, $value, $debug);
    }

    public function getSleep($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getSleep'], $this->url_yamaha, $as_array, $debug);
    }

    public function setMute($value, $debug = false) {
        return set_param_curl($this->xml_strings['setMute'], $this->url_yamaha, $value, $debug);
    }

    public function getMute($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getMute'], $this->url_yamaha, $as_array, $debug);
    }

    public function setInput($value, $debug = false) {
        return set_param_curl($this->xml_strings['setInput'], $this->url_yamaha, $value, $debug);
    }

    public function getInput($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getInput'], $this->url_yamaha, $as_array, $debug);
    }

    public function setTreble($value, $debug = false) {
        return set_param_curl($this->xml_strings['setTreble'], $this->url_yamaha, $value, $debug);
    }

    public function getTreble($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getTreble'], $this->url_yamaha, $as_array, $debug);
    }

    public function setHDMIOutput($value, $debug = false) {
        return set_param_curl($this->xml_strings['setHDMIOutput'], $this->url_yamaha, $value, $debug);
    }

    public function getHDMIOutput($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getHDMIOutput'], $this->url_yamaha, $as_array, $debug);
    }

    public function setVideoOutput($value, $debug = false) {
        return set_param_curl($this->xml_strings['setVideoOutput'], $this->url_yamaha, $value, $debug);
    }

    public function getVideoOutput($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getVideoOutput'], $this->url_yamaha, $as_array, $debug);
    }

    public function setUkwChannelInfo($value, $debug = false) {
        return set_param_curl($this->xml_strings['setUkwChannelInfo'], $this->url_yamaha, $value, $debug);
    }

    public function getUkwChannelInfo($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getUkwChannelInfo'], $this->url_yamaha, $as_array, $debug);
    }

    public function getIpodMetaInfo($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getIpodMetaInfo'], $this->url_yamaha, $as_array, $debug);
    }

    public function setIpodShuffle($value, $debug = false) {
        return set_param_curl($this->xml_strings['setIpodShuffle'], $this->url_yamaha, $value, $debug);
    }

    public function getIpodShuffle($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getIpodShuffle'], $this->url_yamaha, $as_array, $debug);
    }

    public function setIpodRepeat($value, $debug = false) {
        return set_param_curl($this->xml_strings['setIpodRepeat'], $this->url_yamaha, $value, $debug);
    }

    public function getIpodRepeat($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getIpodRepeat'], $this->url_yamaha, $as_array, $debug);
    }

    public function getIpodUsbPlayPause($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getIpodUsbPlayPause'], $this->url_yamaha, $as_array, $debug);
    }

    public function setIpodUsbPlayPause($value, $debug = false) {
        return set_param_curl($this->xml_strings['setIpodUsbPlayPause'], $this->url_yamaha, $value, $debug);
    }

    public function getUsbMetaInfo($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getUsbMetaInfo'], $this->url_yamaha, $as_array, $debug);
    }

    public function getUsbPlayStopNextPrev($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getUsbPlayStopNextPrev'], $this->url_yamaha, $as_array, $debug);
    }

    public function setUsbPlayStopNextPrev($value, $debug = false) {
        return set_param_curl($this->xml_strings['setUsbPlayStopNextPrev'], $this->url_yamaha, $value, $debug);
    }

    public function getUsbShuffle($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getUsbShuffle'], $this->url_yamaha, $as_array, $debug);
    }

    public function setUsbShuffle($value, $debug = false) {
        return set_param_curl($this->xml_strings['setUsbShuffle'], $this->url_yamaha, $value, $debug);
    }

    public function getUsbRepeat($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getUsbRepeat'], $this->url_yamaha, $as_array, $debug);
    }

    public function setUsbRepeat($value, $debug = false) {
        return set_param_curl($this->xml_strings['setUsbRepeat'], $this->url_yamaha, $value, $debug);
    }

    public function setBassHeadphone($value, $debug = false) {
        return set_param_curl($this->xml_strings['setBassHeadphone'], $this->url_yamaha, $value, $debug);
    }

    public function getBassHeadphone($as_array = false, $debug = false) {
        return get_param_curl($this->xml_strings['getBassHeadphone'], $this->url_yamaha, $as_array, $debug);
    }
}



?>