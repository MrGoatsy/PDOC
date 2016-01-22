<?php
    include'init.php';

    try{
        $handler = new PDOC('localhost', 'goatbb', 'root', '');
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    try{
        echo $handler->queryInsert('messages', 'u_id_sender', ':send', [':send' => '393939393']);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
