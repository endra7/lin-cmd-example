<?php
function sing($lyrics, $voice){
 if (!$lyrics.isEmpty() && $voice.isAwesome()){
   singText($lyrics).config($voice);
}
}

function dance($songs, $steps){}

function play($dialog, $theme, $voice, $songs){}
?>
