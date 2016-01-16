<?

	set_time_limit(0);
	ini_set('display_errors', '1');

	#Include libraries
	
	include_once dirname(__FILE__)."/pinterestClass.php";

	echo 'Starting Pinterest Crawler:'.PHP_EOL;
	$i = 0;
	$LIMIT_I = 5000;

	$crawler = new PinterestCrawler(); 
	$crawler->obeyRobotsTxt(true);
	$crawler->addContentTypeReceiveRule("#text/html#");
	$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png|js|rss|xml|atom|feed)$# i");
    $crawler->setPageLimit(4); // Set page-limit to 50 for testing 

    $URLS = array(   	array('','',$keyword)	);     	
		
	while (isset($URLS[$i]) and $i < $LIMIT_I):		
		$row = $URLS[$i];
		
		$row[2] = "http://www.pinterest.com/search/?q=".$row[2];
		$crawler->setURL($row[2]);
		$UAGENT = new UAgent();
		$crawler->setUserAgentString ($UAGENT->random_uagent()); 	
		$crawler->go(); 
	
		# REPORTING
		$report = $crawler->getProcessReport(); 

		echo "Links followed: ".$report->links_followed." ".PHP_EOL; 
		echo "Documents received: ".$report->files_received." ".PHP_EOL; 
		echo "Process runtime: ".$report->process_runtime." sec".PHP_EOL; 
        echo PHP_EOL;
		flush();
		unset($report);		
		$i++;
	endwhile;

	
	
	
		
	
	
	
