<?php  

require "config.php";

  $total_files = count($_FILES['load']['name']);

  for($key = 0; $key < $total_files; $key++) {

if ( isset($_FILES['load']['name'][$key])) {
$filename = basename($_FILES['load']['name'][$key]);
$filepath ='files/'.$filename;
if (move_uploaded_file($_FILES['load']['tmp_name'][$key], $filepath)) {
        $contentfull = file_get_contents($filepath);
        $content = json_decode($contentfull);
        unlink($filepath);

$text = strpos($contentfull, 'title');
if ($text == NULL) {
 foreach ($content as $obj) {
        $stmt = $pdo->prepare('insert into comments(postId, name, email, body) values(:postId, :name, :email, :body)');
        $stmt->bindValue('postId', $obj->postId);
        $stmt->bindValue('name', $obj->name);
        $stmt->bindValue('email', $obj->email);
        $stmt->bindValue('body', $obj->body);
        $stmt->execute();

        $comment = $comment + $stmt->rowCount();
      }
} else {
 foreach ($content as $obj) {
        $stt = $pdo->prepare('insert into posts(userId, title, body) values(:userId, :title, :body)');
        $stt->bindValue('userId', $obj->userId);
        $stt->bindValue('title', $obj->title);
        $stt->bindValue('body', $obj->body);
        $stt->execute();

        $post = $post + $stt->rowCount();
      }
}
    }
  }
}
  if ($post != NULL or $comment != NULL) {
  if ($post == NULL) {
    $post = 0;
  }
  if ($comment == NULL) {
    $comment = 0;
  }
  $_SESSION['bruh'] = "Загружено $post записей и $comment комментариев"."<br>";

  header('Location: /');
}
?>