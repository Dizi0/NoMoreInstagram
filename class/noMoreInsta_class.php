<?php
/***
 *
 *
 * @Author : Adil 'Dizio' Aiachine
 * @Reason : Instagram API isn't intuitive and requires way too much work to implement
 *
 *
 ***/
namespace noMoreInstagram;

class noMoreInsta{

    public function __construct($username)
    {
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        global $instagram;
        $this->instagram = $instagram = json_decode($json);
    }

    public function igDebug(){
        return($this->instagram);
    }
    public function igGetUserData($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        return($instagram->graphql->user);
    }
    public function igGetUserId($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        return($instagram->graphql->user->id);
    }
    public function igGetUserBusCat($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        return($instagram->graphql->user->business_category_name);
    }
    public function igGetBio($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        return($instagram->graphql->user->biography);
    }
    public function igGetUserNameText($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $text_username = $instagram->graphql->user->full_name;
        return $text_username;
    }
    public function igGetUserPic($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $profile_pic =  "<img src='" . $instagram->graphql->user->profile_pic_url_hd."'>";
        return $profile_pic;
    }
    public function igGetUserPicSrc($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $profile_pic_url = $instagram->graphql->user->profile_pic_url_hd;
        return $profile_pic_url;
    }

    /**
     * TO DO : Récuperer le short code pour créer un embed si is_video == true
     */
    public function igGetUserMedia($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $mediasource = $instagram->graphql->user->edge_owner_to_timeline_media->edges;
        foreach ($mediasource as $item) {
            $img = $item->node->display_url;
            echo "<img src='". $img ."'>";
        }
    }

    public function ig_get_medias($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);

        $userID = $instagram->logging_page_id;
        $text_username = $instagram->graphql->user->full_name;
        $profile_pic_url = $instagram->graphql->user->profile_pic_url_hd;
        $profile_pic =  "<img src='" . $instagram->graphql->user->profile_pic_url_hd."'>";
        $mediasource = $instagram->graphql->user->edge_owner_to_timeline_media->edges;

        foreach ($mediasource as $item) {
            $img = $item->node->display_url;
            echo "<img src='". $img ."'>";
        }
    }
}
