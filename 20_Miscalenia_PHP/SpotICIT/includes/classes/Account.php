<?php
    class Account {
		private $con;
		private $errorArray;

		// Class constructor
		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		// Log user in
		public function login($un, $pw) {
			$encryptedPw = md5($pw);
			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$encryptedPw'");
			if(mysqli_num_rows($query) == 1) {
				return true;
			} else {
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}
		}

		// Register user info to the database
		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true) {
				// Store user info to database
				return $this->insertUserInfo($un, $fn, $ln, $em, $pw);
			} else {
				return false;
			}
		}

		// Retrieve error message (if any)
		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		// Check if the user registration info is stored on database successfully
		private function insertUserInfo($un, $fn, $ln, $em, $pw) {
			$encryptedPw = md5($pw);
			$profilePic = "assets/images/profile_pics/me.jpeg";
			$date = date("Y-m-d");
			$result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
			return $result;
		}

        // Validate username
        private function validateUsername($un) {
			// Case 1: Validate username's length 6-30 characters
			if(strlen($un) > 30 || strlen($un) < 6) {
				array_push($this->errorArray, Constants::$usernameInvalidLength);
				return;
			}
			// Case 2: Check if username already exists
			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
			if(mysqli_num_rows($checkUsernameQuery) != 0) {
				array_push($this->errorArray, Constants::$usernameExisted);
				return;
			}
		}

        // Validate first name
        private function validateFirstName($fn) {
			if(strlen($fn) > 30 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameInvalidLength);
				return;
			}
		}

        // Validate last name
        private function validateLastName($ln) {
			if(strlen($ln) > 30 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameInvalidLength);
				return;
			}
		}

        // Validate emails
        private function validateEmails($em, $em2) {
            // Case 1: Two emails do not match
            if($em != $em2) {
				array_push($this->errorArray, Constants::$emailDoNotMatch);
				return;
			}
            // Case 2: Check if email is in the correct format
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}
            // Case 3: Check if email has already been registered
			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailRegistered);
				return;
			}
        }

        // Validate passwords
        private function validatePasswords($pw, $pw2) {
            // Case 1: Passwords must match
            if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordDoNotMatch);
				return;
			}
            // Case 2: Password includes invalid characters
            if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordInvalid);
				return;
			}
            // Case 3: Password must have 8-30 characters
            if(strlen($pw) > 30 || strlen($pw) < 8) {
				array_push($this->errorArray, Constants::$passwordInvalidLength);
				return;
			}
        }
    }
?>