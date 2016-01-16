<?
class Robot {
    var $args;
    function __construct($argv){
        $this->args = $argv;
      //  echo '==---------------------------------------------------------------=='.PHP_EOL;
        echo '[Selected Robot] '.$argv[2]."@".strtoupper($argv[1]).PHP_EOL;
        echo '==---------------------------------------------------------------=='.PHP_EOL;
        
    }
}