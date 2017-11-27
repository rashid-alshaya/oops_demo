<?php

/**
 * @file
 * contains the Text class that implements the TextInterface  
 */

require_once 'TextInterface.php';

class Text implements TextInterface
{
  /**
   * To define the content type.
   * @var String
   */
  private $type;
  
  /**
   * To store the long string or text.
   * @var String
   */
  private $text;
  
  /**
   * contains the string array's of stop words.
   * @var array
   */
  private $stopWords = [];
  
  /**
   * Assign the content type.
   * @param string $type
   */
  public function setType($type) {
    $this->type = $type;
  }
  
  /**
   * Get response format i.e. json/array
   * @return string
   */
  public function getType() {
    return $this->type;
  }
  
  /**
   * Assign the string text into text variable.
   * @param type string
   */
  public function setText($text) {
    $this->text = $text;
  }
  
  /**
   * Get the string text.
   * @return string
   */
  public function getText() {
    return $this->text;
  }
  
  /**
   * Assign the stopwords in the stopwords variable.
   * @param array 
   */
  public function setStopWords(array $stopWords) {
    $this->stopWords = $stopWords;
  }
  
  /**
   * Get the array of stopwords.
   * @return string
   */
  public function getStopWords() {
    return $this->stopWords;
  }
}
