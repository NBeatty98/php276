CREATE TABLE contacts (
 con_id int NOT NULL AUTO_INCREMENT,
 con_name char(50) NOT NULL,
 con_address char(50) NOT NULL,
 con_city char(50) NOT NULL,
 con_state char(50) NULL,
 con_phone char(50) NOT NULL,
 con_email char(50) NOT NULL,
 con_dob char(50) NOT NULL,
 con_contacts char(100) NULL,
 con_age char(255) NULL,
 PRIMARY KEY (con_id)
) ENGINE = InnoDB;