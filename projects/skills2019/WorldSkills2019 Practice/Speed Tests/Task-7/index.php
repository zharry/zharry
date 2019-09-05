<?php
    date_default_timezone_set('America/New_York');

    $today = getdate();
    $date = getdate();
    $highlight = true;

    $deltaMonth = 0;
    if (isset($_GET['deltaMonth'])) {
        $date = getdate(strtotime('+' . $_GET['deltaMonth'] . ' month'));
        if ($_GET['deltaMonth'] != 0) {
            $highlight = false;
        }
        $deltaMonth = $_GET['deltaMonth'];
    }

    $month = $date["month"];
    $year = $date["year"];
    $highlightDate = $date["mday"];
    $startOfWeek = getdate(strtotime('01 ' . $month . ' ' . $year))["wday"];
    $numberOfDays = cal_days_in_month(CAL_GREGORIAN, $date["mon"], $year);
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar | <?=$month." ".$year?></title>
    <link rel="stylesheet" href="calendar.css">
</head>

<body>


    <div class="custom-calendar-wrap">
        <div class="custom-inner">
            <div class="custom-header clearfix">
                <nav>
                    <a href="?deltaMonth=<?=($deltaMonth - 1)?>" class="custom-btn custom-prev"></a>
                    <a href="?deltaMonth=<?=($deltaMonth + 1)?>" class="custom-btn custom-next"></a>
                </nav>
                <h2 id="custom-month" class="custom-month"><?=$month?></h2>
                <h3 id="custom-year" class="custom-year"><?=$year?></h3>
            </div>
            <div id="calendar" class="fc-calendar-container">
                <div class="fc-calendar fc-five-rows">
                    <div class="fc-head">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="fc-body">
                        <?php
                            $done = false;
                            $day = 1;

                            // Do the first week
                            echo "<div class=\"fc-row\">";
                            for ($i = 0; $i < $startOfWeek; $i++) {
                                echo "<div><span class=\"fc-date\"></span></div>";
                            }
                            for ($i = $startOfWeek; $i < 7; $i++) {
                                echo "<div" . (($highlight && $day == $highlightDate) ? ' class="fc-today"' : '') . "><span class=\"fc-date\">" . $day++ . "</span></div>";
                            }
                            echo "</div>";

                            // Do full weeks
                            $remaining = 7;
                            while (!$done) {
                                $remaining = 7;
                                echo "<div class=\"fc-row\">";
                                for ($i = 0; $i < 7; $i++) {
                                    echo "<div" . (($highlight && $day == $highlightDate) ? ' class="fc-today"' : '') . "><span class=\"fc-date\">" . $day++ . "</span></div>";
                                    $remaining--;

                                    if ($day > $numberOfDays) {
                                        $done = true;
                                        break 2;
                                    }
                                }
                                echo "</div>";
                            }

                            // Do remaining days
                            if ($remaining > 0)
                                for ($i = 0; $i < $remaining; $i++) {
                                    echo "<div><span class=\"fc-date\"></span></div>";
                                }
                            else
                                echo "</div>";

                        ?>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>