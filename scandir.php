<?php
  $local_dir = $argv[1];

  function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  } 

  function clean_scandir($dir){
    return array_values(array_diff(scandir($dir), array('.','..')));
  }

  function clean_readdir($dir) {
    $files = array();
    if ($handle = opendir($dir)) {
      while(false !== ($file = readdir($handle))){
        if ($file != '.' && $file != '..') {
          $files[]=$file;
        }
      }
      closedir($handle);
    }
    return $files;
  }
  
  function dirToArray($dir) {
  
   $result = array();

   $cdir = scandir($dir);
   foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[] = $value;
         }
      }
   }
  
   return $result;
} 

  pre_r(clean_scandir($local_dir));
  pre_r(clean_readdir($local_dir));
  pre_r(dirToArray($local_dir));
  
 ?>
