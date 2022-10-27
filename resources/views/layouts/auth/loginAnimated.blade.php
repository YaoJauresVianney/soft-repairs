<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivoire Dépannage Express</title>
    <link rel="stylesheet" href="{{asset('css/loginStyle.css')}}">
</head>
<body>
<div class="box">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form">
            <h2>Connexion</h2>
            <div class="inputBox">
                <input type="email" name="name" required>
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required>
                <span>Mot de passe</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forgot Password</a>
                <a href="#">Signup</a>
            </div>
            <input type="submit" value="Connexion">
        </div>
    </form>
</div>
</body>
</html>
