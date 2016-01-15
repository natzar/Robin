<?

class PinterestCrawler extends PHPCrawler 
{

  function handleDocumentInfo($DocInfo) 
  {
//	global $writer;
    echo "Page requested: ".$DocInfo->url." (".$DocInfo->http_status_code.")<br>"; 
    if ($DocInfo->http_status_code =='200' and $DocInfo->received and  $DocInfo->content_type =='text/html' and isset($DocInfo->content)){
			$html = $DocInfo->content;
			$host = $DocInfo->host;   
			$urlPosted = $DocInfo->url;
			$htmldom= new simple_html_dom();
			$htmldom->load($html);
			$data = array();
			$images= $htmldom->find('.pinHolder img');
			echo '<hr>'.		count($images).'<hr>';
			$i=216;
			foreach ($images as $raw_links) {
				$data['items'][]= array("title" => $raw_links->alt,"img" => $raw_links->src	) ;
				copy($raw_links->src,'../iguana.io/data/img/tinacon_prof'.$i.'.jpg');
				$i++;						
			}
			echo json_encode($data);
			//$writer->writeRow(json_encode($data));
			unset($data);
			unset($htmldom);
	}
  } 
}

        

       	
