<?php
include "component/header.php";


$query = "SELECT * FROM categories";
$categories=mysqli_query($connection,$query);



$title= $_SESSION['add-post-data']['title'] ?? null;
$body= $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);
?>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Додати пост</h2>
        <?php if(isset($_SESSION['add-post'])) : ?>
        <div class="alert__message error">
            <p>
                <?=
                $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
            </p>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value ="<?= $title ?>" placeholder="Заголовок">
            <select name="category_id">
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile?>
            </select>
            <?php if(isset($_SESSION["user_is_admin"])) : ?>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" value='1' id="is_featured" checked>
                <label for="is_featured" >Рекомендовано</label>
            </div>
            <?php endif ?>
            <textarea  rows="8" name="body"  placeholder="Опис"><?=$body?></textarea>

            <div class="form__control">
                <label for="thumbnail">Додайте картинку</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Додати</button>
        </form>
    </div>
</section>

<?php
include '../component/footer.php';
?>
