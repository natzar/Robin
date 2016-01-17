<?php

//
// Source: https://gist.github.com/cosmocatalano/4544576
//  Quick-and-dirty Instagram web scrape, just in case you don't think you should have to make your users log in to deliver them public photos.
//  returns a big old hunk of JSON from a non-private IG account page.


class Instagram extends Robot{
    
     function __construct($args){
        parent::__construct($args);
       
        echo '[Scraping ...]'.PHP_EOL;
    }
   
    function latestPhoto(){
        if (!isset($this->args[3])){
            die("[Error] Missing the username you want the last photo from".PHP_EOL);
        }       
        $user = $this->args[3];                
        $results_array = $this->scrape_insta($user);
        if (!isset( $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'])){
         die ('[i] Instagram Account is private or not exists'.PHP_EOL);
        }
        $latest_array = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][0];
         $ext = pathinfo($latest_array['display_src'], PATHINFO_EXTENSION);
         copy($latest_array['display_src'],dirname(__FILE__)."/../../downloads/".$this->args[1]."-".$this->args[3]."_".".".$ext);

        $this->output->set('output',$latest_array);

    }

    function photos(){
        if (!isset($this->args[3])){
            die("[Error] Missing the username you want the last photo from".PHP_EOL);
        }       
        $user = $this->args[3];
        
        
        $results_array = $this->scrape_insta($user);
//        print_r($results_array);
        $results =array();
        for($cnt=0; $cnt < 20; $cnt++) {
         $latest_array = $results_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'][$cnt];
         $results[] = $latest_array;
        $ext = pathinfo($latest_array['display_src'], PATHINFO_EXTENSION);
         copy($latest_array['display_src'],dirname(__FILE__)."/../../downloads/".$this->args[1]."-".$this->args[3]."_".$cnt.".".$ext);
/*      

         echo 'Latest Photo:'.PHP_EOL;
         echo '<a href="http://instagram.com/p/'.$latest_array['code'].'"><img src="'.$latest_array['display_src'].'"></a></br>';
         echo 'Likes: '.$latest_array['likes']['count'].' - Comments: '.$latest_array['comments']['count'].''.PHP_EOL;
*/
        }
        
        $this->output->set('output',$results); 
        
    }

    private function scrape_insta($username) {
    	$insta_source = $this->wget('http://instagram.com/'.$username);    	
    	$shards = explode('window._sharedData = ', $insta_source);
    	if (count($shards) < 2){
    	   die("[Error] Check your internet connection".PHP_EOL);
    	}
    	$insta_json = explode(';</script>', $shards[1]); 
    	$insta_array = json_decode($insta_json[0], TRUE);
    	return $insta_array;
    }
    
     private function wget($url){
            //$url = 'https://api.vineapp.com/channels/featured';
            if ($html = file_get_contents($url)){
                return $html;
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
           // curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($ch);
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result;
            }
    
            curl_close($ch);
     }  
}
