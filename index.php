<?php

/**
 * @file
 * contains the TextService class to get the calculated result.
 */

require_once 'src/Classes/Text.php';
require_once 'src/Classes/TextCalculate.php';
require_once 'src/Classes/Validate.php';
require_once 'src/Classes/Format.php';
require_once 'src/Classes/Output.php';


/**
 * contains the result as response in the form of array, json or xml.
 * @var output
 */
$output = new Output(new Text('Lorem ipsum dolor aa aa sit amet ex bb his altera aa latine bb', array('Lorem','his','latine'),'arr','en'), new Validate(), new TextCalculate, new Format());

$result = $output->getOutput();

print "<pre>"; print_r($result);die;