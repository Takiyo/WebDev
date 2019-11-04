<?php


class Story{
    public $noun;
    public $verb;
    public $adjective;
    public $adverb;

    public function __construct($noun, $verb, $adjective, $adverb)
    {
        $this->noun = $noun;
        $this->verb = $verb;
        $this->adjective = $adjective;
        $this->adverb = $adverb;
    }

    public function getNoun($noun){
        return $this->noun;
    }
    public function setNoun($noun){
        $this->noun = $noun;
    }

    public function getVerb($verb){
        return $this->verb;
    }
    public function setVerb($verb){
        $this->verb = $verb;
    }

    public function getAdjective($adjective){
        return $this->adjective;
    }
    public function setAdjective($adjective){
        $this->adjective = $adjective;
    }   

    public function getAdverb($adverb){
        return $this->adverb;
    }
    public function setAdverb($adverb){
        $this->adverb = $adverb;
    }



}


?>