<?php
$pageTitle = 'View Images';
$pageDesc = 'On this page we will be able to view the images that we have uploaded';

$mysqli = require_once("./database.php");
$database = new Database("localhost", "root", "", "login_db");
$mysqli = $database->getConnection();




 $stmt = $mysqli->prepare('SELECT * FROM user');
$stmt->execute();
$imagelist = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<section class="view-masthead">
  <div>
    <h1>View Images</h1>
  </div>
</section>
<section class="image-row row">
  <?php foreach ($imagelist as $image) { ?>
    <div class="col-sm-12 col-md-3 col-lg-3">
      <img src="<?= $image['image'] ?>" title="<?= $image['name'] ?>" class="img-fluid">
      <p><?= $image["name"] ?></p>
    </div>
  <?php } ?>
</section>
