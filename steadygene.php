<?php
/**
 * Created by PhpStorm.
 * User: Urvashi Sahai
 * Date: 6/8/2017
 * Time: 12:03 PM
 */

$handle = fopen ("php://stdin","r");
$length = fgets($handle);
$gene= fgets($handle);

function replaceString($gene, $n)
{
    $sub = 0;
    $a =0;
    $c = 0;
    $g =0;
    $t = 0;

    for ($i = 0; $i < $n; $i++) {
        $x = $gene[$i];

        if ($x == 'A') {
            $a++;
        }
        if ($x == 'C'){
            $c++;
        }
        if ($x == 'G'){
            $g++;
        }
        if ($x == 'T'){
            $t++;
        }
    }

    $issteady = $n / 4;

    if ($a !== $issteady || $c !== $issteady || $g !== $issteady || $t !== $issteady) {
        $sub = $n + 1;
        $left = 0;

        for ($right = 0; $right < $n; $right++) {
            $y = $gene[$right];

            if ($y == 'A') $a--;
            if ($y == 'C') $c--;
            if ($y == 'G') $g--;
            if ($y == 'T') $t--;

            while ($a <= $issteady && $c <= $issteady && $g <= $issteady && $t <= $issteady) {
                $sub = min($sub, $right - $left + 1);
                $z = $gene[$left];

                if ($z == 'A') {
                    $a++;
                }
                if ($z == 'C'){
                    $c++;
                }
                if ($z == 'G') {
                    $g++;
                }
                if ($z == 'T'){
                    $t++;
                }

                $left++;
            }
        }
    }

    return $sub;
}

echo replaceString($gene, $length);
?>