<?php
include "component/header.php";
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");

    session_destroy();
}

$query = "SELECT * FROM categories ORDER BY title";
$categories=mysqli_query($connection,$query)

?>


    <section class="dashboard">
    <?php if(isset($_SESSION['add-category-success'])) : ?>  
            <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
            
            </div>
    <?php
        elseif(isset($_SESSION['add-category'])): ?> 
            <div class="alert__message error container">
            <p>
                <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>
            
            </div>
            <?php endif?>
    <?php if(isset($_SESSION['edit-category-success'])) : ?>  
            <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
            
            </div>
    <?php
        elseif(isset($_SESSION['edit-category'])): ?> 
            <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </p>
            
            </div>
            <?php endif?>
        <div class="container dashboard__container">
    
            <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
    
            <aside>
                <ul>
                    <li>
                        <a href="<?= ROOT_URL ?>admin/add-post.php">
                            <i class="uil uil-pen"></i>
                            <h5>Додати пост</h5>
                        </a>
                    </li>                
                        
                    <li>
                        <a href="<?= ROOT_URL ?>admin/index.php">
                        <i class="uil uil-postcard"></i>                            
                        <h5>Змінити пост</h5>
                        </a>
                    </li>
                    <?php  if(isset($_SESSION['user_is_admin'])) : ?>
                    <li>
                        <a href="<?= ROOT_URL ?>admin/add-user.php">
                            <i class="uil uil-user-plus"></i> 
                            <h5>Додати юзера</h5>
                        </a>
                    </li>  
    
                    <li>
                        <a href="<?= ROOT_URL ?>admin/manage-users.php">
                            <i class="uil uil-users-alt"></i>
                            <h5>Змінити юзера</h5>
                        </a>
                    </li>                    
                    <li>
                        <a href="<?= ROOT_URL ?>admin/add-category.php">
                            <i class="uil uil-edit"></i>
                            <h5>Додати категорію</h5>
                        </a>
                    </li>                    
                    <li>
                        <a href="<?= ROOT_URL ?>admin/manage-categories.php" class="active">
                            <i class="uil uil-list-ul"></i>
                            <h5>Змінити категорію</h5>
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Змінити категорію</h2>
                <?php if(mysqli_num_rows($categories)>0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Змінити</th>
                            <th>Видалити</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($category=mysqli_fetch_assoc($categories)) : ?>
                        <tr>
                            <td><?=$category['title']?></td>
                            <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?=$category['id']?>" class="btn sm">Змінити</a></td>
                            <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?=$category['id']?>" class="btn sm danger">Видалити</a></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                <?php else : ?>
                    <div class="alert__message error">
                            Категорію не знайдено
                    </div>
                <?php endif?>
                </table>
            </main>
        </div>
    </section>
    
    


<?php
include "../component/footer.php";
?>