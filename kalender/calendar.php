<html>
<head>
<script>
$(document).ready(function () {
    var calendar = $calendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>
</head>
<body>
<?php
class Calendar {  
     
   public function __construct() {
$this->naviHref = htmlentities($_SERVER['PHP_SELF']);
}
/********************* PROPERTY ********************/
private $dayLabels = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
private $currentYear = 0;
private $currentMonth = 0;
private $currentDay = 0;
private $currentDate = null;
private $daysInMonth = 0;
private $naviHref = null;
/********************* PUBLIC **********************/
/**
** print out the calendar
**/
public function show() {
$year = null;
$month = null;
if (null == $year && isset($_GET['year'])) {
$year = $_GET['year'];
} elseif (null == $year) {
$year = date("Y", time());
}
if (null == $month && isset($_GET['month'])) {
$month = $_GET['month'];
} elseif (null == $month) {
$month = date("m", time());
}
$this->currentYear = $year;
$this->currentMonth = $month;
$this->daysInMonth = $this->_daysInMonth($month, $year);
$content = '<div id="calendar">' . "\r\n" . '<div class="box">' . "\r\n" . $this->_createNavi() . "\r\n" . '</div>' . "\r\n" . '<div class="box-content">' . "\r\n" . '<ul class="label">' . "\r\n" . $this->_createLabels() . '</ul>' . "\r\n";
$content .= '<div class="clear"></div>' . "\r\n";
$content .= '<ul class="dates">' . "\r\n";
$weeksInMonth = $this->_weeksInMonth($month, $year);
// Create weeks in a month
for ($i = 0; $i < $weeksInMonth; $i++) {
//Create days in a week
for ($j = 1; $j <= 7; $j++) {
$content .= $this->_showDay($i * 7 + $j);
}
}
$content .= '</ul>' . "\r\n";
$content .= '<div class="clear"></div>' . "\r\n";
$content .= '</div>' . "\r\n";
$content .= '</div>' . "\r\n";
return $content;
}
/********************* PRIVATE **********************/
/**
** create the li element for ul
**/
private function _showDay($cellNumber) {
if ($this->currentDay == 0) {
$firstDayOfTheWeek = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));
if (intval($cellNumber) == intval($firstDayOfTheWeek)) {
$this->currentDay = 1;
}
}
if (($this->currentDay != 0) && ($this->currentDay <= $this->daysInMonth)) {
$this->currentDate = date('Y-m-d', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . ($this->currentDay)));
$cellContent = $this->currentDay;
$this->currentDay++;
} else {
$this->currentDate = null;
$cellContent = null;
}
$today_day = date("d");
$today_mon = date("m");
$today_yea = date("Y");
$class_day = ($cellContent == $today_day && $this->currentMonth == $today_mon && $this->currentYear == $today_yea ? "this_today" : "nums_days");
return '<li class="' . $class_day . '">' . $cellContent . '</li>' . "\r\n";
}
/**
** create navigation
**/
private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header">'.
                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
    }
/**
** create calendar week labels
**/
private function _createLabels() {
$content = '';
foreach ($this->dayLabels as $index => $label) {
$content .= '<li class="name_days">' . $label.'</li>' . "\r\n";
}
return $content;
}
/**
** calculate number of weeks in a particular month
**/
private function _weeksInMonth($month = null, $year = null) {
if (null == ($year)) {
$year = date("Y", time());
}
if (null == ($month)) {
$month = date("m", time());
}
// find number of days in this month
$daysInMonths = $this->_daysInMonth($month, $year);
$numOfweeks = ($daysInMonths % 7 == 0 ? 0 : 1) + intval($daysInMonths / 7);
$monthEndingDay = date('N',strtotime($year . '-' . $month . '-' . $daysInMonths));
$monthStartDay = date('N',strtotime($year . '-' . $month . '-01'));
if ($monthEndingDay < $monthStartDay) {
$numOfweeks++;
}
return $numOfweeks;
}
/**
** calculate number of days in a particular month
**/
private function _daysInMonth($month = null, $year = null) {
if (null == ($year)) $year = date("Y",time());
if (null == ($month)) $month = date("m",time());
return date('t', strtotime($year . '-' . $month . '-01'));
}
}
?>
</body>
</html>