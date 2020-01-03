<?php
/***
 *
 *
 * @Author : Adil 'Dizio' Aiachine
 * @Reason : Instagram API isn't intuitive and requires way too much work to implement
 * @Tech_limitations : Actually no way to get videos out of the current routes
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
        //Choper les images
        return($this->instagram->graphql->hashtag);
    }

    public function igGetUserUrl($username){
        $json = file_get_contents('https://www.instagram.com/' . $username . '/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $userURL = $this->instagram->graphql->user->external_url;
        return $userURL;
    }

    public function igGetUserName($username){
        $json = file_get_contents('https://www.instagram.com/explore/tags/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $text_username = $this->instagram->graphql->user->username;
        return $text_username;
    }
    public function igGetUserPic($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $profile_pic =  "<img src='" . $instagram->graphql->user->profile_pic_url_hd."'>";
        return $profile_pic;
    }
    public function igGetUserId($username){
        $json = file_get_contents('https://www.instagram.com/explore/tags/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        return($instagram->graphql->user->id);
    }
    public function igGetUserBusCat($username){
        $json = file_get_contents('https://www.instagram.com/explore/tags/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
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

    public function igGetUserPicSrc($username){
        $json = file_get_contents('https://www.instagram.com/explore/tags/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $profile_pic_url = $instagram->graphql->hashtag->profile_pic_url;
        return $profile_pic_url;
    }

    /**
     * TO DO : Récuperer le short code pour créer un embed si is_video == true
     *  concat
     */
    public function igGetUserMedia($username){
        $json = @file_get_contents('https://www.instagram.com/explore/tags/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        if($json == FALSE){
            $instagram = json_decode($json);
            $mediasource = $instagram->graphql->hashtag->edge_hashtag_to_media->edges;
//        var_dump($mediasource);
            foreach ($mediasource as $posts) {
                echo "<img src='". $posts->node->display_url ."'>";
            }
        }
        else{
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
}

