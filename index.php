<?php
    include'init.php';

    $handler = new PDOExtended('localhost', 'goatbb', 'root', '');

    $handler->queryInsert('messages', 'u_id_sender, u_id_recipient', ':idSend, :idRecipient', [':idSend' => 1, ':idRecipient' => 5]);
?>
