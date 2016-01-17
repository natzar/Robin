<?
include dirname(__FILE__)."/lib/ebayClass.php";

class Ebay extends Robot{

    function productImages(){
        $keyword = $this->args[3];
        if (!isset($keyword)){
            echo '[!] Error Keyword for search missing';
            die();
        }	
        $i = 0;
	    $LIMIT_I = 5000;
    	$crawler = new EbayCrawler(); 
    	$crawler->obeyRobotsTxt(true);
    	$crawler->addContentTypeReceiveRule("#text/html#");
    	$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png|js|rss|xml|atom|feed)$# i");
    	$crawler->setPageLimit(4); // Set page-limit to 50 for testing 	        		
		$crawler->setURL("http://www.ebay.es/sch/i.html?_sacat=0&_nkw=".$keyword); 
		$UAGENT = new UAgent();
		$crawler->setUserAgentString ($UAGENT->random_uagent()); 		
		$crawler->go(); 
		$report = $crawler->getProcessReport(); 
		echo "Links followed: ".$report->links_followed." ".PHP_EOL; 
		echo "Documents received: ".$report->files_received." ".PHP_EOL; 
		echo "Process runtime: ".$report->process_runtime." sec".PHP_EOL; 
		
		flush();
		unset($report);
		//sleep(rand(1,3));
		$i++;
		
        
    }

}