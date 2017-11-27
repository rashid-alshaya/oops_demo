<?php

/**
 * @file
 * contains the TextService class to get the calculated result.
 */

require_once 'Text.php';
require_once 'TextCalculate.php';

class TextService
{
  /*
   * contains the object of TextCalculate class.
   * @var type
   */
  private $textCalculateService;
  
  /**
   * Contains and assign the textCalculate and Text class object into class variables.
   * @param TextCalculateInterface $textCalculate
   * @param TextInterface $textServ
   */
  public function __construct(TextCalculateInterface $textCalculate){    
    $this->textCalculateService = $textCalculate;
  }
  
  /**
   * 
   * @param type $text - contains string 
   * @param array $stopWords - contains words to be removed from the string. 
   * @param type $type - contains the format for content type.
   * @return type - returns the results in the form of json or array.
   */
  public function getResults($text, array $stopWords, $type){
    return $this->textCalculateService->calculateText($text, $stopWords, $type);   
  }
}

/**
 * contains the string and arr as setter and getter
 */
$text = new Text();
$text->setType('arr');
$text->setText('Lorem ipsum dolor aa aa sit amet ex bb his altera aa latine bb');
$text->setStopWords(array('Lorem','his','latine'));

/**
 * contains the result as response in the form of array or json.
 * @var str
 */
$str = new TextService(new TextCalculate());

$data = $str->getResults($text->getText(),$text->getStopWords() , $text->getType());

print "<pre>";print_r($data);die;
