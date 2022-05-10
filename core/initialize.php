<?php

    defined('DS')? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT')? null : define('SITE_ROOT',DS .'Applications' .DS.'MAMP' .DS. 'htdocs'.DS.'phpRest');
    defined('INC_PATH')? null : define('INC_PATH',SITE_ROOT.DS.'includes');
    defined('CORE_PATH')? null : define('CORE_PATH',SITE_ROOT.DS.'core');



    //load the config file
    require_once(INC_PATH.DS."config.php");
    //core classes
    require_once(CORE_PATH.DS."PlantParameters.php");
    require_once(CORE_PATH.DS."Plants.php");
    require_once(CORE_PATH.DS."Pots.php");
    require_once(CORE_PATH.DS."Readings.php");
    require_once(CORE_PATH.DS."Users.php");
    ?>
