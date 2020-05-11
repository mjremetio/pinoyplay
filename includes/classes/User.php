<?php
	
	class User {

		private $con;
		private $email;

		public function __construct($con, $email) {
			$this->con = $con;
			$this->email = $email;
		}

		public function getUsername() {
			return $this->email;
		}

		public function getEmail() {
			$query = mysqli_query($this->con, "SELECT email FROM users WHERE email='$this->email'");
			$row = mysqli_fetch_array($query);
			return $row['email'];
		}

		public function getQuote() {
			$query = mysqli_query($this->con, "SELECT quote FROM users WHERE email='$this->email'");
			$row = mysqli_fetch_array($query);
			return $row['quote'];
		}

		public function getFirstAndLastName() {
			$query = mysqli_query($this->con, "SELECT concat(firstName, ' ', lastName) as 'name' FROM users WHERE email='$this->email'");
			$row = mysqli_fetch_array($query);
			return $row['name'];
		}

			public function getFirstName() {
			$query = mysqli_query($this->con, "SELECT firstName as 'name' FROM users WHERE email='$this->email'");
			$row = mysqli_fetch_array($query);
			return $row['name'];
		}


		//new function created to get the profile pic LONGBLOB file in DB-borre
		public function getProfilePic() {
			$query = mysqli_query($this->con, "SELECT image FROM users WHERE email='$this->email'");
			$row = mysqli_fetch_array($query);
			return $row['image'];
		}
	}

?>