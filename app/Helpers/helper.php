<?php

if (!function_exists('calculateDecile')) {
    function calculateDecile($targetScore)
    {
        $numStudents = 10000;
        $mean = 6000;
        $stdDev = 1500;
        for ($i = 0; $i < $numStudents; $i++) {
            $score = round($mean + ($stdDev * rand(-1, 1)));
            if ($score < 0) {
                $score = 0;
            } elseif ($score > 10000) {
                $score = 10000;
            }
            $scores[] = $score;
        }

        $count = count($scores);
        $decileIndex = ceil($count * 0.1); // به مقدار دهک محاسبه می‌شود
        $deciles = [];

        // محاسبه دهک‌ها
        for ($i = 1; $i <= 10; $i++) {
            $decileValue = $scores[($i * $decileIndex) - 1]; // دهک‌ها را محاسبه می‌کنیم
            $deciles[$i] = $decileValue;
        }

        // پیدا کردن دهک مربوط به نمره هدف
        foreach ($deciles as $decile => $value) {
            if ($targetScore <= $value) {
                return $decile;
            }
        }

        return 10;
    }
}
function generateScores($average, $count, $deviation)
{
    $scores = array();
    for ($i = 0; $i < $count; $i++) {
        // تولید عدد تصادفی بر اساس میانگین و انحراف معیار
        $scores[] = round($average + rand(-$deviation, $deviation));
    }
    return $scores;
}

function calculateRank($scores, $userScore)
{
    $scoresAbove = 0;
    foreach ($scores as $score) {
        if ($score > $userScore) {
            $scoresAbove++;
        }
    }
    return $scoresAbove + 1; // رتبه کاربر
}
function sumDataExam(array $data, string $arguman)
{
    $sumAll = null;

    foreach ($data as $result) {
        $sumAll += $result["$arguman"];
    }
    return $sumAll;
}
