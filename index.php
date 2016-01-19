<?php
    include'init.php';

    $handler = new PDOC('localhost', 'goatbb', 'root', '');

    echo $handler->queryDelete('messages', 'm_id = 1');
?>
