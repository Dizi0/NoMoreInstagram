<?php
/***
 *
 *
 * @Author : Adil 'Dizio' Aiachine
 * @Reason : Instagram API isn't intuitive and requires way too much work to implement
 * @Tech_limitations : Actually no way to get videos out of the current routes
 * @TO-DO : Add some errors managment system , in can of file_get_content returning false
 * @Routes : The route "Explore/tags/" is not longer useful, Their is some cache problem, making some results irrelevant
 * Just try Toyota/Ford/Astonmartinlagonda, and you'll see some Fiats/Peugeot appearing consistently
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
    public function igGetFollowers($username){
        $json = file_get_contents('https://www.instagram.com/' . $username . '/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $followers = $this->instagram->graphql->user->edge_followed_by->count;
        return $followers;
    }
    public function igGetFollowed($username){
        $json = file_get_contents('https://www.instagram.com/' . $username . '/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        $instagram = json_decode($json);
        $followed = $this->instagram->graphql->user->edge_follow->count;
        return $followed;
    }

    public function igGetUserName($username){
        $json = file_get_contents('https://www.instagram.com/explore/tags/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        if ($json == FALSE){
            $text_username="No connection";
        }
        else{
            $instagram = json_decode($json);
            $text_username = $this->instagram->graphql->user->username;
        }
        return $text_username;
    }
    public function igGetUserPic($username){
        $json = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        if ($json == FALSE) {
            $profile_pic="No connection";
        }
        else{
            $instagram = json_decode($json);
            $profile_pic =  "<img src='" . $instagram->graphql->user->profile_pic_url_hd."'>";
        }
        return $profile_pic;
    }
    public function igGetUserId($username){
        $json = file_get_contents('https://www.instagram.com/explore/tags/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
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
        if ($json == FALSE){
            $bio = "No connection";
        }
        else{
            $instagram = json_decode($json);
            $bio = $instagram->graphql->user->biography;
        }
        return($bio);
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
     * @TO-DO : Récuperer le short code pour créer un embed si is_video == true
     *  concat
     */
    public function igGetUserMedia($username){
        $json = @file_get_contents('https://www.instagram.com/'.$username.'/?__a=1'); // Cette page est un Json correpondant à celle visible par un utilisateur classique
        if($json == FALSE){
       //GESTION D'ERREUR
            echo "No connection";
        }
        else{
            $instagram = json_decode($json);
            $mediasource = $instagram->edges->graphql->user;
            var_dump($mediasource);
//            foreach ($mediasource as $posts) {
//                echo "<img src='". $posts->display_url ."'>";
//            }
        }
    }
}

