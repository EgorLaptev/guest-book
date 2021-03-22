<?php

require_once 'connect.php';

$msgs = $pdo->query("SELECT * FROM `messages`")
            ->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($msgs, JSON_UNESCAPED_UNICODE);

?>
