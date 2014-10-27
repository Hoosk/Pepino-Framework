<!DOCTYPE html>
<html>
 <?php
 function microtime_float(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
 
 $time_start = microtime_float();
 
 


 //clases indispensables para que funcione la aplicacion (P_Framework)
    require_once    'core/Core.php';
    require_once    'core/lib/P_Command.php';
    //require_once('core/lib/P_URLInterpreter.php');
    require_once    'core/lib/P_CommandDispatcher.php';
    require_once    'core/lib/P_Controller.php';
    require_once    'core/lib/P_Template.php';
    
    
//iniciamos el modelo:
    
    require_once    'model/P_Database.php';
    
    

    
//iniciamos la aplicacion, pero antes nuestras clases

    
    $registry = Core::singleton();
    $registry->storeObject('P_URLInterpreter','P_URLInterpreter');
    $command = $registry->getObject('P_URLInterpreter')->getCommand();
    $commandDispatcher = new P_CommandDispatcher($command);
    global $commandResult;
    $commandDispatcher->Dispatch();
    

    var_dump($command); 
    $time_stop = microtime_float();    
    echo $time_stop - $time_start;
    echo "  ".$_SERVER['REQUEST_URI']." ";
    echo $registry->getFrameworkName();
    exit();
    ?>  
    
</html>
