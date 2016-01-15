<?php
/*
*
*       Vine Bot - Version 1.2
*	Author: Beto López Ayesa 
*	CONTACT ME AT betolopezayesa@gmail.com
* 	$$$	Disponible para customizar este Bot para tí / $$$ 	Available to modify this bot for you
*	www.phpninja.info / www.betoayesa.com
*	Thanks to @MOAY for making Vine App Awesome
*       Thanks to https://github.com/VineAPI/VineAPI/blob/master/endpoints.json
*
*	DISCLAIMER: If you are not carefull, and abuse Vine servers you WILL BE BLOCKED. Run it just 1 time a day.
*	The sleep(Seconds) command, helps being less abusive and do the tasks slowly.
*/

class Vine extends Robot {
$username = 'YOUR VINE USERNAME';
$password = 'YOUR VINE PASSWORD';

$key = vineAuth($username,$password);
$userId = strtok($key,'-');

$records = vineGetChannel(1,$key);

foreach($records as $record){	
	vineLike($record->postId,$key);
	vineAutoComment($record->postId,$key);
}
sleep(rand(1,3));

$recordsa = vineGetTrendings($key);

foreach($recordsa as $record){	
	vineLike($record->postId,$key);
	vineAutoComment($record->postId,$key);
}

$records =  vineGetEditorsPick($key);
foreach($records as $record){	
	vineLike($record->postId,$key);
	vineAutoComment($record->postId,$key);
}

sleep(1);

$records = vineGetTag('comedy',$key);
foreach($records as $record){	
	vineLike($record->postId,$key);
	vineAutoComment($record->postId,$key);
}

sleep(2);
$records = vineGetTag('firstpost',$key);
foreach($records as $record){	
	vineLike($record->postId,$key);
//	vineAutoComment($record->postId,$key);
}

	sleep(rand(1,3));


$records = vineGetTag('primerapublicacion',$key);
foreach($records as $record){	
	vineLike($record->postId,$key);

}


	sleep(rand(1,7));
$records = vineGetTag('relatable',$key);
foreach($records as $record){	
	vineLike($record->postId,$key);
vineAutoComment($record->postId,$key);
}






/*



*/


function vineAutoComment($vineId,$key)
{
        // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference

        $url = 'https://api.vineapp.com/posts/'.$vineId.'/comments';

		$cadenas = Array('Awesome!','#Lol','Where did you get those ideas?','Very funny!','For how long have you beene vineing?','#MOAY','Loving it!','Congratz!');
		$text = $cadenas[rand(0,count($cadenas))];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "comment=".urlencode($text)."&entities=");
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));

        
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



function vineLike($vineId,$key)
{
        // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference

        $url = 'https://api.vineapp.com/posts/'.$vineId.'/likes';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "post_id=".$vineId);
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));

        
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

function vineGetFeaturedChannels($key){
/*
"get_featured_channels": {
      "endpoint": "channels/featured",
      "request_type": "get",
      "url_params": [],
      "required_params": [],
      "optional_params": [],
      "model": "ChannelCollection"
    },
*/

  // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference

        $url = 'https://api.vineapp.com/channels/featured';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
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

function vineGetTrendings($key){
/*
"get_featured_channels": {
      "endpoint": "channels/featured",
      "request_type": "get",
      "url_params": [],
      "required_params": [],
      "optional_params": [],
      "model": "ChannelCollection"
    },
*/

  // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference

        $url = 'https://api.vineapp.com/timelines/trending';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
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




function vineGetChannel($channel,$key){

/*
"get_channel_recent_timeline": {
      "endpoint": "timelines/channels/%s/recent",
      "request_type": "get",
      "url_params": ["channel_id"],
      "required_params": [],
      "optional_params": ["size", "page", "anchor"],
      "model": "PostCollection"
    },
*/
        $url = 'https://api.vineapp.com/timelines/channels/'.$channel.'/recent';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
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

function GET($url,$key){


}

function POST(){


}

function vineGetEditorsPick($key)
{
        // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference

        $url = 'https://api.vineapp.com/timelines/promoted';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
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




function vineGetTag($tag,$key)
{
        // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference

        $url = 'https://api.vineapp.com/timelines/tags/'.$tag;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
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



    
function vineAuth($username,$password)
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

function vineTimeline($userId,$key)
{
        // Additional endpoints available from https://github.com/starlock/vino/wiki/API-Reference
        $url = 'https://api.vineapp.com/timelines/users/'.$userId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
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