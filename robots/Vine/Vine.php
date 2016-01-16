<?
// Vine API Wrapper(not oficial)
// @betoayesa
//
//
// Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference
  
class Vine extends Robot{
    var $username;
    var $password;
    var $vineKey;
    var $userId;
    
    function __construct($args){
        parent::__construct($args);
        $this->username = 'YOUR VINE USERNAME';
        $this->password = 'YOUR VINE PASSWORD';
        if ($this->username == "YOUR VINE USERNAME" or $this->password == "YOUR VINE PASSWORD"){
            die("[Error] You need to set your Vine's account user/password at /robots/Vine/Vine.php".PHP_EOL);
        }
        
    }
    function likeAllVinesFromTag(){
    
        $this->vineKey = $this->vineAuth($username,$password);
        $this->userId = strtok($this->vineKey,'-');
        $keyword = $this->args[3];
        if (!isset($keyword)){
            die("[Error] Missing Tag keyword".PHP_EOL);
        }
        $records = $this->vineGetTag($keyword,$this->vineKey);
        foreach($records as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        	$this->vineAutoComment($record->postId,$this->vineKey);
        }
        
    }
    function growFollowers(){
        $this->vineKey = $this->vineAuth($username,$password);
        $this->userId = strtok($this->vineKey,'-');
                        
        $records = $this->vineGetChannel(1,$this->vineKey);        
        foreach($records as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        	$this->vineAutoComment($record->postId,$this->vineKey);
        }
        sleep(rand(1,3));
        
        $recordsa = $this->vineGetTrendings($this->vineKey);        
        foreach($recordsa as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        	$this->vineAutoComment($record->postId,$this->vineKey);
        }
                
        $records = $this->vineGetEditorsPick($this->vineKey);
        foreach($records as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        	$this->vineAutoComment($record->postId,$this->vineKey);
        }        
        sleep(1);
        
        $records = $this->vineGetTag('comedy',$this->vineKey);
        foreach($records as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        	$this->vineAutoComment($record->postId,$this->vineKey);
        }        
        sleep(2);
        
        $records = $this->vineGetTag('firstpost',$this->vineKey);
        foreach($records as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        	$this->vineAutoComment($record->postId,$this->vineKey);
        }
        sleep(rand(1,3));        
                
        $records = $this->vineGetTag('primerapublicacion',$this->vineKey);
        foreach($records as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        
        }
        sleep(rand(1,7));
        
        $records = $this->vineGetTag('relatable',$this->vineKey);
        foreach($records as $record){	
        	$this->vineLike($record->postId,$this->vineKey);
        $this->vineAutoComment($record->postId,$this->vineKey);
        }
    }


    /********* Private functions *********/
    private function vineAutoComment($vineId,$key)
    {
            // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference
    
            $url = 'https://api.vineapp.com/posts/'.$vineId.'/comments';
    		$cadenas = Array('Awesome!','#Lol','Where did you get those ideas?','Very funny!','For how long have you beene vineing?','Loving it!','Congratz!');
    		$text = $cadenas[rand(0,count($cadenas))];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "comment=".urlencode($text)."&entities=");
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);        
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            $result = json_decode(curl_exec($ch));    
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }
    
    
    
    private function vineLike($vineId,$key)
    {
            // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference    
            $url = 'https://api.vineapp.com/posts/'.$vineId.'/likes';    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "post_id=".$vineId);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);        
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));            
            $result = json_decode(curl_exec($ch));    
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }
    
    private function vineGetFeaturedChannels($key){
            $url = 'https://api.vineapp.com/channels/featured';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = json_decode(curl_exec($ch));
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }
    
    private function vineGetTrendings($key){
      // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference    
            $url = 'https://api.vineapp.com/timelines/trending';    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = json_decode(curl_exec($ch));
    
            if (!$result)
            {
                  echo 'ERROR';  echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }
    private function vineGetChannel($channel,$key){
            $url = 'https://api.vineapp.com/timelines/channels/'.$channel.'/recent';    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = json_decode(curl_exec($ch));
    
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }
    
    
    private function vineGetEditorsPick($key)
    {
            // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference
    
            $url = 'https://api.vineapp.com/timelines/promoted';
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = json_decode(curl_exec($ch));
    
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }
    
    
    
    
    private function vineGetTag($tag,$key)
    {
            // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference
    
            $url = 'https://api.vineapp.com/timelines/tags/'.$tag;
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = json_decode(curl_exec($ch));
    
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }
    
    
    
        
    private function vineAuth($username,$password)
    {
            $loginUrl =        "https://api.vineapp.com/users/authenticate";
            $username = urlencode($username);
            $password = urlencode($password);
            $token = sha1($username); // I believe this field is currently optional, but always sent via the app
            
            $postFields = "deviceToken=$token&password=$password&username=$username"; 
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $loginUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = json_decode(curl_exec($ch));
    
            if (!$result)
            {
                    curl_error($ch);
            }
            else
            {
                    // Key aLso contains numeric userId as the portion of the string preceding the first dash
                    return $result->data->key; 
            }
    
            curl_close($ch);
    }
    
    private function vineTimeline($userId,$key)
    {
            // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference
            $url = 'https://api.vineapp.com/timelines/users/'.$userId;
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = json_decode(curl_exec($ch));
    
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result->data->records;
            }
    
            curl_close($ch);
    }


}