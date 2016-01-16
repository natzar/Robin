<?
class Google extends Robot{


    function serp(){
        $keyword = $this->args[3];
        if (!isset($keyword)){
            echo '[!] Error Keyword for search missing';
            die();
        }
        include dirname(__FILE__)."/google-scraper.php";
    }

}