<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to UON!</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="authenticate.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>