<?php

require_once '../public/template/sidebar.php';
// Nội dung chính của trang
?>

<div class="name_page">
    <h2>User</h2>
</div>
<div style="margin-bottom: 20px; text-align: right; padding-right: 20px; padding-top: 20px; padding-bottom: 20px; color: #2ecc71;">
    <?php
    if (isset($_SESSION['success'])) {
        echo "<div class='success'>";
        echo $_SESSION['success'];
        echo "</div>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<div class='error'>";
        echo $_SESSION['error'];
        echo "</div>";
        unset($_SESSION['error']);
    }
    ?>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>AGE</th>
            <th>ROLE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>

        <?php

        if (count($listUsers) > 0):

            foreach ($listUsers as $k => $user):
        ?>
                <tr>
                    <td><?=$k+1 ?></td>
                    <td><img src="<?=$user['anh_dai_dien']  ?>" style="width: 150px; height: auto; object-fit: contain; border-radius: 10px" alt=""></td>
                    <td><?=$user['name']  ?></td>
                    <td><?=$user['email'] ?></td>
                    <td>...</td>
                    <td>
                        <button class="btn-delete" onclick="show_info_alert(<?=$user['id']?>)"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M200-440v-80h560v80H200Z" />
                            </svg></button>
                        <a href="/devC/Php/user-manager/update/<?=$user['id'] ?>" class="btn-edit"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                            </svg></a>
                    </td>
                </tr>

        <?php
            endforeach;
        endif;
        ?>

    </tbody>
</table>

<?php
// Kết thúc nội dung chính
require_once '../public/template/footer.php';
?>
