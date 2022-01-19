<?php
    class Constants {
        // Username errors
        public static $usernameInvalidLength = "Error: Username must have 6-30 characters";
        public static $usernameExisted = "Error: Username already exsits";
    
        // First/last name errors
        public static $firstNameInvalidLength = "Error: First name must have 2-30 characters";
        public static $lastNameInvalidLength = "Error: Last name must have 2-30 characters"; 
        
        // Email errors
        public static $emailDoNotMatch = "Error: Emails do not match";
        public static $emailInvalid = "Error: Invalid email";
        public static $emailRegistered = "Error: Email has already been registered";
        
        // Password errors
        public static $passwordDoNotMatch = "Error: Passwords do not match";
        public static $passwordInvalid = "Error: Password must contain only letters and numbers";
        public static $passwordInvalidLength = "Error: Password must have 8-30 characters";
        
        // Login Failed
        public static $loginFailed = "Error: Login Failed. Username or password is invalid";
    }
?>