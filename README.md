# IRene

IRene is a smart home enhancement to replay TV remote signals on a Raspberry Pi. It it based on a [german guide](https://indibit.de/raspberry-pi-mit-lirc-infrarot-befehle-senden-irsend/) and is enhanced with my own soft- and hardware experience.
This guide uses concrete version numbers, since with different (new) ones it didn't work for me, so I had to downgrade...

## Requirements

- Raspberry Pi (I use [Raspberry Pi 1 Model B+](https://www.raspberrypi.org/products/raspberry-pi-1-model-b-plus/))
- IR Sender & Receiver (I use Ils - Mini 38KHz IR)
- Female2Female Jumper Wire
- [Raspbian Jesse (2017-07-05)](https://downloads.raspberrypi.org/raspbian/images/raspbian-2017-07-05/)
- lirc-0.9.0-pre1
- PHP 7.0.27
- Apache 2.4.10

## Hardware

![IR Pin Assignment](/img/ir_pi_pins.png?raw=true)

Add IR Receiver to PIN 23 (receive) & and IR Sender to PIN 24 (send). For Pi >=3 do it accordingly.

## Raspbian OS
It is mandatory to use Raspbian Jesse since in Raspbian Stretch and newer versions of LIRC a few things changed and are not working for me.

## Install & Configure LIRC
1) Install LIRC
   ```
   sudo apt-get install lirc
   ```
2) Edit modules file and set pins for in and out
   ```
   sudo nano /etc/modules

   Add following lines:
   lirc_dev
   lirc_rpi gpio_in_pin=23 gpio_out_pin=24
   ```
3) Enable lirc-rpi module 
   ```
   sudo nano /boot/config.txt
   
   Add or uncomment:
   # Uncomment this to enable the lirc-rpi module
   dtoverlay=lirc-rpi,gpio_in_pin=23,gpio_out_pin=24
   ```
4) Set device & driver
   ```
   sudo nano /etc/lirc/hardware.conf
   
   Set following lines:
   DRIVER="default"
   DEVICE="/dev/lirc0"
   MODULES="lirc_rpi"	
   ```
5) Reboot system
   ```
   sudo reboot
   ```
## Test
   ```
   sudo mode2 --driver default --device /dev/lirc0   
   ```

Aim your remote at the IR Receiver and press some buttons. Incoming signals should be displayed in the console.

## Record signals
1) Stop LIRC service
   ```
   sudo /etc/init.d/lirc stop
   ```
2) Look up key mappings
   ```
   irrecord --list-namespace
   
   I use:
   - KEY_POWER
   - KEY_TEXT
   - KEY_VOLUMEDOWN
   - KEY_VOLUMEUP
   - KEY_MUTE
   - KEY_CHANNELDOWN
   - KEY_CHANNELUP
   - KEY_MEDIA
   ...
   ```
3) Record signals from device you want to replay
   ```
   irrecord -d /dev/lirc0  
   
   Enter name of remote (only ascii, no spaces) :tv
   Using tv.lircd.conf as output filename
   ```
4) Stash old lircd.conf
   ```
   sudo mv /etc/lirc/lircd.conf /etc/lirc/lircd_original.conf
   ```
5) Copy your recorded signals to the lirc folder to replace the default
   ```
   sudo cp ~/tv.lircd.conf /etc/lirc/lircd.conf
   ```
6) Start the service
   ```
   sudo /etc/init.d/lirc start
   ```
7) Test it
   ```
   SEND_ONCE tv KEY_POWER
   ```

## Setup Webserver for WebGUI
1) Install [apache](https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md)
2) Install PHP 7
3) Copy content of [gui](/gui/) folder in "/var/www/html" on raspberry pi
4) Add Fontawesome-Pro OR replace with [free version](https://fontawesome.com/download) and change linking in [index.php](/gui/index.php)
5) Finish! The GUI should be accessible on Port 80
    
## Demonstration
- The WebGUI with Channel Up&Down, Volume Up&Down, Mute, Power, Videotext and Source: [Mobile Remote TV](/img/mobile_remote_control.png?raw=true)
- IRene in live action: https://vimeo.com/306541515
