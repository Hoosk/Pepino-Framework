<?php
class P_CommandDispatcher{
      var $Command;

      function P_CommandDispatcher(&$command){
            $this->Command = $command;
      }

      function isController($controllerName){
            if(file_exists('controller/'.$controllerName.'/controller.'.$controllerName.'.php')){
                  return true;
            }else{
                  return false;
            }
      }


      function Dispatch(){
            $controllerName = $this->Command->getControllerName();

            if($this->isController($controllerName) == false){
                  $controllerName = 'root';
                  }
            require_once('controller/'.$controllerName.'/controller.'.$controllerName.'.php');
            $controllerClass = $controllerName."Controller";
            $controller = new $controllerClass($this->Command);            
            $controller->execute();
      }
 }
