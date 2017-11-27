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
   * contains the object of text class.
   * @var type
   */
  private $text;
  
  /**
   * Contains and assign the textCalculate and Text class object into class variables.
   * @param TextCalculateInterface $textCalculate
   * @param TextInterface $textServ
   */
  public function __construct(TextCalculateInterface $textCalculate, TextInterface $textServ){    
    $this->textCalculateService = $textCalculate;
    $this->text = $textServ;
  }
  
  /**
   * 
   * @param type $text - contains string 
   * @param array $stopWords - contains words to be removed from the string. 
   * @param type $type - contains the format for content type.
   * @return type - returns the results in the form of json or array.
   */
  public function getResults($text, array $stopWords, $type){
    $this->text->setType($type);
    $this->text->setText($text);
    $this->text->setStopWords($stopWords);
    
    return $this->textCalculateService->calculateText($this->text->getText(), $this->text->getStopWords(), $this->text->getType());   
  }
}

/**
 * contains the object of TextService class.
 * @var str
 */
$str = new TextService(new TextCalculate(), new Text());

$data = $str->getResults('Lorem ipsum dolor aa sit amet, ex bb his altera aa latine bb', array('Lorem','his','latine'), 'arr');

print "<pre>";print_r($data);die;
