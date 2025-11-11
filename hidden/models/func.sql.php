<?php

function sql_connect() {
    $path = dirname(realpath(__FILE__)) . '/';

    if(preg_match("/Desktop/", $path)) {

        //    Parameter für sql-con auf MacBookPro
        $cfg['host']     = 'localhost';               // MySQL hostname or IP address
        $cfg['user']     = 'root';         // MySQL port - leave blank for default port
        $cfg['password'] = '';       // How to connect to MySQL server ('tcp' or 'socket')
        $cfg['database'] = 'hlb_100jahre';          // Path to the socket - leave blank for default socket
        $link = mysqli_connect($cfg['host'] , $cfg['user'] , $cfg['password'] , $cfg['database'] );

    }  else if (preg_match("/vhosts/", $path)) {

        //    Parameter für sql-con auf Server www.vh8.de
        $cfg['host']     = '';               // MySQL hostname or IP address
        $cfg['user']     = 'hlb_root';         // MySQL port - leave blank for default port
        $cfg['password'] = 'xdHiFz#D4!@';       // How to connect to MySQL server ('tcp' or 'socket')
        $cfg['database'] = 'sk11-121135-1_hlb_100jahre';         // Path to the socket - leave blank for default socket
        $link = mysqli_connect($cfg['host'] , $cfg['user'] , $cfg['password'] , $cfg['database'] );
    }


    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    //printf("Initial character set: %s\n", mysqli_character_set_name($link));

    /* change character set to utf8 */
    if (!mysqli_set_charset($link, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($link));
        exit();
    } else {
        //printf("Current character set: %s\n", mysqli_character_set_name($link));
    }

    return $link;
}