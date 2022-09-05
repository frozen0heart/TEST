<?php
require "config.php";

if( isset($_POST['find']) )
  {
    $search = $_POST['search'];

    $search = trim($search); 
    $search = htmlspecialchars($search);

        if (strlen($search) < 3) {
            echo '<p>Слишком короткий поисковый запрос.</p>';
        } else { 
            $query=$pdo->query("SELECT COUNT(*) as count FROM comments WHERE `body` LIKE '%$search%'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $row=$query->fetch();
            $count = $row['count'];

                $text = '<p>По запросу <b>'.$search.'</b> найдено совпадений: '.$count.'</p>';
                if ($count == NULL or $count == 0) {
                $text = '<p>По вашему запросу ничего не найдено.</p>'; } 
                echo $text."<br>";

            $c = $pdo->prepare("SELECT DISTINCT `postId` FROM `comments` WHERE `body` LIKE '%$search%' ORDER BY `postId` ASC");
            $c->execute();
            while ($comments = $c->fetch(PDO::FETCH_OBJ)) {
                $commentId = $comments->postId;
              
                $p = $pdo->prepare("SELECT `title` FROM `posts` WHERE `id` = $commentId");
                $p->execute();
                $posts = $p->fetch(PDO::FETCH_OBJ);
                $post = $posts->title;
                
                ?><h1 style="text-align: left; font-size: 20px"><?php echo "#".$commentId." ".$post; ?></h1><?php


                $f = $pdo->prepare("SELECT `postId`, `body`, `email` FROM `comments` WHERE `body` LIKE '%$search%' AND `postId` = $commentId");
                $f->execute();
                while ($comments = $f->fetch(PDO::FETCH_OBJ)) {
                $comment = $comments->body;
               
                
                $email = $comments->email;

                $comment = preg_replace('#'.$search.'#ius', '<b style="color: red">'.$search.'</b>', $comment);

                $color = rand(1, 3);
                if ($color == 1) {
                    $color='#007bff';
                } if ($color == 2) {
                    $color='#e83e8c';
                } if ($color == 3) { 
                    $color='#6f42c1'; 
                }


?>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"><rect width="100%" height="100%" fill="<?php echo $color; ?>"></rect></svg>
      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark"><ya-tr-span>@<?php echo $email; ?></ya-tr-span></strong><ya-tr-span><?php echo $comment; ?></ya-tr-span></p>
    </div>
<?php
            }
        }
    }
}
?>