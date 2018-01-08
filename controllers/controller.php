<?php

## Loader ##

function loadClass($class)
{
    require('models/'.$class.'.php');
}
spl_autoload_register('loadClass');


## Fonctions généraux ##

/*
 *  Système de pagination liste des articles de la page d'accueil
 * @param page courante
 */
function listPosts($currentPage)
{
    $postsManager = new PostManager();
    $totalPosts = $postsManager->count();
    $postPerPage = 2;
    $nbrPage = ceil($totalPosts / $postPerPage);

    if ($currentPage > $nbrPage) {
        throw new Exception('La page demandé n\'existe pas.');
    } else {
        $start = ($currentPage - 1) * $postPerPage;

        $posts = $postsManager->pagination($start, $postPerPage);

        /* require la vue de la page home */
        require ('views/frontend/home.php');
    }
 }

 /*
  * Affichage de l'article
  *
  */
 function post($id, $currentPage)
 {
     $postsManager = new PostManager();
     $commentsManager = new CommentManager();

     if (!$postsManager->exists($id)) {
         throw new Exception('Cet article n\'existe pas.');
     } else {
         $post = $postsManager->getPost($id);
         if (!isset($post)) {
             throw new Exception('Impossible de charger l\'article.');
         } else {

             $comments = $commentsManager->getComments($id);

             /* Require la vue front de postView */
             require ('views/frontend/postView.php');
         }
     }
 }

 /*
  * Publication de commentaire dans l'article
  */
 function postComment($postId, $author, $comment, $page)
 {
     $commentsManager = new CommentManager();
     $postsManager = new PostManager();

     if (!$postsManager->exists($postId)) {
         throw new Exception('Cet article n\'existe pas.');
     } else {
         $affectedLines = $commentsManager->postComment($postId, $author, $comment);
         if ($affectedLines === false) {
             throw new Exception('Ce commentaire n\'a pas pu être publié.');
         } else {
             header('Location: index.php?frontend=post&page='. $page.'&id='.$postId);
         }
     }
 }

 /*
  * Signaler un commentaire
  */
 function reportComment($id, $postId, $page)
 {
     $commentsManager = new CommentManager();
     $postsManager = new PostManager();

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

 /*
  * Affichage de la page de formulaire pour créer un compte admin
  */
 function adminLog()
 {
     require('views/frontend/formAdminLog.php');
 }


 ##  Session ##

/*
 * Connexion
 */
function connexion($login, $password)
{
    $usersManager = new UserManager();

    if (!$usersManager->exists($login)) {
        throw new Exception('Identifiant incorrect.');
    } else {
        $user = $usersManager->get($login);
        if (!password_verify($password, $user->getPassword())) {
          //  echo '<pre>'; var_dump($password ,$user->getPassword());
            throw new Exception('Mot de passe incorrect.');
        } else {
            $_SESSION['administrateur'] = $user;
            header('Location: index.php?backend=backOfficeView');
        }
    }
}

/*
 * Créer un admin
 */
function createAdmin()
{
    if ($_POST) {
        $login = $_POST['login'];
        $password = $_POST['pass'];

        $array = ['login' => $login, 'password' => $password];
        $admin = new User($array);
        $usersManager = new UserManager();
        $result = $usersManager->add($admin);

        if ($result) {
            header('Location: index.php?backend=connexion');
        } else {
            throw new Exception('Echec de la création de compte admin');
        }
    } else {
        throw new Exception('Méthode ou paramètre invalide');
    }

}

function changePsw()
{
    if ($_POST) {
        $login = $_POST['login'];
        $password = $_POST['pass'];

        $array = ['login' => $login, 'password' => $password];
        $admin = new User($array);
        $usersManager = new UserManager();
        $result = $usersManager->update($admin);

        if ($result) {
            header('Location: index.php?backend=backOfficeView');
        } else {
            throw new Exception('Echec de la modification du compte');
        }
    } else {
        throw new Exception('Méthode ou paramètre invalide');
    }
}


/*
 * Si l'admin est connecté
 */
function isConnect()
{
    return isset($_SESSION['administrateur']);
}

/*
 * Pour se déconnecter
 */
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

/*
 * Ajouter un article
 */
function addPost($title, $content)
{
    $postsManager = new PostManager();
    $affectedLines = $postsManager->addPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article.');
    } else {
        header('Location: index.php?backend=backOfficeView');
    }
}

/*
 * Editer un article
 */
function editPost($id)
{
    $postsManager = new PostManager();

    if (!$postsManager->exists($id)) {
        throw new Exception('Cet article n\'existe pas.');
    } else {
        $post = $postsManager->getPost($id);

        /* require la vue backend d'edition d'article */
        require('views/backend/editPost.php');
    }
}

/*
 * Mettre à jour un article
 */
function updatePost($id, $title, $content)
{
    $postsManager = new PostManager();

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

/*
 * Supprimer un article et les commentaires associés
 */
function deletePost($postId)
{
    $postsManager = new PostManager();

    if (!$postsManager->exists($postId)) {
        throw new Exception('Cet article est perdu dans les lambes d\'internet ou n\'existe pas.');
    } else {
        $commentsManager = new CommentManager();
        $commentsManager->deletePostComments($postId);
        $affectedLines = $postsManager->delete($postId);
        if ($affectedLines == 0) {
            throw new Exception('Impossible de supprimer l\'article.');
        } else {
            header('Location: index.php?backend=listPosts');
        }
    }
}

/*
 * Supprimer un commentaire
 */
function deleteComment($id)
{
    $commentsManager = new CommentManager();

    if (!$commentsManager->exists($id)) {
        throw new Exception('Ce commentaire n\'existe pas.');
    } else {
        $affectedLines = $commentsManager->delete($id);
        if ($affectedLines == 0) {
            throw new Exception('Impossible de supprimer ce commentaire.');
        } else {
            header('Location: index.php?backend=backOfficeView');
        }
    }
}

/*
 * Valider un commentaire
 */
function auth($id)
{
    $commentsManager = new CommentManager();

    if(!$commentsManager->exists($id)) {
        throw new Exception('Ce commentaire n\'existe pas.');
    } else {
        $affectedLines = $commentsManager->auth($id);
        if($affectedLines === false) {
            throw new Exception('Ce commentaire n\'a pas pu être autorisé.');
        } else {
            header('Location: index.php?backend=reported');
        }
    }
}


/* Dashboard administration */

/*
 * Liste de tous les articles en backend
 */
function backendListPosts()
{
    $postsManager = new PostManager();

    $posts = $postsManager->getPosts();

    /* require la vue backend de la liste des articles */
    require('views/backend/listPostsView.php');
}

/*
 * Dashbord admin
 */
function backOffice()
{
    $commentsManager = new CommentManager(); // requis pour afficher le compteur de commentaire et signalements
    $postsManager = new PostManager();  // requis pour afficher le compteur d'article

    /* require la vue backend du backoffice */
    require('views/backend/backOfficeView.php');
}

/*
 * Voir les commentaires signalés
 */
function reported()
{
    $commentsManager = new CommentManager();

    $comments = $commentsManager->getReported();

    /* require la vue backend des commentaires reportés */
    require('views/backend/commentsReported.php');
}

/* Contact */

/*
 * Formulaire de contact
 */
function contact()
{
    require('views/frontend/contact.php');
}

/*
 * Envoie de mail contact
 */
function sendMail()
{

    $contact = new Mailer();

    $contact->sendMail();
    require('views/template/header.php');
    require('views/template/scriptBody.php');


}



