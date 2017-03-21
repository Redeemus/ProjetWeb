<?php
//
//$work = json_encode($workouts);
//$fwork = json_encode($futurworkouts);
//$msg= json_encode($msg);
//echo 'The three last workout = '.  $work;

echo json_encode(compact('workouts', 'comments'));
echo json_encode(compact('futurworkout', 'comments'));
echo json_encode(compact('message', 'comments'));
