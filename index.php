<?php

use noMoreInstagram\noMoreInsta;

require_once('./class/noMoreInsta_class.php');
$username = "astonmartinlagonda";
$instagram = new noMoreInsta($username);

echo $instagram->igGetUserNameText($username);
echo $instagram->igGetBio($username);

echo $instagram->igGetUserMedia($username);
//var_dump($instagram->igDebug());
//var_dump($instagram->igGetUserData($username));
?>
<style>
    img {
        width: 110px;
    }
</style>
