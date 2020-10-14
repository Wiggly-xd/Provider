<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

function build_calendar($month,$year,$dateArray) {

    $today_date = date("d");
    $today_date = ltrim($today_date, '0');

     $daysOfWeek = array('S','M','T','W','T','F','S');

     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

     $numberDays = date('t',$firstDayOfMonth);

     $dateComponents = getdate($firstDayOfMonth);

     $monthName = $dateComponents['month'];

     $dayOfWeek = $dateComponents['wday'];

     $calendar = "<table class='calendar'>";
     $calendar .= "<caption>$monthName $year</caption>";
     $calendar .= "<tr>";

     foreach($daysOfWeek as $day) {
          $calendar .= "<th class='header'>$day</th>";
     } 

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     if ($dayOfWeek > 0) { 
          $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
     }
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {

        if ($dayOfWeek == 7) {

             $dayOfWeek = 0;
             $calendar .= "</tr><tr>";

        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

        $date = "$year-$month-$currentDayRel";
        
    if($currentDayRel == $today_date ){  $calendar .= "<td class='day' id='today_date ' rel='$date'><b>$currentDay</b></td>"; } 

        else { $calendar .= "<td class='day' rel='$date'>$currentDay</td>"; }

        $currentDay++;
        $dayOfWeek++;

   }

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
          $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>"; 

     }
     
     $calendar .= "</tr>";

     $calendar .= "</table>";

     return $calendar;

}

$dateComponents = getdate();

$month = $dateComponents['mon']; 			     
$year = $dateComponents['year'];

echo build_calendar($month,$year,$dateArray);

?>
</body>
</html>