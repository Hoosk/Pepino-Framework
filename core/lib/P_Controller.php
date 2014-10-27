<?php
class P_Controller{
      var $Command;
      function P_Controller(&$command){
            $this->Command = $command;
      }

      function _default(){

      }
      function showTemplate($templateName,$templateArray){
          $contenido = new P_Template($templateName);
          $contenido->asigna_variables($templateArray);
          $contenido->muestra();
      }
      function _error(){
          
      }
      
      function execute(){
            $functionToCall = $this->Command->getFunction();
            if($this->Command->getFunction() == ''){
                  $functionToCall = 'default';
            }
            if(!is_callable(array(&$this,'_'.$functionToCall))){
                  $functionToCall = 'error';
            }
            call_user_func(array(&$this,'_'.$functionToCall));
      }
      
}
