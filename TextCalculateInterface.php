<?php

/**
 * @file
 * contains the method declarations of business requirements.
 */

interface TextCalculateInterface 
{
  /**
   * Validate the String text
   * @param type $text
   */
  public function validateText($text);
  
  /**
   * Calculate string text and provide the required results 
   * @param type $text
   * @param array $stopWords
   */
  public function calculateText($text, array $stopWords);
}