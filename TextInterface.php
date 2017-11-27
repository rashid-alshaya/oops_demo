<?php

/**
 * @file
 * contains the declarations for setters and getters methods.
 */

interface TextInterface 
{
  /**
   * Get the format type i.e. json/array
   */
  public function getType();
  
  /**
   * Set the format type 
   * @param type $type
   */
  public function setType($type);
  
  /**
   * Get the Text of type string.
   */
  public function getText();
  
  /**
   * Set the text of type string.
   * @param type $text
   */
  public function setText($text);
  
  /**
   * Get the array of stop words.
   */
  public function getStopWords();
  
  /**
   * Set the array of stop words.
   * @param array $stop_words
   */
  public function setStopWords(array $stop_words);
}
