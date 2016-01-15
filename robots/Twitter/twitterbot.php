<?php
/* 
 * Bot Tool For Twitter
 * Version: 1.0
 * Credits: Beto Ayesa (betolopezayesa@gmail.com)
 * 
 */

/*********** CONFIGURATION ***********/
/* 
 * Create a new app by going to https://dev.twitter.com/apps/new and create a new app with read & write permissions.
 * Once the app is created and you generated your access token, you will have the keys needed for below. 
 */
define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY');
define('CONSUMER_SECRET', 'CONSUMER_SECRET');
define('ACCESS_TOKEN', 'ACCESS_TOKEN');
define('ACCESS_TOKEN_SECRET', 'ACCESS_TOKEN_SECRET');

// Anyone OR any tweet that matches your search, will automatically be followed by you
// For information on Twitter search operands, see 'Search Operators' in https://dev.twitter.com/docs/using-search
// Note: Search queries can be no more then 1000 characters and only the first 100 results/users will be followed
define('SEARCH_QUERY', 'developers OR jobs OR frameworks');

// DM (Direct Message) to send to new users that follow you (leave blank to not send anything)
// Note: Message can be no longer then 140 characters (HTTP URLs automatically count as 20 characters and HTTPS as 21 characters)
define("DIRECT_MESSAGE", ""); //Thank you for the follow. ☺ Be happy! ♥

/* DO NOT CHANGE ANYTHING BEYOND THIS LINE UNLESS YOU KNOW WHAT YOUR DOING */

if (!file_exists('twitteroauth/twitteroauth.php'))
	die('twitteroauth.php not found. The library can be downloaded from https://github.com/abraham/twitteroauth');
	
if (!file_exists('twitteroauth/OAuth.php'))
	die('OAuth.php not found. The library can be downloaded from https://github.com/abraham/twitteroauth');

require_once 'twitteroauth/twitteroauth.php';

// Prevent script from ending pre-maturely
set_time_limit(0);

// Contains new followers user ids
$newFollows = array();

// Authorize with Twitter
$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

if (!is_object($toa))
	die('TwitterOAuth failed to initialize');

// Verify that were authorized
$toa->get('account/verify_credentials');
if ($toa->http_code != 200)
	die('Unable to authenticate with Twitter');

// Get the last 5000 people we've followed
$friends = $toa->get('friends/ids', array('cursor' => -1));
$friendIds = array();
foreach ($friends->ids as $id) {
	$friendIds[] = $id;
}

$favorites = $toa->get('favorites', array());
$favoritesIds = array();
foreach ($favorites as $fav) {
	$favoritesIds[] = $fav->id;
}
function favoriteTweet($id) {
	global $toa, $newFollows,$favoritesIds;
	echo "Tweet id:".$id;
	// Prevent duplicate requests
	//if (in_array($id, $newFollows))
	// return false;
	if (!in_array($id,$favoritesIds))
		$resp = $toa->post('https://api.twitter.com/1.1/favorites/create.json',array("id" => $id));
	
	return true;
}
// Gets the remaining number of hits
function getRateLimit() {
	global $toa;
	$ret = $toa->get('account/rate_limit_status');
	return $ret->remaining_hits;
}


// Follows anyone who matches your search query
function favoriteSearch() {
	global $toa, $friendIds;

	$ret = $toa->get('http://search.twitter.com/search.json', array('q' => SEARCH_QUERY, 'rpp' => 100));

	if (is_array($ret->results)) {
		foreach ($ret->results as $result) {
			$from_user = $result->from_user_id;
				favoriteTweet( $result->id);
			// If user isnt alreay being followed -> follow user
			if (!in_array($from_user,$friendIds)) {
				if (getRateLimit() == 0)
					exit();
				
				// Follow user
				followUser($from_user);
			}
		}
	}
	
}

function unfollow_not_followers(){
	global $toa, $friendIds;
 $followers = $toa->get('followers/ids', array('cursor' => -1));
    $followerIds = array();
 
    foreach ($followers->ids as $id) {
        $followerIds[] = $id;
    }   
      
      $victims = array();
    for ($i=0;$i<count($friendIds);$i++){
    
        if (!in_array($friendIds[$i],$followerIds))
         $resp = $toa->post('friendships/destroy', array('user_id' => $friendIds[$i]));   
    }                
    echo 'Done unfollow not followers'.PHP_EOL;    
  }

// Follow all users that you're not following back
function sendDirectMessages(){
    global $toa, $friendIds;

    // Get the last 5000 followers
    $followers = $toa->get('followers/ids', array('cursor' => -1));
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
					$toa->post('direct_messages/new', array('user_id' => $id, 'text' => DIRECT_MESSAGE));			           
		}
	}         
	echo 'Done sendDirectMessages to new followers'.PHP_EOL;
}

sendDirectMessages(); 
//unfollow_not_followers();
favoriteSearch(); // Follows anyone who matches your search query

