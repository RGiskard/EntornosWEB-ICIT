<?php
    // Configure valid username
    function sanitizeFormUsername($inputText) {
	    $inputText = strip_tags($inputText);
	    $inputText = str_replace(" ", "", $inputText);
	    return $inputText;
    }

    // Configure valid general strings
    function sanitizeFormString($inputText) {
	    $inputText = strip_tags($inputText);
	    $inputText = str_replace(" ", "", $inputText);
	    $inputText = ucfirst(strtolower($inputText));
	    return $inputText;
    }

    // Configure valid password
    function sanitizeFormPassword($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }

    // Action when signup button is clicked
    if(isset($_POST['registerButton'])) {
        // Sanitize registration information
        $username = sanitizeFormUsername($_POST['username']);
	    $firstName = sanitizeFormString($_POST['firstName']);
	    $lastName = sanitizeFormString($_POST['lastName']);
	    $email = sanitizeFormString($_POST['email']);
	    $email2 = sanitizeFormString($_POST['email2']);
	    $password = sanitizeFormPassword($_POST['password']);
	    $password2 = sanitizeFormPassword($_POST['password2']);
        
        // If registration successful, route to `index.php`
        $isRegistrationSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);
        if($isRegistrationSuccessful == true) {
            $_SESSION['userLoggedIn'] = $username;
		    header("Location: index.php");
	    }
    }
?>