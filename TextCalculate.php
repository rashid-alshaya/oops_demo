<?php

/**
 * @file
 * contains the TextCalculate class that implements TextCalculateInterface
 * and performs the business logic for String text calculations and validation.
 */

require_once 'TextCalculateInterface.php';

class TextCalculate implements TextCalculateInterface
{
  /**
   * Validate the string for special characters and extra spaces.
   * @param string $text
   * @return string
   */
  public function validateText($text) {
    if(!empty($text)){
      if(strpos($text, '  ') !== FALSE) {
        return 1;
      }
      return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', trim(preg_replace('/\s+/', ' ', $text)));
    }else
      return "Plese provide some text.";
  }
  
  /**
   * Calculate and convert string into array and return the desired output
   * in specified format.
   * @param string $text 
   * @param array $stopWords
   * @param string $type
   * @return type array/json
   */
  public function calculateText($text, array $stopWords, $type = 'json') {
    /**
     * Display error message in case of invalid text string.
     */
    if($this->validateText($text)){
      return "Please provide a valid text string. Special characters and extra spaces are not allowed in the Text string.";
    }
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
    
    if(strtolower($type) == 'json')
      return json_encode($results);
    else
      return $results;    
  }
}