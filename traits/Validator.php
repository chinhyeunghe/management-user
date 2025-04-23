<?php

trait validator
{

    public function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function password($password)
    {
        // Bắt đầu bằng 1 chữ cái viết hoa
        $startsWithUpper = preg_match('/^[A-Z]/', $password);

        if (!$startsWithUpper) {
            return 'First letter in capital';
        }

        // Chứa ít nhất 1 chữ thường
        $hasLowercase = preg_match('/[a-z]/', $password);

        if (!$hasLowercase) {
            return 'Contains at least one lowercase character';
        }

        // Chứa ít nhất 1 ký tự đặc biệt
        $hasSpecialChar = preg_match('/[\W_]/', $password); // \W là ký tự không phải chữ số/chữ cái

        if (!$hasSpecialChar) {
            return 'Contains special characters';
        }

        // Chứa ít nhất 1 số
        $hasDigit = preg_match('/\d/', $password);

        if (!$hasDigit) {
            return 'Contains at least one number';
        }

        return $startsWithUpper && $hasLowercase && $hasSpecialChar && $hasDigit;
    }
}
