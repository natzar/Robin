<?
class Robot {
    var $args;
    function __construct($argv){
        $this->args = $argv;
        echo '[I] New Robot trying job '.$argv[2].' on '.$argv[1].PHP_EOL;
    }
}