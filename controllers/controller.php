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
