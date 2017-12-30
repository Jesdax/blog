<?php

## Loader ##

function loadClass($class)
{
    require('model/' . $class . '.php');
}
spl_autoload_register('loadClass');


## Fonctions généraux ##

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
        require ('../views/frontend/home.php');
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
             require ('../views/frontend/postView.php');
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

 function reportComment($id, $postId, $page)
 {
     $commentsManager = new \models\CommentsManager();
     $postsManager = new \models\PostsManager();

     if (!$commentsManager->exists($id)) {
         throw new Exception('Ce commentaire n\'existe pas.');
     } else {
         $affectedLines = $commentsManager->report($id);
         if ($affectedLines === false) {
             throw new Exception('Ce commentaire n\'a pas pu être signalé.');
         } else {
             if (!$postsManager->exists($postId)) {
                 throw new Exception('Cet article n\'existe pas.');
             } else {
                 header('Location: index.php?frontend=post&page='.$page.'&id='.$postId);
             }
         }
     }
 }

 ##  Session ##


function connexion($login, $password)
{
    $usersManager = new \models\UsersManager();

    if (!$usersManager->exists($login)) {
        throw new Exception('Identifiant incorrect.');
    } else {
        $user = $usersManager->get($login);
        if (!password_verify($password, $user->getPassword())) {
            throw new Exception('Mot de passe incorrect.');
        } else {
            $_SESSION['administrateur'] = $user;
            header('Location: index?backend=backOfficeView');
        }
    }
}

function isConnect()
{
    return isset($_SESSION['administrateur']);
}

function logout()
{
    if (!isset($_SESSION['administrateur'])) {
        throw new Exception('Aucune session n\'est en cours.');
    } else {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}

## Partie administrateur ##


function addPost($title, $content)
{
    $postsManager = new \models\PostsManager();
    $affectedLines = $postsManager->addPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article.');
    } else {
        header('Location: index.php?backend=backOfficeView');
    }
}

function editPost($id)
{
    $postsManager = new \models\PostsManager();

    if (!$postsManager->exists($id)) {
        throw new Exception('Cet article n\'existe pas.');
    } else {
        $post = $postsManager->getPost($id);

        /* require la vue backend d'edition d'article */
        require('../views/backend/editPost.php');
    }
}

function updatePost($id, $title, $content)
{
    $postsManager = new \models\PostsManager();

    if (!$postsManager->exists($id)) {
        throw new Exception('Cet article n\'existe pas.');
    } else {
        $affectedLines = $postsManager->update($id, $title, $content);
        if ($affectedLines === false) {
            throw new Exception('Impossible de mettre à jour l\'article');
        } else {
            header('Location: index.php?backend=listPosts');
        }
    }
}

function deletePost($postId)
{
    $postsManager = new \models\PostsManager();

    if (!$postsManager->exists($postId)) {
        throw new Exception('Cet article est perdu dans les lambes d\'internet ou n\'existe pas.');
    } else {
        $commentsManager = new \models\CommentsManager();
        $commentsManager->deletePostComments($postId);
        $affectedLines = $postsManager->delete($postId);
        if ($affectedLines == 0) {
            throw new Exception('Impossible de supprimer l\'article.');
        } else {
            header('Location: index.php?backend=listPosts');
        }
    }
}

function deleteComment($id)
{
    $commentsManager = new \models\CommentsManager();

    if (!$commentsManager->exists($id)) {
        throw new Exception('Ce commentaire n\'existe pas.');
    } else {
        $affectedLines = $commentsManager->delete($id);
        if ($affectedLines == 0) {
            throw new Exception('Impossible de supprimer ce commentaire.');
        } else {
            header('Location: index.php?backend=reported');
        }
    }
}

/* Dashboard administration */

function backendListPosts()
{
    $postsManager = new \models\PostsManager();

    $posts = $postsManager->getPosts();

    /* require la vue backend de la liste des articles */
    require('../views/backend/listPostsView.php');
}

function backOffice()
{
    $commentsManager = new \models\CommentsManager();
    $postsManager = new \models\PostsManager();

    /* require la vue backend du backoffice */
    require('../views/backend/backOfficeView.php');
}

function reported()
{
    $commentsManager = new \models\CommentsManager();

    $comments = $commentsManager->getReported();

    /* require la vue backend des commentaires reportés */
    require('../views/backend/commentsReported.php');
}


