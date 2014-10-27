<?php
class P_URLInterpreter{
      var $Command;

      function P_URLInterpreter(){
            $requestURI = explode('/', $_SERVER['REQUEST_URI']);
            $scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
            $commandArray = array_diff_assoc($requestURI,$scriptName);
            $commandArray = array_values($commandArray);
            $controllerName = $commandArray[0]; 
           
            if (isset($commandArray[1]) && $commandArray[1] != null) {
                $controllerFunction = $commandArray[1];
                $parameters = array_slice($commandArray,2);
            }else{
                $controllerFunction = null;
                $parameters = null;
            }   
            

            // Check if the url is the root.
            // if it is then set the command to the root controller.
            // and _default function.
            if($controllerName == ''){
                  $controllerName = 'root';
            }
            $this->Command = new P_Command($controllerName,$controllerFunction,$parameters);         
      }

      function getCommand(){
            return $this->Command;
      }
}
