<?php

interface UserModel
{
    public function Login($name, $password, $user);
    public function SignUp($name, $contact, $email, $password, $user);
    public function verifyPassword($user, $userID, $password);
    public function changePassword($user, $userID, $newPassword);
}
