<?php

class Output
{
   /*
   * contains the object of TextCalculate class.
   * @var type
   */
  private $text;
  private $validateText;
  private $calculateText;
  private $formatText;
  
  /**
   * Contains and assign the textCalculate and Text class object into class variables.
   * @param TextCalculateInterface $textCalculate
   * @param TextInterface $textServ
   */
  public function __construct(TextInterface $text, ValidateInterface $validate, TextCalculateInterface $textCalculate, FormatInterface $format){    
    $this->text = $text;
    $this->validateText = $validate;
    $this->calculateText = $textCalculate;
    $this->formatText = $format;
  }
  
  /**
   * 
   * @param type $text - contains string 
   * @param array $stopWords - contains words to be removed from the string. 
   * @param type $type - contains the format for content type.
   * @return type - returns the results in the form of json or array.
   */
  public function getOutput(){
    if(!empty($this->validateText->validateText($this->text->getText()))){
      return $this->validateText->validateText($this->text->getText());
    }
    $res = $this->calculateText->calculateText($this->text->getText(), $this->text->getStopWords());   
    return $this->formatText->outputFormat($res,  $this->text->getType(), $this->text->getLang());
  }
}