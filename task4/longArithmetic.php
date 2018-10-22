<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.10.18
 * Time: 0:27
 */

/**
 * @param $a
 * @param $b
 * @return string
 */
function sum(string $a, string $b) : string
{
    $totalNum = '';
    $inMind = 0;
    $strlenA = strlen($a);
    $strlenB = strlen($b);
    $shortest = $strlenA;
    $longString = $b;
    $diff = $strlenB - $shortest;
    if (($strlenA <=> $strlenB) === 1) {
        $shortest = $strlenB;
        $diff = $strlenA - $shortest;
        $longString = $a;
    }
    
    $inMind = 0;
    for ($i = 1; $i < $shortest + 1; $i++) {
        $sumTemp = $a[$strlenA - $i] + $b[$strlenB - $i] + $inMind;
        if ($sumTemp > 9) {
            $ost = $sumTemp - 10;
            $totalNum = $ost.$totalNum;
            $inMind = 1;
        } else {
            $inMind = 0;
            if ($sumTemp > 9) {
                $ost = $sumTemp - 9;
                $totalNum = $ost.$totalNum;
                $inMind = 1;
            }
            $totalNum = $sumTemp.$totalNum;
        }
    }

    if ($inMind) {
        if ($strlenA === $strlenB) {
            return '1'.$totalNum;
        }
        
        for ($i = $diff - 1; $i >= 0; $i--) {
            $tmpNum = $longString[$i] + 1;
            if ($tmpNum === 10) {
                $totalNum = '0'.$totalNum;
            } else {
                $totalNum = substr($longString, 0, $diff - 1) . $tmpNum . $totalNum;
                $inMind = 0;
                break;
            }
        }
        if($inMind) {
            $totalNum = '1'.$totalNum;
        }

        return $totalNum;
    }

    return substr($longString, 0, $diff) . $totalNum;
}
