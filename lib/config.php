<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoCarrreras/lib/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
   $cfg->set_model_directory('/path/to/your/model_directory');
   $cfg->set_connections(
     array(
       'development' => 'mysql://root:@localhost/db_carreras',
       'test' => 'mysql://root:@localhost/db_carreras',
       'production' => 'mysql://root:@localhost/db_carreras'
     )
   );
});
