<?php
    $redis = new Redis();
    $connected = $redis->connect("127.0.0.1");

    while (true) {
        $seconds = (int) date("s");
        print $seconds."\n";
        
        if ($seconds==55) {
            print "RESTARTING input processors\n";
            $redis->set('stopinputqueue:1',1);
            // $redis->set('stopinputqueue:1',1);
            // $redis->set('stopinputqueue:2',1);
            // $redis->set('stopinputqueue:3',1);
            exit;
        }
        
        sleep(1);
    
    }

