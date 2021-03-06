
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Inoyatullokhon">
    <meta name="generator" content="<?= app()->name ?>">
    <title>Signin · <?= app()->name ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link href="/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form method="post" action="/signin" class="form-signin">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">
            <a href="/"><?php echo app()->name ?></a> · Signin</h1>
    </div>
    <?php if(session_has('flash')): ?>
    <div class="alert alert-secondary" role="alert">
        <?= session_take('flash') ?>
    </div>
    <?php endif; ?>
    <div class="form-label-group">
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputUsername">Username</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <div class="mt-4 font-weight-bold">
        <a href="/signup">Sign Up</a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y') ?> - <?= app()->name . ' (' .app()->version.')' ?></p>
</form>
</body>
</html>
