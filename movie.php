<?php
include __DIR__ . '/partials/Models/Movie.php';

if (!isset($_SESSION['userId'])) {
    //https: //www.php.net/manual/en/function.session-destroy.php
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header("location: login.php");
} else {
    // $sql = "SELECT `title`, `cover_image`,`plot` FROM books";
    // echo $sql;
    // $result = $conn->query($sql);
    $fields = ['*'];
    $result = Movie::fetchAll($conn, $fields, 'movies');

    $conn->close();
}

include './partials/template/header.php';
?>

<h1>Movies</h1>
<div class="row">
    <?php
    if ($result && $result->num_rows > 0) {
        // la query è andata a buon fine e ci sono delle righe di risultati
        //$result->fetch_assoc() - fetch_object('Book')
        while ($row = $result->fetch_object('Movie')) {
            ?>
            <div class="col-12 col-sd-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="<?php echo $row->image ?>" class="card-img-top" alt="<?php echo $row->original_title ?>">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row->original_title ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $row->getFlag() ?>
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php }
    } ?>
</div>

<?php
include './partials/template/footer.php';
?>