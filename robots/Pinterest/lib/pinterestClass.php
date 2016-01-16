<?

class PinterestCrawler extends PHPCrawler 
{

  function handleDocumentInfo($DocInfo) 
  {
//	global $writer;
    echo "Page requested: ".$DocInfo->url." (".$DocInfo->http_status_code.")".PHP_EOL; 
    if ($DocInfo->http_status_code =='200' and $DocInfo->received and  $DocInfo->content_type =='text/html' and isset($DocInfo->content)){
			$html = $DocInfo->content;
			$host = $DocInfo->host;   
			$urlPosted = $DocInfo->url;
			$htmldom= new simple_html_dom();
			$htmldom->load($html);
			$data = array();
			$images= $htmldom->find('.pinHolder img');
			echo 'Total Images '.		count($images).PHP_EOL;
			$i=intval(Date("YmdHis"));
			foreach ($images as $raw_links) {
				$data['items'][]= array("title" => $raw_links->alt,"img" => $raw_links->src	) ;
				copy($raw_links->src,'downloads/'.$i.'.jpg');
				$i++;						
			}
			echo json_encode($data).PHP_EOL;
			//$writer->writeRow(json_encode($data));
			unset($data);
			unset($htmldom);
	}
  } 
}

        

       	
