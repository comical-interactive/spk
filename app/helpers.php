<?php

 function getGrade($score, $indicators, $perimeters)
 {
     $matchIndex = 0;

     while ($score > current($perimeters) && current($perimeters)) {
         $matchIndex++;
         next($perimeters);
     }

     return $indicators[$matchIndex];
 }
