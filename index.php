<?php

session_start();

require('controllers/controller.php');

    try {
        if(isset($_POST['connexion'])) {
            if(!empty($_POST['login']) && !empty($_POST['pass'])) {
                $_POST['login'] = htmlspecialchars($_POST['login']);
                $_POST['pass'] = htmlspecialchars($_POST['pass']);
                connexion($_POST['login'], $_POST['pass']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis.');
            }

            /* Route pour créer un compte administrateur */

        } elseif (isset($_POST['create'])) {
            if (!empty($_POST['login']) && !empty($_POST['pass'])) {
                $_POST['login'] = htmlspecialchars($_POST['login']);
                $_POST['pass'] = htmlspecialchars($_POST['pass']);
                createAdmin();
            } else {
                throw new Exception('Une erreur a été détecter dans la saisie des champs.');
            }

            /* Fin de la route pour la création administrateur */

        } elseif (isset($_POST['modify'])) {
            if (!empty($_POST['login']) && !empty($_POST['pass'])) {
                $_POST['login'] = htmlspecialchars($_POST['login']);
                $_POST['pass'] = htmlspecialchars($_POST['pass']);
                changePsw();
            } else {
                throw new Exception('Impossible de mettre à jour les données');
            }

        } elseif(isset($_POST['publish'])) {
            if(!empty($_POST['title']) && !empty($_POST['content'])) {
                $_POST['title'] = htmlspecialchars($_POST['title']);
                $_POST['content'] = htmlspecialchars($_POST['content']);
                addPost($_POST['title'], $_POST['content']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis.');
            }
        } elseif(isset($_POST['search'])) {
            if(!empty($_POST['postSearch'])) {
                $_POST['postSearch'] = htmlspecialchars($_POST['postSearch']);
                $_POST['page'] = (int) $_POST['page'];
                if($_POST['page'] > 0) {
                    post($_POST['postSearch'], $_POST['page']);
                }
            } else {
                throw new Exception('Le champs de recherche est vide.');
            }
        } elseif(isset($_POST['update'])) {
            if(!empty($_POST['title']) && !empty($_POST['content'])) {
                if(isset($_POST['id'])) {
                    $_POST['id'] = (int) $_POST['id'];
                    if($_POST['id'] > 0) {
                        $_POST['title'] = htmlspecialchars($_POST['title']);
                        $_POST['content'] = htmlspecialchars($_POST['content']);
                        updatePost($_POST['id'], $_POST['title'], $_POST['content']);
                    } else {
                        throw new Exception('Cet article n\'existe pas.');
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
            } else {
                throw new Exception('Tous les champs ne sont pas remplis.');
            }
        } elseif(isset($_GET['disconnect'])) {
            logout();
        } elseif(isset($_GET['frontend'])) {
            switch($_GET['frontend']) {
                case 'listPosts':
                    if(isset($_GET['page'])) {
                        $_GET['page'] = (int) $_GET['page'];
                        if($_GET['page'] > 0) {
                            $currentPage = $_GET['page'];
                        } else {
                            $currentPage = 1;
                        }
                        listPosts($currentPage);
                    } else {
                        throw new Exception ('Aucune page n\'a été sélectionné.');
                    }
                    break;

                case 'post':
                    if(isset($_GET['id'], $_GET['page'])) {
                        $_GET['id'] = (int) $_GET['id'];
                        $_GET['page'] = (int) $_GET['page'];
                        if($_GET['id'] > 0 && $_GET['page'] >= 0) {
                            post($_GET['id'], $_GET['page']);
                        } else {
                            throw new Exception('Cet article n\'existe pas.');
                        }
                    } elseif (isset($_GET['id'])) {
                        $_GET['id'] = (int) $_GET['id'];
                        if ($_GET['id'] > 0) {
                            post($_GET['id'],'');
                        }
                    } else {
                        throw new Exception('Aucun article n\'a été sélectionné.');
                    }
                    break;

                case 'formAdminLog':
                    adminLog();
                    break;


                case 'contactForm':
                    contact();
                    break;

                default:
                    throw new Exception('La Page est inconnue');
                    break;
            }
        } elseif(isset($_GET['backend'])) {
            if(isConnect()) {
                switch($_GET['backend']) {
                    case 'backOfficeView':
                        backOffice();
                        break;
                    case 'listPosts':
                        backendListPosts();
                        break;
                    case 'addPost':
                        require('views/backend/editPost.php');
                        break;
                    case 'info':
                        require('views/backend/infoView.php');
                        break;
                    case 'reported':
                        reported();
                        break;
                    case 'editPost':
                        if(isset($_GET['id'])) {
                            $_GET['id'] = (int) $_GET['id'];
                            if($_GET['id'] > 0) {
                                editPost($_GET['id']);
                            } else {
                                throw new Exception('Cet article n\'existe pas.');
                            }
                        } else {
                            throw new Exception('Aucun article n\'a été sélectionné.');
                        }
                        break;

                    default:
                        throw new Exception('La page est inconnue.');
                        break;
                }
            } else {
                require('views/backend/connexion.php');
            }
        } elseif(isset($_GET['action'])) {
            switch($_GET['action']) {
                case 'postComment':
                    if(!empty($_POST['author']) && !empty($_POST['comment'])) {
                        if(isset($_GET['postId'], $_GET['page'])) {
                            $_GET['postId'] = (int) $_GET['postId'];
                            $_GET['page'] = (int) $_GET['page'];
                            $_POST['author'] = htmlspecialchars($_POST['author']);
                            $_POST['comment'] = htmlspecialchars($_POST['comment']);
                            postComment($_GET['postId'], $_POST['author'], $_POST['comment'], $_GET['page']);
                        } else {
                            throw new Exception('Aucun article n\'est sélectionné.');
                        }
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis.');
                    }
                    break;
                case 'report':
                    if(isset($_GET['idComment'], $_GET['idPost'], $_GET['page'])) {
                        $_GET['idComment'] = (int) $_GET['idComment'];
                        $_GET['idPost'] = (int) $_GET['idPost'];
                        $_GET['page'] = (int) $_GET['page'];
                        if($_GET['idComment'] > 0 && $_GET['idPost'] > 0 && $_GET['page'] > 0) {
                            reportComment($_GET['idComment'], $_GET['idPost'], $_GET['page']);
                        } else {
                            throw new Exception('Ce commentaire ou cet article n\'existe pas');
                        }
                    } else {
                        throw new Exception('Aucun commentaire ou article n\'a été sélectionné.');
                    }
                    break;
                case 'auth':
                    if(isset($_GET['id'])) {
                        $_GET['id'] = (int) $_GET['id'];
                        if($_GET['id'] > 0) {
                            auth($_GET['id']);
                        } else {
                            throw new Exception('Ce commentaire n\'existe pas.');
                        }
                    } else {
                        throw new Exception('Aucun commentaire n\'a été sélectionné');
                    }
                    break;

                case 'deleteComment':
                    if(isset($_GET['id'])) {
                        $_GET['id'] = (int) $_GET['id'];
                        if($_GET['id'] > 0) {
                            deleteComment($_GET['id']);
                        } else {
                            throw new Exception('Ce commentaire n\'existe pas.');
                        }
                    } else {
                        throw new Exception('Aucun commentaire n\'a été sélectionné.');
                    }
                    break;
                case 'deletePost':
                    if(isset($_GET['id'])) {
                        $_GET['id'] = (int) $_GET['id'];
                        if($_GET['id'] > 0) {
                            deletePost($_GET['id']);
                        } else {
                            throw new Exception('Ce commentaire n\'existe pas.');
                        }
                    } else {
                        throw new Exception('Aucun commentaire n\'a été sélectionné.');
                    }
                    break;
                case 'sendMessage':
                    sendMail();
                    break;

                default:
                    throw new Exception('L\'action spécifiée n\'existe pas.');
                    break;
            }
        } else {
            $page = 1;
            listPosts($page);
        }
    } catch(Exception $e) {
        $errorMessage = $e->getMessage();
        require('views/errorView.php');
    }