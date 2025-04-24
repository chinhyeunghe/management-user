<?php

trait Validator
{

    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function password($password)
    {
        // Bắt đầu bằng 1 chữ cái viết hoa
        $startsWithUpper = preg_match('/^[A-Z]/', $password);

        if (!$startsWithUpper) {
            return 'Bắt đầu bằng 1 chữ cái viết hoa';
        }

        // Chứa ít nhất 1 chữ thường
        $hasLowercase = preg_match('/[a-z]/', $password);

        if (!$hasLowercase) {
            return 'Chứa ít nhất 1 chữ thường';
        }

        // Chứa ít nhất 1 ký tự đặc biệt
        $hasSpecialChar = preg_match('/[\W_]/', $password); // \W là ký tự không phải chữ số/chữ cái

        if (!$hasSpecialChar) {
            return 'Chứa ít nhất 1 ký tự đặc biệt';
        }

        // Chứa ít nhất 1 số
        $hasDigit = preg_match('/\d/', $password);

        if (!$hasDigit) {
            return 'Chứa ít nhất 1 số';
        }

        return $startsWithUpper && $hasLowercase && $hasSpecialChar && $hasDigit;
    }

    public static function avatar($file)
    {
        if ($file['error']) {
            return 'Lỗi tải lên ảnh';
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            return 'Ảnh không quá 2MB';
        }

        $allowType = ['image/jpg', 'image/png', 'image/jpeg', 'image/gif'];

        if (!in_array($file['type'], $allowType)) {
            return "Ảnh phải có định dạng: 'image/jpg', 'image/png', 'image/jpeg', 'image/gif'";
        }

        return true;
    }
}
