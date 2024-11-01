<?php
/*
Plugin Name: WP Browser Platform Detection
Plugin URI:  http://gouravrr.com/
Description: This plugin will append CSS classes in default WordPress body class. You can get browser name, Operating System and actual device name.
Version:     2.0.0
Author:      Gourav RR
Author URI:  https://gouravrr.wordpress.com/

Copyright 2019-20 Gourav RR (email : gourav090990@gmail.com)
WP Browser Platform Detection is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WP Browser Platform Detection is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WP Browser Platform Detection. If not, see http://gouravrr.com/.
*/

add_filter( 'body_class', 'add_browser_body_class' );
function add_browser_body_class( $classes ) {
    $httpAgent = strtolower( $_SERVER['HTTP_USER_AGENT'] );

    global
    $is_iphone, // iPhone Safari
    $is_chrome, // Google Chrome
    $is_safari, // Safari
    $is_NS4, // Netscape 4
    $is_opera, // Opera
    $is_macIE, // Mac Internet Explorer
    $is_winIE, // Windows Internet Explorer
    $is_gecko, // FireFox
    $is_lynx, // Lynx (web browser)
    $is_IE, // Internet Explorer
    $is_edge, // Microsoft Edge
    $is_apache, // Apache HTTP Server
    $is_IIS, // Microsoft Internet Information Services (IIS)
    $is_iis7, // Microsoft Internet Information Services (IIS) v7.x
    $is_nginx; // Nginx web server

    // Browser
    if($is_chrome) $classes[] = 'chrome';  
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_NS4) $classes[] = 'netscape';
    elseif($is_opera) $classes[] = 'opera';
    elseif (strstr($httpAgent, 'opera mini')) $classes[] = 'opera-mini';
    elseif (strstr($httpAgent, 'opera mobi')) $classes[] = 'opera-mobi';
    elseif($is_macIE) $classes[] = 'mac-ie';
    elseif($is_winIE) $classes[] = 'win-ie';
    elseif($is_gecko) $classes[] = 'firefox';
    elseif($is_IE) $classes[] = 'ie';
    elseif($is_edge) $classes[] = 'microsoft-edge';
    elseif($is_lynx) $classes[] = 'lynx-browser';

    // Web server
    if($is_apache) $classes[] = 'apache-server';  
    elseif($is_iis7) $classes[] = 'microsoft-iis7';
    elseif($is_IIS) $classes[] = 'microsoft-iis';
    elseif($is_nginx) $classes[] = 'nginx-server';

    // Device
    if (strstr($httpAgent, 'ipad')) $classes[] = 'ipad';
    elseif (strstr($httpAgent, 'ipod')) $classes[] = 'ipod';
    elseif (strstr($httpAgent, 'iphone')) $classes[] = 'iphone';
    elseif (strstr($httpAgent, 'android')) $classes[] = 'android';
    elseif (strstr($httpAgent, 'silk/')) $classes[] = 'silk-mobile';
    elseif (strstr($httpAgent, 'kindle')) $classes[] = 'kindle';
    elseif (strstr($httpAgent, 'blackberry')) $classes[] = 'blackberry';
    elseif (strstr($httpAgent, 'opera mini')) $classes[] = 'mobile';
    elseif (strstr($httpAgent, 'opera mobi')) $classes[] = 'mobile';
    elseif (strstr($httpAgent, 'mobile')) $classes[] = 'mobile';

    // Operating system
    if (strstr($httpAgent, 'windows nt 10')) $classes[] = 'windows-10';
    elseif (strstr($httpAgent, 'windows nt 6.3')) $classes[] = 'windows-8.1';
    elseif (strstr($httpAgent, 'windows nt 6.2')) $classes[] = 'windows-8';
    elseif (strstr($httpAgent, 'windows nt 6.1')) $classes[] = 'windows-7';
    elseif (strstr($httpAgent, 'windows nt 6.0')) $classes[] = 'windows-vista';
    elseif (strstr($httpAgent, 'windows nt 5.2')) $classes[] = 'windows-xp';
    elseif (strstr($httpAgent, 'windows nt 5.1')) $classes[] = 'windows-xp';
    elseif (strstr($httpAgent, 'windows xp')) $classes[] = 'windows-xp';
    elseif (strstr($httpAgent, 'windows nt 5.0')) $classes[] = 'windows-2000';
    elseif (strstr($httpAgent, 'windows me')) $classes[] = 'windows-me';
    elseif (strstr($httpAgent, 'win98')) $classes[] = 'windows-98';
    elseif (strstr($httpAgent, 'win95')) $classes[] = 'windows-95';
    elseif (strstr($httpAgent, 'win16')) $classes[] = 'windows-3.11';
    elseif (strstr($httpAgent, 'macintosh')) $classes[] = 'mac-os-10';
    elseif (strstr($httpAgent, 'mac os x')) $classes[] = 'mac-os-10';
    elseif (strstr($httpAgent, 'mac_powerpc')) $classes[] = 'mac-os-9';
    elseif (strstr($httpAgent, 'linux')) $classes[] = 'linux';
    elseif (strstr($httpAgent, 'ubuntu')) $classes[] = 'ubuntu';
    elseif (strstr($httpAgent, 'webos')) $classes[] = 'mobile-webos';

    return $classes;
}