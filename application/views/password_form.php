<!DOCTYPE html>
<html>
<head>
    <title>Password Hashing</title>
</head>
<body>
    <h2>Hash Password</h2>
    <form action="<?= site_url('login/hashPassword') ?>" method="post">
        <input type="password" name="password" placeholder="Enter Password">
        <button type="submit">Hash Password</button>
    </form>

    <h2>Verify Password</h2>
    <form action="<?= site_url('login/verifyPassword') ?>" method="post">
        <input type="password" name="input_password" placeholder="Enter Password">
        <button type="submit">Verify Password</button>
    </form>
</body>
</html>