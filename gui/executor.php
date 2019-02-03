<?php
  if (isset($_POST["key"]) && !empty($_POST["key"])) {
    switch ($_POST["key"]) {
        case "KEY_POWER":
            shell_exec('irsend SEND_ONCE tv KEY_POWER');
            break;
        case "KEY_MEDIA":
            shell_exec('irsend SEND_ONCE tv KEY_MEDIA');
            break;
        case "KEY_VOLUMEUP":
            shell_exec('irsend SEND_ONCE tv KEY_VOLUMEUP');
            break;
        case "KEY_CHANNELUP":
            shell_exec('irsend SEND_ONCE tv KEY_CHANNELUP');
            break;
        case "KEY_MUTE":
            shell_exec('irsend SEND_ONCE tv KEY_MUTE');
            break;
        case "KEY_VOLUMEDOWN":
            shell_exec('irsend SEND_ONCE tv KEY_VOLUMEDOWN');
            break;
        case "KEY_CHANNELDOWN":
            shell_exec('irsend SEND_ONCE tv KEY_CHANNELDOWN');
            break;
        case "KEY_TEXT":
            shell_exec('irsend SEND_ONCE tv KEY_TEXT');
            break;
    }
  }
?>