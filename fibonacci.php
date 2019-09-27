<?php

/**
 * Memoization function to optimise calculation of
 * fibonacci function
 * @param [function] $func
 * @return function
 */

$memoize = function ($func) {
 return function () use ($func) {
  // create cache store as associative array
  static $cache = [];

  // get the passed arguments
  $args = func_get_args();

  // check cache to see if the value args has been already calculated
  if (isset($cache[$args[0]])) {

   // if so return stored value and do not recalculate
   return $cache[$args[0]];

  } else {

   // if not call the fibonacci function with value $args and store returned value in the cache for future reference
   $cache[$args[0]] = call_user_func_array($func, $args);
  }

  // finally return the value associated with that argument passed
  return $cache[$args[0]];
 };
};

/**
 * calculate fibonacci sequence recursively optimized using a memoization function
 * returns a memoized fibonacci function that can be called with a value
 * @param [function] $function
 * @return function
 */
$fibonacci = $memoize(function ($n) use (&$fibonacci) {
 return ($n < 2) ? $n : $fibonacci($n - 1) + $fibonacci($n - 2);
});

/**
 *   optimized fibonacci function that can be called with
 *   @param [number] 
 *   @return number
 */
echo $fibonacci(20);
