<?php

require_once '../traits/Validator.php';
require_once "../models/UserModel.php";



class UserController {

    // use trait

    use Validator;

    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index() {
        
        $listUsers =  $this->userModel->getAllUsers();
        return view('user/index', ['listUsers' => $listUsers]);
    }

    public function createUser() {

        return view('user/create');
    }

    // handle add new user

    public function addUser() {
     
        if(!empty($_POST)) {

            $errors = [];

            $name     = trim($_POST['name'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            
            if(isset($_FILES['avatar']) && !$_FILES['avatar']['error']) {

                if(is_string(self::avatar($_FILES['avatar']))) {
                    $errors['avatar'] = self::avatar($_FILES['avatar']);
                }
            }

            // check email
            

            if(!empty($email)) {

                if(!self::email($email)) {
                    $errors['email'] = 'Email vừa nhập không hợp lệ';
                }
            }else {
                $errors['email'] = 'Vui lòng nhập địa chỉ email';
            }


            // check name

            if(empty($name)) {
                $errors['name'] = 'Vui lòng nhập tên đăng nhập';
            }

            // checkPass

            if(empty($password)) {
                $errors['password'] = 'Vui lòng nhập mật khẩu tài khoản';
            }else {
                if(is_string(self::password($password))) {
                    $errors['password'] = self::password($password); 
                }                
            }


            if(empty($errors)) {

                // gộp dữ liệu

                if(isset($_FILES['avatar']) && !$_FILES['avatar']['error']) {
                    $uploadDir = "./assets/avatars/";
                    $uploadFile = $uploadDir.time()."_".basename($_FILES['avatar']['name']);
                    
                    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                        $errors['avatar'] = "Lỗi tải lên ảnh! Kiểm tra lại";
                        return view('user/create', ['errors' => $errors]);
                    }
                }

               

                // Lưu trữ cơ sở dữ liệu

                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'anh_dai_dien' => $uploadFile ?? null
                ];
                


                if( $this->userModel->addUser($data)) {
                    $_SESSION['success'] = "Thêm mới người dùng thành công!";
                    header("Location: /devC/Php/user-manager/");
                }else {
                    $errors['insert'] = "Lỗi khi thêm mới người dùng! Kiểm tra lại";
                    return view('user/create', ['errors' => $errors]);
                }

            }else {
                return view('user/create', ['errors' => $errors]);
            }

            

        }
    }

}