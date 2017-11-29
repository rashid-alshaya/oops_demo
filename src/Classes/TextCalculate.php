<?php

/**
 * @file
 * contains the TextCalculate class that implements TextCalculateInterface
 * and performs the business logic for String text calculations and validation.
 */

require_once './src/Interfaces/TextCalculateInterface.php';

class TextCalculate implements TextCalculateInterface
{
  /**
   * Calculate and convert string into array and return the desired output
   * in specified format.
   * @param string $text 
   * @param array $stopWords
   * @param string $type
   * @return type array
   */
  public function calculateText($text, array $stopWords) {
    
    $strArr = explode(' ', $text);
    for($i = 0; $i < count($stopWords); $i++){
      if(strpos($text, $stopWords[$i]) !== FALSE) {
        if (($key = array_search($stopWords[$i], $strArr)) !== false) {
          unset($strArr[$key]);
        }
      }
    }
    $arrCountVal = array_count_values($strArr);
    arsort($arrCountVal);
    
    $results = [];
    $i = 1;
    foreach($arrCountVal as $key => $val){
      $results[] = ['word' => $key, 'count' => $val, 'rank' => $i];
      $i++;
    }
    return $results;  
  }
}