<?php
function sing($lyrics, $voice){
 if (!$lyrics.isEmpty() && $voice.isAwesome()){
   singText($lyrics).config($voice);
}
}

function dance($songs, $steps){
  while($songs.isPlaying()){
    if($songs.canDance() && $steps.isValid())
{ 
 Dancer.move($steps);
}
}
function play($dialog, $theme, $voice, $songs){}
?>
