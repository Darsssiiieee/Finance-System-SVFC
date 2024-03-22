CREATE DATABASE `svfc_finance` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `svfc_finance`;

CREATE TABLE `users_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_number` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `student_number_UNIQUE` (`student_number`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `student_profile_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_number` varchar(45) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female','Non-Binary','Others') NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `academic_program` enum('Bachelor of Elementary Education','Bachelor of Science in Accountancy','Bachelor of Science in Hotel and Restaurant Management','Bachelor of Science in Information Technology','Bachelor of Secondary Education') NOT NULL,
  `year_level` tinyint(1) NOT NULL,
  `profile_photo` blob,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profille_student_id_idx` (`student_number`),
  CONSTRAINT `fk_profille_student_id` FOREIGN KEY (`student_number`) REFERENCES `users_table` (`student_number`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `payment_method` (
  `payment_method_id` int NOT NULL AUTO_INCREMENT,
  `payment_method_type` varchar(45) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `transaction_history` (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `payment_method_id` int NOT NULL,
  `student_number` varchar(45) NOT NULL,
  `time_of_transaction` datetime NOT NULL,
  `amount` varchar(45) NOT NULL,
  `purpose_of_payment` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `fk_payment_method_id_transaction_idx` (`payment_method_id`),
  KEY `fk_student_number_transaction_history_idx` (`student_number`),
  CONSTRAINT `fk_payment_method_id_transaction` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`payment_method_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_student_number_transaction_history` FOREIGN KEY (`student_number`) REFERENCES `student_profile_table` (`student_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
