<?php

require_once '../public/template/sidebar.php';
// Nội dung chính của trang
?>
<h2 class="line-bottom">Update user system</h2>
<div class="form-main">
    <form action="/devC/Php/user-manager/edit/<?= $id ?>" enctype="multipart/form-data" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $user['name'] ?>" placeholder="Enter your name">
            <span class="error-input">
                <?php
                if (isset($errors['name'])) {
                    echo $errors['name'];
                }
                ?>
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $user['email'] ?>" placeholder="Enter your email">
            <span class="error-input">
                <?php
                if (isset($errors['email'])) {
                    echo $errors['email'];
                }
                ?>
            </span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" placeholder="Enter your password">
            <span class="error-input">
                <?php
                if (isset($errors['password'])) {
                    echo $errors['password'];
                }
                ?>
            </span>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png, .gif">
            <div class="avatar_show" style="text-align: center;">
                <img src="/devC/Php/user-manager<?= $user['anh_dai_dien'] ?>" alt="Avatar" class="avatar" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
            </div>
            <span class="error-input">
                <?php
                if (isset($errors['avatar'])) {
                    echo $errors['avatar'];
                }
                ?>
            </span>
        </div>

        <span class="error-input">

            <?php
            if (isset($errors['insert'])) {
                echo $errors['insert'];
            }
            ?>
        </span>

        <button type="submit">Update User</button>

    </form>
</div>
<?php
// Kết thúc nội dung chính
require_once '../public/template/footer.php';
