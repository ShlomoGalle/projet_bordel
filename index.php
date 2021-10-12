<html>
<head>
<?php

// sql_autoload_register(function($class){
//     include 'class/' . $class . '.php';
// });

require('class/test.php');

$merlin = new Personnage('merlin', 180);
// $merlin = new Personnage(202, 200);
// $merlin = new Personnage();

$merlin->tombe();

var_dump($merlin);

$merlin->regenere();

var_dump($merlin);


?>


</head>

<body>




</body>

</html>