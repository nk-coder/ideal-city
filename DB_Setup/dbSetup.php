<?php
	include_once '../db_config/config.php';

	//SQL to drop database;
	$sqlToDropDB = "DROP DATABASE IF EXISTS ideal_city;";
	if ($con->query($sqlToDropDB) === TRUE) {
		echo "Database droped successfully<br>";
	} else {
		echo "Error: " . $sqlToDropDB . "<br>" . $con->error. "<br>";
	}
	//exit();

	//SQL to create database;
	$sqlToCreateDB = "CREATE DATABASE ideal_city;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "Database created successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}
	
	$sqlToUseDB = "USE ideal_city;";
	if ($con->query($sqlToUseDB) === TRUE) {
		echo "Database selected successfully<br>";
	} else {
		echo "Error: " . $sqlToUseDB . "<br>" . $con->error. "<br>";
	}

	//SQL to create table admin
	$admin_sql = "CREATE TABLE admins (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(35) NOT NULL,
	  `phone` varchar(16) NOT NULL,
	  `email` varchar(100) NOT NULL,
	  `username` varchar(50) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `added_by` varchar(30) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($admin_sql) === TRUE) {
		echo "admin table created successfully<br>";
	} else {
		echo "Error: " . $admin_sql . "<br>" . $con->error. "<br>";
	}

	//inser admin
	$insertsql = "INSERT INTO `ideal_city`.`admins`(`name`,`phone`,`email`,`username`,`password`, `added_by`) VALUES ('Admin','01822221111', 'admin@daffodil.ac','admin','e10adc3949ba59abbe56e057f20f883e','System');";

	if ($con->query($insertsql) === TRUE) {
		echo "Admin created successfully<br>
		<b>email:admin@daffodil.ac<br>password:123456</b><br>";
	} else {
		echo "Error: " . $insertsql . "<br>" . $con->error. "<br>";
	}

	//SQL to create table users
	$user_sql = "CREATE TABLE users (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(35) NOT NULL,
	  `username` varchar(50) NOT NULL,
	  `email` varchar(100) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `phone` varchar(16) NOT NULL,
	  `NID_NO` varchar(30) NOT NULL,
	  `image` varchar(200) NOT NULL,
	  `area` varchar(200) NOT NULL,
      `activation` varchar(4) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($user_sql) === TRUE) {
		echo "users table created successfully<br>";
	} else {
		echo "Error: " . $user_sql . "<br>" . $con->error. "<br>";
	}

	//SQL for create areas table
	$area_sql = "CREATE TABLE areas (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($area_sql) === TRUE) {
		echo "area table created successfully<br>";
	} else {
		echo "Error: " . $area_sql . "<br>" . $con->error. "<br>";
	}

	//SQL for create current_status table
	$status_sql = "CREATE TABLE current_status (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `status` varchar(30) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($status_sql) === TRUE) {
		echo "current_status table created successfully<br>";
	} else {
		echo "Error: " . $status_sql . "<br>" . $con->error. "<br>";
	}


	//SQL for create posts table
	$posts_sql = "CREATE TABLE post (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `email` varchar(70) NOT NULL,
	  `phone` varchar(16) NOT NULL,
	  `address` varchar(100) NOT NULL,
	  `area` varchar(50) NOT NULL,
	  `problem_title` varchar(200) NOT NULL,
	  `details` text NOT NULL,
	  `image` varchar(200) NOT NULL,
	  `date_time` varchar(30) NOT NULL,
	  `current_status_of_work` varchar(255) NOT NULL,
	  `user_id` int(11) NOT NULL,
	  `approved` varchar(4) NOT NULL,
	  `approver` varchar(4) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($posts_sql) === TRUE) {
		echo "post table created successfully<br>";
	} else {
		echo "Error: " . $posts_sql . "<br>" . $con->error. "<br>";
	}

	//SQL for create comment table
	$comment_sql = "CREATE TABLE comments (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `date_time` varchar(50) NOT NULL,
	  `email` varchar(70) NOT NULL,
	  `comment` text NOT NULL,
	  `approved` varchar(3) NOT NULL,
	  `approver` varchar(30) NOT NULL,
	  `post_id` int(11) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($comment_sql) === TRUE) {
		echo "commenta table created successfully<br>";
	} else {
		echo "Error: " . $comment_sql . "<br>" . $con->error. "<br>";
	}
	
?>