<?php

    // to generate key
    function generateKey() {
        $keylength = "10";
        $keyStr = "01234&*@56789abcdefgh]-=_+!ijklmnop()&^$%#qrstuv[wxyz";

        $randStr = substr(str_shuffle($keyStr), 0, $keylength);
        return $randStr;
    }
    echo generateKey()."<br><br>";

    //another way to generate key
    function otherWay() {
        $ranStr = uniqid();
        return $ranStr;
    }
    echo otherWay()."<br><br>";

    //another way to generate key
    function thirdWay() {
        $rnStr = uniqid('https://www.fuad.com.ng/');
        return $rnStr;
    }
    echo "Your referral link is ".thirdWay()."<br><br>";

    //another way to generate key
    function fourtWay() {
        $rnSt = uniqid('fuad', true);
        return $rnSt;
    }
    echo fourtWay()."<br><br>";

    $first = 12345;
    $second = 987654;
    echo rand($first, $second)."<br><br>";

    /*
    Going to the bank on january first  and deposit #1000, interest rate is 5%, withdrawal is after 5 years
    */
    $deposit = 1000;
    $interest = 0.05;
    for($year = 1; $year <= 5; $year++) {
        $deposit += ($deposit * $interest);
            echo "The interest on ".$deposit." at the end of ".$year." years is ". $deposit."<br>";
    }
    echo "<br>";

    $easy = 1000000;
    function check($easy) {
        echo $easy;
    }
    check($easy);