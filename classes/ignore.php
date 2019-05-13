<?php

namespace alexia\mar;

class ignore {
    private $currently_ignoring;
    public function __construct(){
        $this->currently_ignoring = false;
    }

    public function test($line){
        if ($this->matchEndIgnore($line)){
            $this->currently_ignoring = false;
            return "";
        }
        if (true == $this->currently_ignoring){
            return "";
        }
        if ($this->matchStartIgnore($line)){
            $this->currently_ignoring = true;
            return "";
        }
        return $line;
    }

    public function matchStartIgnore($line){
        return preg_match('/phpcs:disable/', $line);
    }

    public function matchEndIgnore($line){
        return preg_match('/phpcs:enable/', $line);
    }
}
?>


