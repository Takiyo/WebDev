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
}


?>