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
        
        echo '[Selected Robot] '.$argv[2]." @ ".strtoupper($argv[1]).PHP_EOL;
        echo '==---------------------------------------------------------------=='.PHP_EOL;
    }
    
     function wget($url){
            //$url = 'https://api.vineapp.com/channels/featured';
            if ($html = file_get_contents($url)){
                return $html;
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "iphone/110 (iPhone; iOS 7.0.4; Scale/2.00)");
           // curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$this->vineKey));
            //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($ch);
            if (!$result)
            {
                    echo curl_error($ch);
            }
            else
            {
                    return $result;
            }
    
            curl_close($ch);
     }       
    
     function saveResults(){           // JSON RESULTS in file

        $d = Date("d-m-h-i-s");
        $file = fopen(dirname(__FILE__)."/../downloads/".$this->args[1]."-".$this->args[2]."-".$d.".json","w");

        fwrite($file,json_encode($this->output->get('output'))); 
        fclose($file);
        echo "[Completed] Results saved at /downloads/".$this->args[1]."-".$this->args[2]."-".$d.".json".PHP_EOL;
    }
}