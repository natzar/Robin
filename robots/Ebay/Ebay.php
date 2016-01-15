<?
class Ebay extends Robot{


    function products(){
        $keyword = $this->args[3];
        if (!isset($keyword)){
            echo '[!] Error Keyword for search missing';
            die();
        }
        include dirname(__FILE__)."/lib/ebay.php";
    }

}