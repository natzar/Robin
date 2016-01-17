<?php

//
// Source: https://gist.github.com/cosmocatalano/4544576
//  Quick-and-dirty Instagram web scrape, just in case you don't think you should have to make your users log in to deliver them public photos.
//  returns a big old hunk of JSON from a non-private IG account page.


class Instagram extends Robot{
    
     function Instagram(){
        echo '[i] If nothing is returned, check if account is private or not exists'.PHP_EOL;
    }
    private function scrape_insta($username) {
    	$insta_source = file_get_contents('http://instagram.com/'.$username);
    	$shards = explode('window._sharedData = ', $insta_source);
    	$insta_json = explode(';</script>', $shards[1]); 
    	$insta_array = json_decode($insta_json[0], TRUE);
    	return $insta_array;
    }
    function latestPhoto(){
        if (!isset($this->args[3])){
            die("[Error] Missing the username you want the last photo from".PHP_EOL);
        }       
        $user = $this->args[3];                
        $results_array = $this->scrape_insta($user);
    
        $latest_array = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][0];
        echo 'Latest Photo:'.PHP_EOL;
        echo '<a href="http://instagram.com/p/'.$latest_array['code'].'"><img src="'.$latest_array['display_src'].'"></a></br>';
        echo 'Likes: '.$latest_array['likes']['count'].' - Comments: '.$latest_array['comments']['count'].''.PHP_EOL;
        /* BAH! An Instagram site redesign in June 2015 broke quick retrieval of captions, locations and some other stuff.
        echo 'Taken at '.$latest_array['location']['name'].''.PHP_EOL;
        //Heck, lets compare it to a useful API, just for kicks.
        echo '<img src="http://maps.googleapis.com/maps/api/staticmap?markers=color:red%7Clabel:X%7C'.$latest_array['location']['latitude'].','.$latest_array['location']['longitude'].'&zoom=13&size=300x150&sensor=false">';
        ?>
        */
    }

    function photos(){
        if (!isset($this->args[3])){
            die("[Error] Missing the username you want the last photo from".PHP_EOL);
        }       
        $user = $this->args[3];
        
        
        $results_array = $this->scrape_insta($user);
        print_r($results_array);
    for($cnt=0; $cnt < 20; $cnt++)
{
 $latest_array = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][$cnt];

 echo 'Latest Photo:'.PHP_EOL;
 echo '<a href="http://instagram.com/p/'.$latest_array['code'].'"><img src="'.$latest_array['display_src'].'"></a></br>';
 echo 'Likes: '.$latest_array['likes']['count'].' - Comments: '.$latest_array['comments']['count'].''.PHP_EOL;
}
    }

    
}
