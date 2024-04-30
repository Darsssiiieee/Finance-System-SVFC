CREATE DATABASE `svfc_finance` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `svfc_finance`;

CREATE TABLE `admin_announcement` (
  `announcement_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `admin_number` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`announcement_id`),
  KEY `fk_admin_id_idx` (`admin_number`),
  CONSTRAINT `fk_admin_number_announcement` FOREIGN KEY (`admin_number`) REFERENCES `users_table` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `admin_profile_table` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_number` varchar(45) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female','Non-Binary','Others') NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `barangay` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `fk_admin_number_idx` (`admin_number`),
  CONSTRAINT `fk_admin_number` FOREIGN KEY (`admin_number`) REFERENCES `users_table` (`user_number`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `announcement_read_status` (
  `user_number` varchar(45) NOT NULL,
  `announcement_id` int NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `read_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_number`,`announcement_id`),
  KEY `fk_user_number_idx` (`user_number`),
  KEY `fk_announcement_id_idx` (`announcement_id`),
  CONSTRAINT `fk_announcement_id_status` FOREIGN KEY (`announcement_id`) REFERENCES `admin_announcement` (`announcement_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_number_status` FOREIGN KEY (`user_number`) REFERENCES `users_table` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `bill_items_table` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `bill_id` int NOT NULL,
  `item_name` enum('internet_connectivity','modules_ebook','portal','e_library','admission_registration','library','student_org','medical_dental','guidance','student_affairs','org_t_shirt','school_uniform_1_set','pe_activity_uniform_1_set','major_uniform_1_set','major_laboratory','insurance','energy_fee','','processing_fee','students_development_programs_activities','misc') NOT NULL,
  `amount` int NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_bill_id_idx` (`bill_id`),
  CONSTRAINT `fk_bill_id` FOREIGN KEY (`bill_id`) REFERENCES `bills_table` (`bills_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `bills_table` (
  `bills_id` int NOT NULL AUTO_INCREMENT,
  `student_number` varchar(45) NOT NULL,
  `semester` enum('1st year 1st sem','1st year 2nd sem','2nd year 1st sem','2nd year 2nd sem','3rd year 1st sem','3rd year 2nd sem','4th year 1st sem','4th year 2nd sem','5th year 1st sem','5th year 2nd sem') NOT NULL,
  `bill_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` int NOT NULL,
  PRIMARY KEY (`bills_id`),
  KEY `fk_student_number_idx` (`student_number`),
  KEY `fk_student_number_bills_idx` (`student_number`),
  CONSTRAINT `fk_student_number_bills` FOREIGN KEY (`student_number`) REFERENCES `users_table` (`user_number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `conversations_table` (
  `conversation_id` int NOT NULL AUTO_INCREMENT,
  `student_number` varchar(45) NOT NULL,
  `admin_number` varchar(45) NOT NULL,
  PRIMARY KEY (`conversation_id`),
  KEY `fk_student_id_conversations_table_idx` (`student_number`),
  KEY `fk_admin_number_conversations_table_idx` (`admin_number`),
  CONSTRAINT `fk_admin_number_conversations_table` FOREIGN KEY (`admin_number`) REFERENCES `users_table` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_student_number_conversations_table` FOREIGN KEY (`student_number`) REFERENCES `users_table` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `feedbacks_table` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `student_number` varchar(45) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `fk_student_number_idx` (`student_number`),
  CONSTRAINT `fk_student_number` FOREIGN KEY (`student_number`) REFERENCES `student_profile_table` (`student_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `login_attempts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_number` varchar(45) DEFAULT NULL,
  `attempts` int DEFAULT '0',
  `last_attempt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_number` (`user_number`),
  CONSTRAINT `login_attempts_ibfk_1` FOREIGN KEY (`user_number`) REFERENCES `users_table` (`user_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `messages_table` (
  `messages_id` int NOT NULL AUTO_INCREMENT,
  `conversation_id` int NOT NULL,
  `sender_number` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`messages_id`),
  KEY `fk_conversation_id_idx` (`conversation_id`),
  KEY `fk_sender_number_idx` (`sender_number`),
  CONSTRAINT `fk_conversation_id` FOREIGN KEY (`conversation_id`) REFERENCES `conversations_table` (`conversation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sender_number` FOREIGN KEY (`sender_number`) REFERENCES `users_table` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `payment_method` (
  `payment_method_id` int NOT NULL AUTO_INCREMENT,
  `payment_method_type` varchar(45) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `payments_table` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `bill_id` int NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_method_id` int NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk_payment_method_id_idx` (`payment_method_id`),
  KEY `fk_bill_id_payments_idx` (`bill_id`),
  CONSTRAINT `fk_bill_id_payments` FOREIGN KEY (`bill_id`) REFERENCES `bills_table` (`bills_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_payment_method_id` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`payment_method_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `student_profile_table` (
  `student_id` int NOT NULL AUTO_INCREMENT,
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
  `profile_photo` enum('avatar_1.png','avatar_2.png','avatar_3.png','avatar_4.png','avatar_5.png','avatar_6.png','avatar_7.png','avatar_8.png','avatar_9.png','avatar_10.png','avatar_11.png','avatar_12.png') DEFAULT NULL,
  `home_address` varchar(255) NOT NULL,
  `barangay` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `fk_profille_student_id_idx` (`student_number`),
  CONSTRAINT `fk_profille_student_id` FOREIGN KEY (`student_number`) REFERENCES `users_table` (`user_number`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

CREATE TABLE `users_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_number` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `student_number_UNIQUE` (`user_number`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_admin_profile`(
    IN admin_number_param VARCHAR(45),
    IN first_name_param VARCHAR(100),
    IN middle_name_param VARCHAR(100),
    IN last_name_param VARCHAR(100),
    IN email_param VARCHAR(75),
    IN phone_number_param VARCHAR(45),
    IN birthdate_param DATE,
    IN gender_param ENUM('Male','Female','Non-Binary','Others'),
    IN home_address_param VARCHAR(255),
    IN barangay_param VARCHAR(45),
    IN city_param VARCHAR(45),
    IN username_param VARCHAR(45),
    IN password_param VARCHAR(255),
    IN role_param VARCHAR(25)
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        RESIGNAL;
    END;

    START TRANSACTION;

    INSERT INTO users_table (user_number, username, password, role)
    VALUES (admin_number_param, username_param, password_param, role_param);

    INSERT INTO admin_profile_table (admin_number, first_name, middle_name, last_name, email, phone_number, birthdate, gender, home_address, barangay, city)
    VALUES (admin_number_param, first_name_param, middle_name_param, last_name_param, email_param, phone_number_param, birthdate_param, gender_param, home_address_param, barangay_param, city_param);

    COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_student_profile`(
    IN p_student_number VARCHAR(45),
    IN p_firstname VARCHAR(100),
    IN p_middlename VARCHAR(100),
    IN p_lastname VARCHAR(100),
    IN p_birthdate DATE,
    IN p_gender ENUM('Male','Female','Non-Binary','Others'),
    IN p_email VARCHAR(75),
    IN p_phone VARCHAR(20),
    IN p_academic_program ENUM('Bachelor of Elementary Education','Bachelor of Science in Accountancy','Bachelor of Science in Hotel and Restaurant Management','Bachelor of Science in Information Technology','Bachelor of Secondary Education'),
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
    DECLARE v_user_id INT;
    
    -- Insert into users_table
    INSERT INTO users_table (user_number, username, password, role)
    VALUES (p_student_number, p_username, p_password, p_role);
    
    -- Get the last inserted user ID
    SET v_user_id = LAST_INSERT_ID();
    
    -- Insert into student_profile_table
    INSERT INTO student_profile_table (student_number, firstname, middlename, lastname, birthdate, gender, email, phone, academic_program, year_level, profile_photo, home_address, barangay, city)
    VALUES (p_student_number, p_firstname, p_middlename, p_lastname, p_birthdate, p_gender, p_email, p_phone, p_academic_program, p_year_level, p_profile_photo, p_home_address, p_barangay, p_city);
    
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fetch_user_info`(IN user_number VARCHAR(45), IN account_type VARCHAR(10))
BEGIN
    DECLARE admin_count INT;
    DECLARE student_count INT;

    -- Check if the account_type is 'admin' or 'student'
    IF account_type = 'Admin' THEN
        -- Fetch information from admin_profile_table
        SELECT *
        FROM admin_profile_table
        WHERE admin_number = user_number;
        
        -- Check if the record exists for admin
        SELECT COUNT(*)
        INTO admin_count
        FROM admin_profile_table
        WHERE admin_number = user_number;
        
        -- If no admin record found, output a message
        IF admin_count = 0 THEN
            SELECT 'No admin profile found for the provided admin_number' AS Message;
        END IF;

    ELSEIF account_type = 'Student' THEN
        -- Fetch information from student_profile_table
        SELECT *
        FROM student_profile_table
        WHERE student_number = user_number;
        
        -- Check if the record exists for student
        SELECT COUNT(*)
        INTO student_count
        FROM student_profile_table
        WHERE student_number = user_number;
        
        -- If no student record found, output a message
        IF student_count = 0 THEN
            SELECT 'No student profile found for the provided student_number' AS Message;
        END IF;

    ELSE
        -- Invalid account_type provided
        SELECT 'Invalid account type. Please provide either "admin" or "student".' AS Message;
    END IF;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_feedbacks`()
BEGIN
    -- Check if the current user is an admin (you may have an authentication mechanism for this)
    -- For demonstration purposes, assuming this is already handled

    -- Select all feedbacks from the feedback table
    SELECT f.feedback_id, f.student_id, u.username AS student_username, f.content
    FROM feedback f
    JOIN users_table u ON f.student_id = u.id
    ORDER BY f.feedback_id DESC; -- Order by feedback_id (or any other preferred ordering)

    -- Assuming you want to return the feedbacks to the caller (could be application or another procedure)
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_recent_transactions`()
BEGIN
    -- Temporary table to hold the recent transactions with student names
    CREATE TEMPORARY TABLE temp_recent_transactions (
        `student_name` VARCHAR(255),
        `amount` VARCHAR(45),
        `date_of_transaction` DATETIME
    );
    
    -- Insert recent transactions into the temporary table
    INSERT INTO temp_recent_transactions (`student_name`, `amount`, `date_of_transaction`)
    SELECT CONCAT(s.firstname, ' ', s.lastname) AS student_name,
           th.amount AS amount,
           th.time_of_transaction AS date_of_transaction
    FROM transaction_history th
    JOIN student_profile_table s ON th.student_number = s.student_number
    ORDER BY th.time_of_transaction DESC
    LIMIT 5;
    
    -- Select the required data from the temporary table
    SELECT `student_name`, `amount`, `date_of_transaction`
    FROM temp_recent_transactions;
    
    -- Drop the temporary table after use
    DROP TEMPORARY TABLE IF EXISTS temp_recent_transactions;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_student_by_program`(
    IN programName VARCHAR(100),
    OUT studentCount INT
)
BEGIN
    DECLARE programId INT;

    -- Check if programName is 'all' to retrieve all profiles
    IF programName = 'all' THEN
        -- Count all student profiles
        SELECT COUNT(*)
        INTO studentCount
        FROM student_profile_table;
    ELSE
        -- Count student profiles based on the academic program
        SELECT COUNT(*)
        INTO studentCount
        FROM student_profile_table
        WHERE academic_program = programName;
    END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_student_profiles`()
BEGIN
    -- Declare variables
    DECLARE user_role VARCHAR(255);

    -- Set user role to filter by
    SET user_role = 'Student';

    -- Select data from users_table and student_profile_table
    SELECT u.*, spt.*
    FROM users_table u
    JOIN student_profile_table spt ON u.user_number = spt.student_number
    WHERE u.role = user_role;  -- Filter by user role

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_feedback`(
    IN p_student_number INT,
    IN p_content TEXT
)
BEGIN
    DECLARE v_user_exists INT;

    -- Check if the student_id exists in the users_table
    SELECT COUNT(*) INTO v_user_exists
    FROM student_profile_table
    WHERE student_number = p_student_number;

    -- If user exists, proceed with the insert
    IF v_user_exists > 0 THEN
        INSERT INTO feedback (student_number, content)
        VALUES (p_student_number, p_content);
        
        SELECT 'Feedback inserted successfully.' AS message;
    ELSE
        -- User does not exist, cannot insert feedback
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid student_id. User does not exist.';
    END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_student_profile_and_user`(
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
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_user`(
    IN p_user_number VARCHAR(45),
    IN p_password VARCHAR(255),
    IN p_role VARCHAR(25),
    OUT p_result VARCHAR(50),
    OUT p_user_number_out VARCHAR(45),
    OUT p_role_out VARCHAR(25)
)
BEGIN
    DECLARE v_count INT;
    
    -- Check if user credentials match
    SELECT COUNT(*) INTO v_count
    FROM users_table
    WHERE user_number = p_user_number
      AND password = p_password
      AND role = p_role;
    
    -- If credentials are valid, set output parameters and return success message
    IF v_count > 0 THEN
        SET p_result = 'Login successful';
        SET p_user_number_out = p_user_number;
        SET p_role_out = p_role;
    ELSE
        SET p_result = 'Invalid credentials';
        SET p_user_number_out = NULL;
        SET p_role_out = NULL;
    END IF;
    
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `record_payment`(
    IN bill_id_param INT,
    IN amount_paid_param INT,
    IN payment_method_id_param INT
)
BEGIN
    -- Check if amount_paid_param is greater than zero
    IF amount_paid_param <= 0 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Invalid amount. Amount paid must be greater than zero.';
    ELSE
        -- Insert payment record into payments_table
        INSERT INTO payments_table (bill_id, amount, payment_method_id)
        VALUES (bill_id_param, amount_paid_param, payment_method_id_param);
        
        -- Update amount_paid in bills_table
        UPDATE bills_table
        SET total_amount = total_amount - amount_paid_param
        WHERE bills_id = bill_id_param;
    END IF;
    
END$$
DELIMITER ;
