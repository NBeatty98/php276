CREATE TABLE admin (
 ad_id int NOT NULL AUTO_INCREMENT,
 ad_name char(50) NOT NULL,
 ad_email char(50) NOT NULL,
 ad_password char(255) NOT NULL,
 ad_status char(100) NULL,
 PRIMARY KEY (ad_id)
) ENGINE = InnoDB;