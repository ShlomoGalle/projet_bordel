<html>
<head>
<?php

// sql_autoload_register(function($class){
//     include 'class/' . $class . '.php';
// });

require('class/test.php');

// $merlin = new ElfeDesBois('Elfes des bois', 'Elfes', 'merlin', 180);
// $merlin = new Personnage(202, 200);
// $merlin = new Personnage();

// $merlin->tombe(30);

// var_dump($merlin);

// $merlin->regenere();

// var_dump($merlin);

// $o = new MyHelloWorld();
$flo = new kid();

$test = '18';

$flo->__set('age',$test);

echo $flo -> __get('age');



$flo->__set('age3',$test);

echo $flo->__get('get3');

var_dump($flo);


?>


</head>

<body>




</body>

</html>