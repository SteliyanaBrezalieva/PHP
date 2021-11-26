
<?php
/*

  Да се създаде работещ календар. За целта трябва да бъдат изпълнени следните условия:

  1. При избран месец от падащото меню и попълнена година в полето - да се визуализира календар за въпросните месец и година
  2. Ако не е избран месец или година, да се използват текущите (пример: ноември, 2021)
  3. Месецът и годината, за които е показан календар да са попълнени в падащото меню и полето за година
  3. При натискане на бутон "Today" да се показва календар за текущите месец и година
  5. В първия ред на календара да има:
  1. Стрелка на ляво, която да показва предишния месец при кликване
  2. Текст с името на месеца и годината, за които са показани дните
  3. Стрелка в дясно, която да показва следващия месец при кликване
  6. Таблицата да показва дни от предишния и/или следващия месец до запълване на седмиците (пример: Ако месеца започва в сряда, да се покажат последните два дни от предишния месец за вторник и понеделник)
  7. Показаните дни в таблицата трябва да са черни и удебелени за текущия месец, и сиви за предишен или следващ месец (css клас "fw-bold" за текущия месец и "text-black-50" за останалите)

 */

//date_default_timezone_set("Europe/Sofia");

$m = date('F'); //Извеждане на текущ месец, 'F' - пълно име - пр. November
$y = date('Y'); //Извеждане на текущa година
$today = date('Y-m'); //Извеждане на текуща дата(година/месец)



if (isset($_GET['month'])) { //Ако 'month' има стойност - в случая на 229-ти ред, при преминаване към Previous month - month взима стойността на $prev
    $month = $_GET['month'];
} else {
    $month = date('Y-m'); //ако не - взима текуща дата - година / месец
}
$timestamp = strtotime($month . '-01');
$title = date('F, Y', $timestamp); // title ще бъде или текущ месец и текуща година, или ще се зададе месец/ година от избраните чрез prev/next

//if (isset($_POST['btn'])) { // ако е натиснат бутон Show -> 
//    if (!empty($_POST['m'])) { // и нямаме избран месец
//        $selected = $_GET['m']; // присвояваме на selected стойността от <select> 'm' ->
//        $month = $_GET['m']; // присвояваме на month избрания месец
//        $timestamp = strtotime($month . '-01');
//        $title = date('F, Y', $timestamp);
//    }
//}

// if(isset($_POST['btn'])) 
//    {
//    
//       $month= $_POST['m'];
//       $timestamp = strtotime($month . '-01'); 
//       $title = date('F, Y', $timestamp);
//           
//    }   
    
//    if(isset($_GET['m']))
//    {
//        $selected = $_GET['m'];
//    }
//$prev = date('Y-m-d', strtotime("first day of -1 month")); 
//$next = date('F-Y',strtotime('next month'));


$prev = date('Y-m', strtotime('-1 month', $timestamp)); //предишен месец
$next = date('Y-m', strtotime('+1 month', $timestamp)); //следващ месец


$dayCount = date('t', $timestamp); // 't' - брой дни в дадения месец

$d = date('N', $timestamp);

$weeks = [];
$week = '';

$week = $week . str_repeat('<td></td>', $d - 1); // повтаря '<td></td>' / $d - 1  и присвоява на $week

for ($day = 1; $day <= $dayCount; $day++, $d++) {

    $date = $month . '-' . $day;

    if ($today == $date) {
        $week = $week . '<td class="today">';
    } else {
        $week = $week . '<td>';
    }
    $week = $week . $day . '</td>';

    if ($d % 7 == 0 || $day == $dayCount) {


        if ($day == $dayCount && $d % 7 != 0) {

            $week .= str_repeat('<td>*</td>', 7 - $d % 7);
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="project.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="gallery.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



        <title>Calendar</title>
    </head>
    <body>


        <main id="gallery">

            <div class="container">  
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0"  ></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3" class="active"></li>



                    </ol>
                    <div class="carousel-inner">

                        <div class="item active ">
                            <img src="https://wallpaperaccess.com/full/490164.jpg"  style="width:100%;height: 500px;" >
                        </div>
                        <div class="item">
                            <img src="https://wallpaperboat.com/wp-content/uploads/2020/07/30/51519/sea-02.jpg"  style="width:100%;height: 500px;" >
                        </div>
                        <div class="item ">
                            <img src="https://wallpapercave.com/wp/qwgKhjq.jpg"  style="width:100%; height: 500px;" >
                        </div>
                        <div class="item ">
                            <img src="https://i.pinimg.com/originals/e4/de/1a/e4de1a5a0987ae59dec8a251af8538f4.jpg"  style="width:100%; height: 500px;" >
                        </div>



                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </main>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Calendar</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                    <form action="" method="post" class="row g-3">
                        <div class="col-md-6 col-lg-6">
                            <label class="form-label" for="month" >Select month</label>

                                <select name="m" class="form-control"  value="<?php echo $_GET['m'] ?? $m; ?>"
<!--                            <select name="m" class="form-control"  value="<?php echo $selected ?? $m; ?>">-->
                      
                                <option  value="1">January</option>
                                <option  value="2">February</option>
                                <option  value="3">March</option>
                                <option  value="4">April</option>
                                <option  value="5">May</option>
                                <option  value="6">June</option>
                                <option  value="7">July</option>
                                <option  value="8">August</option>
                                <option  value="9">September</option>
                                <option  value="10">October</option>
                                <option  value="11">November</option>
                                <option  value="12">December</option>
                            </select>

                            <!--  //
                                //  for ($i = 0; $i < 12; $i++) {
                                     // $time = strtotime(sprintf('%d months', $i));   
                                      //$label = date('F', $time);   
                                      //$value = date('n', $time);
                                      //echo "<option value='$value'>$label</option>";
                             //     }
                                 
                            -->
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label class="form-label" for="year">Year:</label>
                            <input type="text" name="y" class="form-control" value="<?php echo $_GET['y'] ?? $y; ?>">
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <button type="submit"  id= "btn" name="btn" class="btn btn-primary">Show</button>



                            <a href="?m=<?php echo $m; ?>&?y=<?php echo $y; ?>" class="btn btn-secondary" name="today">Today</a>


                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-5 offset-md-3 col-lg-6 offset-lg-3">
                    <table class="table table-bordered text-center ">
                        <thead>
                            <tr>
                                <th>
                                    <a href="?month=<?= $prev; ?>" title="Previous month">&larr;</a>
                                </th>
                                <th colspan="5" class="text-center"><?= $title; ?></th>
                                <th>
                                    <a href="?month=<?= $next; ?>" title="Next month">&rarr;</a>
                                </th>
                            </tr>
                            <tr>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                                <th>Sun</th>
                            </tr>
                        </thead>
                        <tbody >
<?php
foreach ($weeks as $week) {
    echo $week;
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>

<style>

    body{
        background-color: #e6f2ff;
    }

    .gallery{
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        font-family: 'Sofia';

    }
    .gallery ul{
        padding: 5px;

    }
    .gallery ul li{
        border:none;

    }
    .gallery a:hover{
        text-decoration: none;
        border:1px solid white;
        color:white;
        padding: 14px 9px;
    }


    .gal h1,.col h1{
        text-align: center;
        color: white;
        padding: 1%;
        background-color:#66b3ff;
        font-family: 'Sofia';
    }
    thead{

        color:black;

    }



</style>