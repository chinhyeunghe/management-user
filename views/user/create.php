<?php

require_once '../public/template/sidebar.php';
// Nội dung chính của trang
?>
<h2 class="line-bottom">Add new user system</h2>
<div class="form-main">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png, .gif">
        </div>
        <button type="submit">Create User</button>

    </form>
</div>
<?php
// Kết thúc nội dung chính
require_once '../public/template/footer.php';
