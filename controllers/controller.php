<?php

function listPosts($currentPage)
{
    $postsManager = new \models\PostsManager();
    $totalPosts = $postsManager->count();
    $postPerPage = 4;
    $nbrPage = ceil($totalPosts / $postPerPage);

    if ($currentPage > $nbrPage) {
        throw new Exception('La page demandé n\existe pas.');
    } else {
        $start = ($currentPage - 1) * $postPerPage;

        $posts = $postsManager->pagination($start, $postPerPage);
        /* require la vue de la page home */
    }
 }

 function post($id, $currentPage)
 {
     $postsManager = new \models\PostsManager();
     $commentsManager = new \models\CommentsManager();

     if (!$postsManager->exists($id)) {
         throw new Exception('Cet article n\'existe pas.');
     } else {
         $post = $postsManager->getPost($id);
         if (!isset($post)) {
             throw new Exception('Impossible de charger l\'article.');
         } else {
             $comments = $commentsManager->getComments($id);
             /* Require la vue front de postView */
         }
     }
 }

 function postComment($postId, $author, $comment, $page)
 {
     $commentsManager = new \models\CommentsManager();
     $postsManager = new \models\PostsManager();

     if (!$postsManager->exists($postId)) {
         throw new Exception('Cet article n\'existe pas.');
     } else {
         $affectedLines = $commentsManager->postComment($postId, $author, $comment);
         if ($affectedLines === false) {
             throw new Exception('Ce commentaire n\'a pas pu être publié.');
         } else {
             header('Location: index.php?front=post&page='. $page.'&id='.$postId);
         }
     }
 }