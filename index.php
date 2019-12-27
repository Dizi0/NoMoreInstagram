<?php

use noMoreInstagram\noMoreInsta;
ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');
require_once('./class/noMoreInsta_class.php');
$username = "astonmartinlagonda";

$instagram = new noMoreInsta($username);
//var_dump($instagram->igDebug($username));

echo $instagram->igGetUserName($username);
echo $instagram->igGetUserPic($username);
//echo $instagram->igGetBio($username);
//
echo $instagram->igGetUserMedia($username);
////var_dump($instagram->igDebug());
////var_dump($instagram->igGetUserData($username));
//?>
<style>
    img {
        width: 110px;
    }
</style>
