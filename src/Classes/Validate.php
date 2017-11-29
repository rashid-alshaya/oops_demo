<?php

require_once './src/Interfaces/ValidateInterface.php';

class Validate implements ValidateInterface
{
 /**
   * Validate the string for special characters and extra spaces.
   * @param string $text
   * @return string
   */
  public function validateText($text) {
    if(!empty($text)){
      if(strpos($text, '  ') !== FALSE || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', trim(preg_replace('/\s+/', ' ', $text)))) {
        return "Please provide a valid text string. Special characters and extra spaces are not allowed in the Text string.";
      }
    }else{
      return "Please provide some text value";
    }
  }
}