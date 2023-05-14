<?php
include __DIR__ . '/partials/server/auth.php';

if (isset($_SESSION['userId'])) {
    header("location: index.php");
}

include './partials/template/header.php';
?>
<div class="d-flex">
    <section class="flex-grow-1">
        <h2>Login</h2>
        <form class="p-4" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="loginemail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="loginpassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginpassword" name="loginpassword">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </section>
    <section class="flex-grow-1">
        <h2>Register</h2>
        <form class="p-4" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </section>
</div>

<?php
include './partials/template/footer.php';
?>