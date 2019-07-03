<?php

function echoStoryList($queryReturn){
    foreach($queryReturn as $row)
    {
        echo "<p>When I was just a <span class=\"w3-tag\">" . $row['adjective'] . "</span> " .
            "lad, I decided to venture out in to the forest. Much to my dismay, I found a <span class=\"w3-tag\">" . $row['noun'] . "</span> " .
            "in my path. I had never seen one before. I promptly shouted out 'Hey <span class=\"w3-tag\">" . $row['noun'] . "</span>! " .
            "If you don't <span class=\"w3-tag\">" . $row['adverb'] . "</span> get out of my way, I'll have to... I don't know... <span class=\"w3-tag\">" . $row['verb'] .
            "</span> you? Hopefully that works.</p><br><br><br><br>";

    }
}

function createStoryArray($qReturn){
    //$storyArray = array(new Story('test1', 'test2', 'test3', 'test4'));
    $storyArray = array();
    foreach($qReturn as $row)
    {
        $story = new Story($row['noun'], $row['verb'],
            $row['adjective'], $row['adverb']);

        array_push($storyArray, $story);
    }
    return $storyArray;
}

function echoStoryTable($array){
    echo '<table style="width:100%"><tr><th>Noun</th><th>Verb</th><th>Adjective</th><th>Adverb</th></tr>';
    foreach($array as $story){
        echo '<tr><td>'.$story->noun.'</td><td>'.$story->verb.'</td><td>'.$story->adjective.'</td><td>'.$story->adverb.'</td></tr>';
    }
    echo '</table>';
}

