<?php
function sing($lyrics, $voice){
 if (!$lyrics.isEmpty() && $voice.isAwesome()){
   singText($lyrics).config($voice);
}
}

function dance($songs, $steps){
  while($songs.isPlaying()){
   Dancer.dance($steps);
}
}

function play($dialog, $theme, $voice, $songs){}
?>
