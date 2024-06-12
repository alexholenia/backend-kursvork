<?php
include "component/header.php";
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");

    session_destroy();
}
$title = $_SESSION["add-category-data"]['title'] ?? null;
$description = $_SESSION["add-category-data"]['description'] ?? null;

unset($_SESSION['add-category-data'])
?>

<section class="form__section">

    <div class="container form__section-container">
        <h2>Додати категорію</h2>
        <?php if(isset($_SESSION['add-category'])): ?>
        <div class="alert__message error">
            <p><?=$_SESSION['add-category'];
            unset($_SESSION['add-category']);
            ?></p>
        </div>
        <?php endif?>
        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
            <input type="text" name="title"        value = "<?=$title?>"placeholder="Заголовок">
            <textarea  rows="4" name="description" value = "<?=$description?>"placeholder="Коментар"></textarea>

            <button type="submit" name="submit" class="btn">Додати</button>
        </form>
    </div>


    

</section>

<?php
include "../component/footer.php";
?>
