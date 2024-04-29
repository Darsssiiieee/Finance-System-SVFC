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


-- STORED PROCEDURES

DELIMITER //

CREATE PROCEDURE `insert_student_profile_and_user` (
  IN p_student_number VARCHAR(45),
  IN p_firstname VARCHAR(100),
  IN p_middlename VARCHAR(100),
  IN p_lastname VARCHAR(100),
  IN p_birthdate DATE,
  IN p_gender ENUM('Male', 'Female', 'Non-Binary', 'Others'),
  IN p_email VARCHAR(75),
  IN p_phone VARCHAR(20),
  IN p_academic_program ENUM('Bachelor of Elementary Education', 'Bachelor of Science in Accountancy', 'Bachelor of Science in Hotel and Restaurant Management', 'Bachelor of Science in Information Technology', 'Bachelor of Secondary Education'),
  IN p_year_level TINYINT,
  IN p_profile_photo BLOB,
  IN p_home_address VARCHAR(255),
  IN p_barangay VARCHAR(45),
  IN p_city VARCHAR(45),
  IN p_username VARCHAR(45),
  IN p_password VARCHAR(255),
  IN p_role VARCHAR(25)
)
BEGIN
  DECLARE user_id INT;
  
  -- Insert into users_table
  INSERT INTO users_table (student_number, username, password, role)
  VALUES (p_student_number, p_username, p_password, p_role);
  
  -- Get the last inserted user ID
  SET user_id = LAST_INSERT_ID();
  
  -- Insert into student_profile_table
  INSERT INTO student_profile_table (
    student_number,
    firstname,
    middlename,
    lastname,
    birthdate,
    gender,
    email,
    phone,
    academic_program,
    year_level,
    profile_photo,
    home_address,
    barangay,
    city
  ) VALUES (
    p_student_number,
    p_firstname,
    p_middlename,
    p_lastname,
    p_birthdate,
    p_gender,
    p_email,
    p_phone,
    p_academic_program,
    p_year_level,
    p_profile_photo,
    p_home_address,
    p_barangay,
    p_city
  );
END //

DELIMITER ;


CREATE TABLE `bill_items_table` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `bill_id` int NOT NULL,
  `item_name` enum('internet_connectivity','modules_ebook','portal','e_library','admission_registration','library','student_org','medical_dental','guidance','student_affairs','org_t_shirt','school_uniform_1_set','pe_activity_uniform_1_set','major_uniform_1_set','major_laboratory','insurance','energy_fee','','processing_fee','students_development_programs_activities') NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_bill_id_idx` (`bill_id`),
  CONSTRAINT `fk_bill_id` FOREIGN KEY (`bill_id`) REFERENCES `bills_table` (`bills_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
