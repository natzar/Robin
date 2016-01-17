<?
class Robot {
    var $args;
    var $keyword;
    var $name;
    var $results; 
    
    function __construct($argv){
        if (!isset($argv[2])){
            $argv[2] = "";
        }
        $this->args = $argv;
        $this->keyword=  @$argv[3];
        $this->name = $argv[2];
        $this->results = array();
        
        echo '[Selected Robot] '.$argv[2]." @ ".strtoupper($argv[1]).PHP_EOL;
        echo '==---------------------------------------------------------------=='.PHP_EOL;
    }
    
    private function results(){
        // JSON RESULTS in file
        $d = Date("d/m-h:i:s");
        $file = fopen(dirname(__FILE__)."/../downloads/".$argv[1]."-".$argv[2]."-".$d.".json","w");
        fwrite($file,json_encode($this->results))    
        fclose($file);
    }
    
    

}