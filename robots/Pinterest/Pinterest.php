<?

class Pinterest extends Robot{


    function images(){
        $keyword = $this->args[3];
        if (!isset($keyword)){
            echo '[!] Error Keyword for search missing';
            die();
        }
        include dirname(__FILE__)."/lib/pinterest.php";
    }

}