<?
#
# 1. A robot may not injure a human being or, through inaction, allow a
# human being to come to harm.
#
# 2. A robot must obey orders given it by human beings except where such
# orders would conflict with the First Law.
#
# 3. A robot must protect its own existence as long as such protection
# does not conflict with the First or Second Law.


class Robot {
    var $args;
    var $keyword;
    var $name;
    var $job;
    var $results; 
    var $output;
    
    function __construct($argv){
        if (!isset($argv[2])){
            $argv[2] = "";
        }
        $this->args = $argv;
        $this->keyword=  @$argv[3];
        $this->job = $argv[2];
        $this->name = $argv[1];
        $this->results = array();
        $this->output = OutputRobot::singleton();
        $this->output->set('name',$argv[1]);
        $this->output->set('job',$argv[2]);
        
        echo '[Selected Robot] '.$argv[2]." @ ".strtoupper($argv[1]).PHP_EOL;
        echo '==---------------------------------------------------------------=='.PHP_EOL;
    }
    
}