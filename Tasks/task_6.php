<?php
?>


<!-- Задача 6. Напишете вложени цикли, 
               които извеждат таблицата от прикачения файл table.png 
               (в края на условието)
 -->



<!doctype html>
<html lang="en">
    <head>
        Required meta tags 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Homework PHP :)</title>
    </head>
    <body>
        <h1 style="text-align:center">Table</h1>
        <table class="table table-bordered">        <!-- извеждаме под формата на таблица -->

            <?php for ($i = 0; $i < 10; $i++): ?>   <!-- for цикъл за редовете  -->
                <tr>  
                   <?php for ($j = 1; $j <= 10; $j++) : ?> 
<!--  i = 0, j = 1 -> върти се вложения цикъл 10 пъти-->
                        <td style="color:#002266"> <?= ($i * $j) + $j; ?>   </td>  
<!--                                (0*1) + 1 = 1 
                                    (0*2) + 2 = 2 
                                    ... до 10
                                    Интересното е, когато излезе от този for и увеличи с 1 i:
                                    (1*1) + 1 = 1 + 1 = 2
                                    (1*2) + 2 = 2 + 2 = 4
                                    (1*3) + 3 = 3 + 3 = 6
                                    ...
                                    Когато i = 9(последно за външен цикъл)
                                    (9*1) + 1 = 10
                                    (9*2) + 2 = 20
                                    ...
                                    Запълваме таблицата.-->
                    <?php endfor; ?> 
                    <?php echo '<tr/>'; ?>
                <?php endfor; ?>


        </table>


    </body>
</html>

