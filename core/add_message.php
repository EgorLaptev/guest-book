<?php

$json = [
  'error' => '',
  'message' => ''
];

if(isset($_POST['name']) && !empty(trim($_POST['name']))) $name = trim($_POST['name']);
else $json['error'] = 'Error: name';

if(isset($_POST['content']) && !empty(trim($_POST['content']))) $content = trim($_POST['content']);
else $json['error'] = 'Error: content';

if(empty($json['error'])) {

  require_once 'connect.php';

  $sth = $pdo->prepare("INSERT INTO `messages` (`id`, `author`, `content`, `date`) VALUES (NULL, :author, :content, current_timestamp())");
  $sth->bindParam(':author', $name, PDO::PARAM_STR);
  $sth->bindParam(':content', $content, PDO::PARAM_STR);
  $status = $sth->execute();

  if($status) $json['message'] = 'New message added successfully';
  else $json['error'] = 'Something went wrong';

}

echo json_encode($json, JSON_UNESCAPED_UNICODE);

?>
