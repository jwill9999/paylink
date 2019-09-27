<?php


/**
 * FizzBuzz Create a loop that will print all the numbers for the range, 1-20.
 * If the number is:divisible by 3, print 'Fizz'
 * divisible by 5, print 'Buzz' 
 * divisible by 3 & 5, 'FizzBuzz'
 * otherwise print the number 
 *
 * @param [type] $number
 * @return void
 */


function fizzBuzz($number)
{
 // loop over each value from 1 up to and equal to value passed
 for ($i = 1; $i <= $number; $i++) {

  if ($i % 15 === 0) {
   echo 'fizzbuzz' . "\n";

  } else if ($i % 3 === 0) {
   echo 'Fizz' . "\n";

  } else if ($i % 5 === 0) {
   echo 'Buzz' . "\n";

  } else {
   echo $i . "\n";

  }
 }

}

fizzBuzz(20);
