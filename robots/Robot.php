<?
class Robot {
    var $args;
    var $keyword;
    var $name;
    
    function __construct($argv){
        if (!isset($argv[2])){
            $argv[2] = "";
        }
        $this->args = $argv;
        $this->keyword=  @$argv[3];
        $this->name = $argv[2];
        
        echo '[Selected Robot] '.$argv[2]." @ ".strtoupper($argv[1]).PHP_EOL;
        echo '==---------------------------------------------------------------=='.PHP_EOL;
    }
    
    function results(){
    
    }
    
    function jsonResults($r){    
        echo json_encode($r);    
    }
    function txtResults(){
    }

}