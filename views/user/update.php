<?php

require_once '../public/template/sidebar.php';
// Nội dung chính của trang
?>
<h2 class="line-bottom">Update user system</h2>
<div class="form-main">
    <form action="/devC/Php/user-manager/add" enctype="multipart/form-data" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name">
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
            <input type="email" name="email" id="email" placeholder="Enter your email">
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
            <input type="password" name="password" id="password" placeholder="Enter your password">
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

        <button type="submit">Create User</button>

    </form>
</div>
<?php
// Kết thúc nội dung chính
require_once '../public/template/footer.php';
