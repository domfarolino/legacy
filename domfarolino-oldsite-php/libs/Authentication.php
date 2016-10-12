<?php
	//Create new Authentication Class
	class Auth{
		//Single underscore indicates variable privacy
		private $_siteKey;
		private $_db;

		
		/* Constructor function is passed a single database
		 * dependancy variable to extend the PDO connection
		 * started in db.php without using a singleton or global
		 */
		public function __construct(){
			//Declaring _siteKey and extending the PDO conenction
			//SiteKey is an salt dedicated to the site to manage the salting of hashed information
			// SiteKey definition may be found inside the config.php file
			$this->_db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
			$this->_siteKey = SITE_KEY;

		}//__construct()

		public static function handleLogin(){
			if(!isset($_SESSION['user_id'])){
				header('Location: login/');
				//header('Location: /login/');
				exit;
			}
		}

		public static function handleLoggedIn(){
			if(isset($_SESSION['user_id'])){
				header('Location: index/');
				exit;
			}
		}

		public static function logout(Database $db){
			session_destroy();
			$deletestatement = "DELETE FROM `logged_in_users` WHERE `user_id` = :user_id";
			$deletearray = array(
				":user_id" => $_SESSION['user_id']
			);

			$db->delete($deletestatement, $deletearray);
		}

		/* Random string function generates random strings which
		 * may be appended onto various salts. Caries a $length
		 * variable default length of 50, may be overridden
		 */
		public static function randomString($length = 50){
			//A list of possible characters for the $string to be made form
			$characters = '0123456790abcdefghijklmnopqrstuvwxyz!@#^_';
			$string = '';
			for($p = 0; $p < $length; $p++){
				$string .= $characters[mt_rand(0, strlen($characters)-1)];
			}

			return $string;
		}//randomString()

		/* Hash Data function will be used to hash
		 * data that will be inputed into the database
		 */
		public static function hashData($data){
			return hash_hmac('sha512', $data, SITE_KEY);
		}//hashData()

		/* Is Admin function is currently not implemented but
		 * exists for future purposes to verify whether a logged
		 * in user is of admin status or not
		 */

		public static function setSessionData($row){
			if(session_status() == PHP_SESSION_NONE){
				session_start();
			}

			$token = Auth::randomString();
			$token = $_SERVER['HTTP_USER_AGENT'].$token;
			$token = Auth::hashData($token);
			$_SESSION['user_id']   =  $row['id'];
			$_SESSION['firstname'] =  $row['firstname'];
			$_SESSION['lastname']  =  $row['lastname'];
			$_SESSION['email']     =  $row['email'];
			$_SESSION['username']  =  $row['username'];
			$_SESSION['token'] = $token;

		}

		public static function checkSession(Database $db){

			$selectstatement = "SELECT * FROM logged_in_users WHERE user_id = :user_id";
			$selectarray = array(':user_id' => $_SESSION['user_id']);
			$row = $db->select($selectstatement, $selectarray);
			$row = $row[0];
			//If exists
			if($row){
				//Session validity check
					if(session_id() == $row['session_id'] && $_SESSION['token'] == $row['token']){
						Auth::refreshSession($db);
						return true;
					}
			}
			return false;


		}

		public static function refreshSession(Database $db){
			//Regenerate session id
			session_regenerate_id();

			//Regenerate our token
			$random = Auth::randomString();
			
			//Build the token
			$token = $_SERVER['HTTP_USER_AGENT'].$random;
			$token = Auth::hashData($token);

			//Store in session
			$_SESSION['token'] = $token;

			//Database work to update the SessionID and Token in the DB
			$deletestatement = "DELETE FROM `logged_in_users` WHERE `user_id` = :user_id";
			$deletearray = array(
				":user_id" => $_SESSION['user_id']
			);
			$insertstatement = "INSERT INTO `logged_in_users` (`id`, `user_id`, `session_id`, `token`) VALUES (null, :user_id, :session_id, :token)";
			$insertarray = array(
				":user_id"    => $_SESSION['user_id'],
				":session_id" => session_id(),
				":token"      => $_SESSION['token']
			);

			$db->delete($deletestatement, $deletearray);
			$db->insert($insertstatement, $insertarray);
		}


		
		/*
		public function createUser($firstname, $lastname, $email, $username, $password){

			//Generate User Salt
			$user_salt = $this->randomString();

			//Salt and Hash the password for storing
			$laterpassword = $password;
			$password = $user_salt.$password.$user_salt;
			$password = $this->hashData($password);

			//Create a verification code for email
			$code = $this->randomString();

			
			//Build the SQL & Execute
			$ensure = "SELECT * FROM users WHERE username = :username OR email = :email";
			$ensure = $this->_dbh->prepare($ensure);
			$ensure->execute(array(':username' => $username,
									':email' => $email
			));
			//If a row exists with that user information already, return false and make user try again
			if($ensure->rowCount()){
				echo "false";
				return false;
			}

			//Commit values to database - Prepare the SQL
			$created = "INSERT INTO users (id, firstname, lastname, email, username, password, user_salt, is_verified, is_admin, verification_code) VALUES 
											(null, :firstname, :lastname, :email, :username, :password, :user_salt, :is_verified, :is_admin, :code)";

			$created = $this->_dbh->prepare($created);
			$created->execute(array(':firstname' => $firstname,
									':lastname' => $lastname,
									':email' => $email,
									':username' => $username,
									':password' => $password,
									':user_salt' => $user_salt,
									':is_verified' => '1',
									':is_admin' => '0',
									':code' => $code
									));
			//If user has been inserted
			if($created != false){
				//Immediately log the newly created user in
				//$laterpassword, being the unhashed password for the login() method
				$this->login($username, $laterpassword);
				
				$message = "Thanks for signing up, $firstname.
							Your account has been created with the username, $username,
							and to login to be able to use your account, please click the activation link below:
							http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$code.'
							";
				$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
				mail($email, "Account Verification", $message, $headers); // Send our email
				//Return "true" to the ajax function for front end verification
				echo "true";
				return true;
			}

			return false;
		}//createUser()
		*/

		/* login function requires username and password
		 * as parameter. Hashes the given password and
		 * inserts the user into the database
		 */
		
		/*
		public function login($username, $password){
			
			//Find user with that username in the database
			$sql_1 = ("SELECT * FROM users WHERE username = :username");
			$selection_1 = $this->_dbh->prepare($sql_1);
			$selection_1->execute(array(':username' => $username));
			
			//If the users is found, register the information for testing
			if($selection_1->rowCount()){

			//Fetch data into associative array	
			$row = $selection_1->fetch(PDO::FETCH_ASSOC);


			//Declaring the database user-salt
			$dbsalt = $row['user_salt'];

			//Build the Salted and Hashed Password for checking
			$password = $dbsalt.$password.$dbsalt;
			$password = $this->hashData($password);

			//Extract for comparison, the databse password for the selected user
			$db_password = $row['password'];

			//Convert verified to boolean
			$verified  = (boolean) $row['is_verified'];

			}
					//Restart the user checking - If user exists
					if($selection_1->rowCount()){
							//If user is verified
						if($verified == true){
								//If passwords do match
							if($password == $db_password){

							//Generate random string
							$random = $this->randomString();
							
							//Build the token
							$token = $_SERVER['HTTP_USER_AGENT'].$random;
							$token = $this->hashData($token);

							//Setup Session Variables
							session_start();
							$_SESSION['user_id']   =  $row['id'];
							$_SESSION['firstname'] =  $row['firstname'];
							$_SESSION['lastname']  =  $row['lastname'];
							$_SESSION['email']     =  $row['email'];
							$_SESSION['username']  =  $row['username'];
							
							//SESSION token variable to be inputed into logged_in_users table
							$_SESSION['token'] = $token;

							//Select and delete old logged_in_member records for user
							$sql_2 = ("DELETE FROM logged_in_users WHERE user_id = :user_id");
							$selection_2 = $this->_dbh->prepare($sql_2);
							$selection_2->execute(array(':user_id' => $_SESSION['user_id']));

							//Insert the newly logged in user into the logged_in_users table
							$sql_3 = ("INSERT INTO logged_in_users (id, user_id, session_id, token) VALUES (null, :user_id, :session_id, :token)");
							$selection_3 = $this->_dbh->prepare($sql_3);
							$selection_3->execute(array(':user_id' => $_SESSION['user_id'],
														':session_id' => session_id(),
														':token' => $_SESSION['token']
												  ));

							if($selection_3 != false){
								//Echo Logged In for Ajax Response Text Testing
								echo "Logged In";
								return 0;
							} else {
								//Something went wrong
								echo "Could Not Be Logged In";
							}
									//Echo Password Is Wrong for Ajax Response Text Testing
							} else {echo "Password Is Wrong";}
								//Echo Not Verified for Ajax Response Text Testing
						} else {echo "Not Verified"; }
							//Echo User Not Found for Ajax Response Text Testing
					} else {echo "User Not Found";}
		}//login()
		*/

		/* Check Session function checks the session to make
		 * sure that the user's session is continuous with each
		 * page request or the user must log in again to restart session
		 */
		/*
		public function checkSession(){
			//Selection of user that we're checking
			$sql = "SELECT * FROM logged_in_users WHERE user_id = :user_id";
			$selection = $this->_dbh->prepare($sql);
			$selection->execute(array(':user_id' => $_SESSION['user_id']));

			//If exists
			if($selection->rowCount()){
				//Fetch logged_in_users information into associative array
				$row = $selection->fetch(PDO::FETCH_ASSOC);
				//Session validity check
					if(session_id() == $row['session_id'] && $_SESSION['token'] == $row['token']){
						$this->refreshSession();
						return true;
					}
			}
			return false;
		}//checkSession()
		*/

		/* Refresh Session is called each time
		 * checkSession() is run to ensure the security
		 * of each session
		 */
		/*
		private function refreshSession(){
			//Regenerate session id
			session_regenerate_id();

			//Regenerate our token
			$random = $this->randomString();
			
			//Build the token
			$token = $_SERVER['HTTP_USER_AGENT'].$random;
			$token = $this->hashData($token);

			//Store in session
			$_SESSION['token'] = $token;

			//Database work to update the SessionID and Token in the DB
			$deletesql = "DELETE FROM logged_in_users WHERE user_id = :user_id";
			$deletesql = $this->_dbh->prepare($deletesql);
			$deletesql->execute(array(':user_id' => $_SESSION['user_id']));

			$insertsql = "INSERT INTO logged_in_users (id, user_id, session_id, token) VALUES (null, :user_id, :session_id, :token)";
			$insertsql = $this->_dbh->prepare($insertsql);
			$insertsql->execute(array(':user_id' => $_SESSION['user_id'],
										':session_id' => session_id(),
										':token' => $_SESSION['token']
								  ));


		}//refreshSession()
		*/

		/* Basic logout() function to delete user from
		 * from logged_in_user table and destroy the session
		 */
		/*
		public function logout(){
			$deletesql = "DELETE FROM logged_in_users WHERE user_id = :user_id";
			$deletesql = $this->_dbh->prepare($deletesql);
			$deletesql->execute(array(':user_id' => $_SESSION['user_id']));

			session_destroy();
		}
		*/
	}
?>