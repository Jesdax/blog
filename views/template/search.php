<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="public/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="panel panel-default">
    <div class="panel-heading text-center">
        <legend>Recherche</legend>
    </div>
    <div class="panel-body">
        <form action="index.php" method="post">
            <div class="form-group">
                <input type="text" name="postSearch" class = "form-control" placeholder="Rechercher un article"/>
                <input type="hidden" name="page" value="<?= $currentPage; ?>" />
            </div>
            <input class="btn btn-default pull-right" type="submit" value="Rechercher" name="search" />
        </form>
    </div>
</div>
</body>
</html>