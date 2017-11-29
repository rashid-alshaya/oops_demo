<?php

require_once './src/Interfaces/FormatInterface.php';

class Format implements FormatInterface
{
  /**
   * 
   * @param type $res
   * @param type $type
   * @return type
   */
  public function outputFormat($res, $type, $lang) {   
    
    switch (strtoupper($type)){
      case 'JSON':
        $out = $this->getJSONResults($res, $lang);
        break;
      case 'ARR':
        $out = $this->getArrayResults($res, $lang);
        break;
      case 'XML':
        $out = $this->getXMLResults($res, $lang);
        break;
      default :
        return "Please provide the output format.";
    }
    return $out;
  }
  
  /**
   * 
   * @param type $res
   * @return type
   */
  public function getJSONResults($res, $lang){
    return ['language'=>$lang, 'output' => json_encode($res)];
  }
  
  /**
   * 
   * @param type $res
   * @return type
   */
  public function getArrayResults($res, $lang){
    return ['language'=>$lang, 'output' => $res];
  }
  
  /**
   * 
   * @param type $res
   * @return string
   */
  public function getXMLResults($res, $lang){
    return ['language'=>$lang, 'output' => 'XML'];
  }
}