<?
class Robot {
    var $args;
    function __construct($argv){
        $this->args = $argv;
        if (!isset($argv[2])){
            $argv[2] = "";
        }
      //  echo '==---------------------------------------------------------------=='.PHP_EOL;
        echo '[Selected Robot] '.$argv[2]." @ ".strtoupper($argv[1]).PHP_EOL;
        echo '==---------------------------------------------------------------=='.PHP_EOL;
        
    }
}