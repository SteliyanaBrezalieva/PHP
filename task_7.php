<?php

//Задача 7. Напишете цикли, които извеждат "триъгълници на Флойд" с 5, 10 и 21 реда. 
//Накратко казано, това са ляво подравнени правоъгълни триъгълници от редове с цели числа,
// където всеки ред започва с поредното число и съдържа с едно число повече от предния ред.
// 
//    Пример - триъгълник с 5 реда изглежда по следния начин:
//    1
//    2 3
//    4 5 6
//    7 8 9 10
//    11 12 13 14 15



$res5 = 1;                             //Създавам си променлива, в която ще записвам
for ($i = 1; $i <= 5; $i++) {         //Започвам цикъла от 1
    for ($j = 1; $j <= $i; $j++) {   //сравнявам i и j -> 1=1
        echo $res5++ . ' ';         //извеждам първоначално 1 
    }
        //първа итерация: i = 1, j = 1, проверка 1=1,извежда се на екрана res=1, увеличава се res с 1
       //втора итерация: i = 2, j = 1, проверка 1<2,извежда се на екрана res=2, увеличава се res с 1 -> 
      //                              следваща итерация във вложения цикъл: j = 2, 2=2,
     //                               извежда се на екрана res = 3(защото увеличихме с 1)
    //трета итерация: i = 3, j = 1 -> по същия начин се осъщяствява проверката, като тук ще изведе 4(увелечен res), 
   //                                 след това 5 и 6 и излиза от вложения, поставя нов ред и отново i се увеличава и влиза във вътрешния цикъл, докато i<=5
    echo '<br/>';                 // нов ред
} 



echo '<br/>'; //отделям условията, за по-добра четимост при извеждане на екран

$res10 = 1;                         //аналогично и тук - но за 10 реда
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $res10++ . ' ';
    }
    echo '<br/>';
}

echo '<br/>';

$res21 = 1;                         //аналогично и тук - но за 21 реда
for ($i = 1; $i <= 21; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $res21++ . ' ';
    }
    echo '<br/>';
}


     //Идея за реализиране на задачата:
    // Вместо да пишем нови цикли,
   // в зависимост дали искаме 5,10,21 и т.н
  // Да извеждаме съобщение, което подканва потребителя да въведе число - n,
 // на база на това число - се осъществява и цикъла.
//
//$res;    
//$n;                     
//for ($i = 1; $i <= n; $i++) {
//    for ($j = 1; $j <= $i; $j++) {
//        echo $res++ . ' ';
//    }
//    echo '<br/>';
//}