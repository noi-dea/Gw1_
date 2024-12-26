<?php
// Google result codecopy for we have only seen env with nodejs
// -----------------------------------------------Step1
// get env file
 $env_file_path = realpath(__DIR__."/.env");
// -----------------------------------------------Step2
    //Check .envenvironment file exists
    if(!is_file($env_file_path)){
        throw new ErrorException("Environment File is Missing.");
    }
    //Check .envenvironment file is readable
    if(!is_readable($env_file_path)){
        throw new ErrorException("Permission Denied for reading the ".($env_file_path).".");
    }
    //Check .envenvironment file is writable
    if(!is_writable($env_file_path)){
        throw new ErrorException("Permission Denied for writing on the ".($env_file_path).".");
    }
// -------------------------------------------------------------------------------------Step3
// place values into array
 $var_arrs = array();
    // Open the .en file using the reading mode
    $fopen = fopen($env_file_path, 'r');
    if($fopen){
        //Loop the lines of the file
        while (($line = fgets($fopen)) !== false){
            // Check if line is a comment
            $line_is_comment = (substr(trim($line),0 , 1) == '#') ? true: false;
            // If line is a comment or empty, then skip
            if($line_is_comment || empty(trim($line)))
                continue;
 
            // Split the line variable and succeeding comment on line if exists
            $line_no_comment = explode("#", $line, 2)[0];
            // Split the variable name and value
            $env_ex = preg_split('/(\s?)\=(\s?)/', $line_no_comment);
            $env_name = trim($env_ex[0]);
            $env_value = isset($env_ex[1]) ? trim($env_ex[1]) : "";
            $var_arrs[$env_name] = $env_value;
        }
        // Close the file
        fclose($fopen);
    }
// ------------------------------------------------------------------------Step4
// Place env values in superglobal $_ENV
foreach($var_arrs as $name => $value){
    $_ENV[$name] = $value;
}

// ------------------------------------------------------------------------Source
// code copied from "https://www.sourcecodester.com/tutorial/php/16035/load-environment-variables-env-file-using-php-tutorial"