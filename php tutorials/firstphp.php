<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    $offset = 0;
    if(isset($_POST['text']) && isset($_POST['searchfor']) && isset($_POST['replacewith'])) {
         $text = $_POST['text'];
         $search = $_POST['searchfor'];
         $replace = $_POST['replacewith'];

         $search_length = strlen($search);

         if(!empty($text) && !empty($search) && !empty($replace)) {
             while($strpos = strpos($text, $search, $offset)) {
                 $offset = $offset + $search_length;
                 $text = substr_replace($text, $replace, $strpos, $search_length);
             }
             echo $text;
         } else {
             echo 'Please fill in all blank fields Sir/Ma';
         }
    }
?>
<style>
.date {
    padding: 0.6rem;
    color: green;
    font-family: sans-serif;
    font-weight: 0.5rem;
    font-size: 0.9rem;
    background-color: #b2beb5;
}
.submit {
    padding: 0.15rem 0.6rem;
    margin-top: 0.5rem;
    margin-left: 0.3rem;
    cursor: pointer;
}
</style>
<script type="text/javascript">
    date = document.querySelector('.date').value;
    submit = document.querySelector('.submit');
    submit.addEventListener('submit', function(e) => {
        e.preventDefault();
        alert('You\'ve choosen a date');
    });
</script>
<body>
<h1>Date from a date to another</h1><br>
<form action="" method="POST" name="date">
    <input type="date" class="date"><br>
    <button class="submit">Submit</button>
</form>
<br><br><br>

    <form action="firstphp.php" method="POST">
        <textarea name="text" cols="30" rows="10"></textarea><br>
        <p>Search For:</p><br>
        <input type="text" name="searchfor"><br><br>
        <p>Replace with:</p><br>
        <input type="text" name="replacewith"><br><br>
        <input type="submit" value="Search & Replace">
    </form><br>
    
<?php
$a = 25;
switch($a) {
    case 0:
        echo " Not verified ";
    break;
    case 5:
        echo " Not Complete verification ";
    break;
    case 10:
        echo " Complete Verification ";
    break;
    case 20:
        echo " It is okay ";
    break;
    default:
        echo "Go and Die ";
}

$id_address = $_SERVER['REMOTE_ADDR'];
$word = " Mandira ";
echo "I Love you ",$word;
print 12 * 5;
echo " times ";
$x = 11;
echo ++$x.'<br>'.$id_address.'<br>';
$id_address = $_SERVER['REMOTE_ADDR'];
echo $id_address;
echo"<br>";
echo"<br>";

$birthday = strtotime("18:00am November 01 2021");
echo $birthday;
echo"<br>";
$myBirthday = mktime(0, 0, 0, 11, 01, 2021);
$today = time();
$difference = ($myBirthday - $today);
$days = (int)($difference / 86400);
$hours = (round($difference / 3600));
echo 'Am waiting for '.$days.' days '.$hours.' hours to my next birthday';
//echo time_elapse_string('2013-05-01 00:22:35', true);
echo "<br>";
echo '<br>';

//$time_elapsed = timeAgo($time_ago);
//$time_ago = strtotime("2020-11-01 12:30:30");
echo timeAgo($time_ago);
function timeAgo($time_ago) {
    $time = strtotime($time_ago);
    $cur_time = time();
    $time_elapsed = $cur_time - $time;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);
    //seconds
    if($seconds <= 60) {
            return "just now";
    } else if($minutes <= 60) {
        if($minutes == 1) {
            return "one minute ago";
        }
    } else if($hours <= 24) {
        if($hours == 1) {
            return "an hour ago";
        } else {
            return "$days days ago";
        }
    } else if($weeks <= 4.3) {
        if($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if($months <= 12) {
        if($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if($years == 1) {
            return "a year ago";
        } else {
            return "$years years ago";
        }
    }
}


echo "<br>";
echo "<br>";
/*
$mytimestring = "2021-11-01 00:22:35";
function humanTiming($time) {
    $time = time() - $time;
    $time = ($time < 1) ? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach($tokens as $unit => $text) {
        if($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.''.$text.(($numberOfUnits > 1) ? 's':'');
    }
}
echo humanTiming(strtotime($mytimestring));
*/
echo "<br>";


/*
// changing of Greetings through time
var thehours = new Date().getHours();
var themessage;
var morning = ('Good morning, It\'s Breakfast Time');
var afternoon = ('Good afternoon, It\'s Lunch Time');
var evening = ('Good evening, It\'s Dinner Time');
var infinity =('Judgement Day');

if (thehours >= 0 && thehours < 12) {
    themessage = morning; 

} else if (thehours >= 12 && thehours < 17) {
    themessage = afternoon;

} else if (thehours >= 17 && thehours < 24) {
    themessage = evening;
} else {
    themessage = infinity;
}

$('.greeting').append(themessage);
*/
?>
</body>
</html>