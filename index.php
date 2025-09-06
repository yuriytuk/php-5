<?php

    function daysWork($year, $month) {
        $daysMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        // Первое число месяца - это первый рабочий день.
        $workDays = 0;
        $workDaysMonth = "";
        
        for ($day = 1; $day <= $daysMonth; $day++) {
            $date = "$year-$month-$day";
            $dayOfWeek = date('N', strtotime($date));
            
            if ($workDays == 1) {
                $workDaysMonth = $workDaysMonth . ($date . " + " . PHP_EOL);
                $workDays++;
                $day += 2;
                continue;
            }
            if ($dayOfWeek <= 5) {
                $workDaysMonth = $workDaysMonth . ($date . " + " . PHP_EOL);
                $workDays++;
                $day += 2;
            } else {
                $workDaysMonth = $workDaysMonth . ($date . PHP_EOL);
            }
        }
        echo $workDaysMonth;
    }

    $year = 2025;
    $month = 8;
    $workingDays = daysWork($year, $month);