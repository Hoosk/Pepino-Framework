<?php
class rootController extends P_Controller{
    
        function _default(){
            $contenido = new P_Template("main");           
            $contenido->muestra(); 
        }        

}
