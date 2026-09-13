<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body style="padding: 50px;">
    <h2>Form Login</h2>
    
    <?php if (isset($_SESSION['flash'])): ?>
        <p style="color: red;"><?= $_SESSION['flash']; ?></p>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <form action="/S1-Akademik/public/login" method="POST">
        <label>Username (isi: admin):</label><br>
        <input type="text" name="username"><br><br>
        <label>Password (isi: admin231):</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>