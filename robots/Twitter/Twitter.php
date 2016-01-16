<?php
/* 
* Bot Tool For Twitter
* Version: 1.0
* Credits: Beto Ayesa (betolopezayesa@gmail.com)
* 
* Create a new app by going to https://dev.twitter.com/apps/new and create a new app with read & write permissions.
* Once the app is created and you generated your access token, you will have the keys needed for below. 
*/
require_once dirname(__FILE__).'/lib/twitteroauth.php';
define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY');
define('CONSUMER_SECRET', 'CONSUMER_SECRET');
define('ACCESS_TOKEN', 'ACCESS_TOKEN');
define('ACCESS_TOKEN_SECRET', 'ACCESS_TOKEN_SECRET');
  
class Twitter extends Robot{
    var $toa;
    var $friendsIds;
    var $favoritesIds;
    
    function __construct($args){      
        parent::__construct($args);
        $this->toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
        if (!is_object($this->toa)){
        	die('TwitterOAuth failed to initialize. Check your Twitter credentials at /robots/Twitter/Twitter.php'.PHP_EOL);
        }
        $this->toa->get('account/verify_credentials');
        if ($this->toa->http_code != 200){
        	die('Unable to authenticate with Twitter'.PHP_EOL);
        }
        // get all friends
        $friends = $this->toa->get('friends/ids', array('cursor' => -1));
        $this->friendIds = array();
        foreach ($friends->ids as $id) {
        	$this->friendIds[] = $id;
        }
        // get all favorites to prevent re-favorite
        $favorites = $this->toa->get('favorites', array());
        $this->favoritesIds = array();
        foreach ($favorites as $fav) {
        	$this->favoritesIds[] = $fav->id;
        }
    }
    
    function bot(){
    
        $this->sendDirectMessages(); 
        $this->favoriteSearch(); 
    }

    
    
    private function favoriteTweet($id) {    	
    	echo "Tweet id:".$id;
    	// Prevent duplicate requests
    	//if (in_array($id, $newFollows))
    	// return false;
    	if (!in_array($id,$this->favoritesIds))
    		$resp = $this->toa->post('https://api.twitter.com/1.1/favorites/create.json',array("id" => $id));
    	
    	return true;
    }
    
    private function getRateLimit() {
        // Gets the remaining number of hits
    	$ret = $this->toa->get('account/rate_limit_status');
    	return $ret->remaining_hits;
    }
    
    
    
    function favoriteSearch() {
        // Favorite any tweet that matches your keyword
        // Anyone OR any tweet that matches your search, will automatically be followed by you
        // For information on Twitter search operands, see 'Search Operators' in https://dev.twitter.com/docs/using-search
        // Note: Search queries can be no more then 1000 characters and only the first 100 results/users will be followed
        $keyword= $this->args[3];
        if (!isset($keyword)){
            die("[Error] Missing search query".PHP_EOL);
        }
                
    	$ret = $this->toa->get('http://search.twitter.com/search.json', array('q' => $keyword, 'rpp' => 100));
    
    	if (is_array($ret->results)) {
    		foreach ($ret->results as $result) {
    			$from_user = $result->from_user_id;
    				favoriteTweet( $result->id);
    			// If user isnt alreay being followed -> follow user (DEPRECATED)
    			/*
                if (!in_array($from_user,$friendIds)) {
    				if (getRateLimit() == 0)
    					exit();
    				
    				// Follow user
    				followUser($from_user);
    			}
                */
    		}
    	}
    	
    }
    
/*
    function unfollow_not_followers(){ // deprecated
    	
     $followers = $this->toa->get('followers/ids', array('cursor' => -1));
        $followerIds = array();
     
        foreach ($followers->ids as $id) {
            $this->followerIds[] = $id;
        }   
          
          $victims = array();
        for ($i=0;$i<count($friendIds);$i++){
        
            if (!in_array($friendIds[$i],$followerIds))
             $resp = $this->toa->post('friendships/destroy', array('user_id' => $friendIds[$i]));   
        }                
        echo 'Done unfollow not followers'.PHP_EOL;    
      }
    
*/
/*
    // Follow all users that you're not following back
    function sendDirectMessages(){
        global $this->toa, $friendIds;
    
        // Get the last 5000 followers
        $followers = $this->toa->get('followers/ids', array('cursor' => -1));
        $followerIds = array();
     
        foreach ($followers->ids as $id) {
            $followerIds[] = $id;
        }    
    	
    	foreach ($followerIds as $id) { 
    		// If user isnt alreay being followed -> follow user
    		if (!in_array($id,$friendIds)) {
    			if (getRateLimit() == 0)
    				exit(); 				
    				// Send DM to user
    				if (DIRECT_MESSAGE)
    					$this->toa->post('direct_messages/new', array('user_id' => $id, 'text' => DIRECT_MESSAGE));			           
    		}
    	}         
    	echo 'Done sendDirectMessages to new followers'.PHP_EOL;
    }
*/
    
// Follows anyone who matches your search query

}