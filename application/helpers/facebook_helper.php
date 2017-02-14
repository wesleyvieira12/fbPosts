<?php
if(!function_exists("GET_USER")){
    function GET_USER($access_token){
        try {
            $params = array("fields=id,name", "access_token" => $access_token);
            return FBCUSTOM()->api( '/v2.3/me' , 'GET', $params );
        }
        catch ( Exception $e ) {
            return false;
        }
    }
}

if(!function_exists("GET_INFO_APP")){
    function GET_INFO_APP($access_token){
        $params = array("access_token" => $access_token);
        return FBCUSTOM()->api( '/v2.0/app' , 'GET', $params );
    }
}

if(!function_exists("GET_GROUPS_PAGES")){
    function GET_GROUPS_PAGES($fid, $access_token, $type){
        try {
            return FBCUSTOM()->api( '/v2.0/'.$fid."/".$type , 'GET', array("fields=id,name,privacy", "limit" => 10000, "access_token" => $access_token));
        }
        catch ( Exception $e ) {
            //echo $e->getMessage();
            return false;
        }
    }
}

if(!function_exists("FB_POST")){
    function FB_POST($data){
        $response = array();
        try {
            switch ($data->type) {
                case 'text':
                    $params = array("message" => $data->message, "access_token" =>  $data->access_token);
                    $response = FBCUSTOM()->api('/v2.0/'.$data->fid.'/feed', "POST", $params);
                    break;
                case 'link':
                    $params = array(
                        "message"     => $data->message,
                        "name"        => $data->title,
                        "description" => $data->description,
                        "link"        => $data->url,
                        "access_token" =>  $data->access_token
                    );

                    if($data->caption != ""){
                        $params["caption"] = $data->caption;
                    }

                    $image = $data->image;
                    if (checkRemoteFile($image)) {
                        $params["picture"] = $data->image;
                    }
                    
                    $response = FBCUSTOM()->api('/v2.0/'.$data->fid.'/feed', "POST", $params);
                    break;
                case 'image':
                    $image = $data->image;
                    if (checkRemoteFile($image)) {
                        $params = array(
                            "message"     => $data->description,
                            "access_token" =>  $data->access_token
                        );
                        $params["url"] = $image;
                        $response = FBCUSTOM()->api('/v2.0/'.$data->fid.'/photos', "POST", $params);
                    }
                    
                    break;
                case 'video':
                    $url = $data->url;
                    $id = getIdYoutube($data->url);
                    if(strlen($id) == 11){
                        parse_str(file_get_contents('http://www.youtube.com/get_video_info?video_id='.$id),$info);
                        if($info['status'] == "ok"){
                            $streams = explode(',',$info['url_encoded_fmt_stream_map']);
                            $type = "video/mp4"; 
                            foreach($streams as $stream){ 
                                parse_str($stream,$real_stream);
                                $stype = $real_stream['type'];
                                if(strpos($real_stream['type'],';') !== false){
                                    $tmp = explode(';',$real_stream['type']);
                                    $stype = $tmp[0]; 
                                    unset($tmp); 
                                } 
                                if($stype == $type && ($real_stream['quality'] == 'large' || $real_stream['quality'] == 'medium' || $real_stream['quality'] == 'small')){ //check whether the format is the desired format 
                                    $params = array(
                                        "title"        => $data->title,
                                        "description"  => $data->description,
                                        "file_url"     => $real_stream['url'].'&signature='.@$real_stream['sig'],
                                        "access_token" => $data->access_token
                                    );
                                    
                                    $response = FBCUSTOM()->api('/v2.0/'.$data->fid.'/videos', "POST", $params);
                                }
                            }
                        }else{
                            $response = array(
                                "status"  => "fail",
                                "message" => strip_tags($info['reason'])
                            );
                        }
                    }else{
                        if (strpos($url, 'facebook.com') != false) {
                            $url = fbdownloadVideo($url);
                        }

                        pr($url);

                        $params = array(
                            "title"        => $data->title,
                            "description"  => $data->description,
                            "file_url"     => $url,
                            "access_token" =>  $data->access_token
                        );
                        $response = FBCUSTOM()->api('/v2.0/'.$data->fid.'/videos', "POST", $params);
                    }
                    break;
            }

            if(isset($response["id"])){
                $response = array(
                    "status"  => "success",
                    "id"      => $response["id"]
                );
            }else{
                if(!isset($response["fail"]) && isset($response["error"])){
                    $response = array(
                        "status"  => "error",
                        "message" => $response["error"]["message"]
                    );
                }else{
                    $response = array(
                        "status"  => "error",
                        "message" => "Unknow error"
                    );
                }
            }
            return $response;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            return false;
            //echo 'Graph returned an error: ' . $e->getMessage();
            //exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            return false;
            //echo 'Facebook SDK returned an error: ' . $e->getMessage();
            //exit;
        }

        if(!empty($response)){
            return $response;
        }else{
            return false;
        }
    }
}

if(!function_exists("FB_GET_POSTS")){
    function FB_GET_POSTS($data){
        $response = array();
        try {
            $response = FBCUSTOM()->api( '/v2.0/'.$data->result."?fields=comments{message},likes,sharedposts" , 'GET', array("access_token" => $data->access_token));
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            return false;
            //echo 'Graph returned an error: ' . $e->getMessage();
            //exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            return false;
            //echo 'Facebook SDK returned an error: ' . $e->getMessage();
            //exit;
        }

        if(!empty($response)){
            return $response;
        }else{
            return false;
        }
    }
}

if(!function_exists("FBCUSTOM")){
    function FBCUSTOM(){
        require_once( APPPATH."libraries/src/facebook.php" );
        $fb  = new FacebookCustom( array("appId" => 1767593543471526, "secret" => "4abe49fc8d28ed719268d9108dbc8fe3") );
        return $fb;
    }
}
?>