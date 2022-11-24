DROP DATABASE IF EXISTS school_manager;

CREATE DATABASE school_manager DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_lithuanian_ci;

DROP USER IF EXISTS  'school_manager_user'@'localhost';

CREATE USER 'school_manager_user'@'localhost' IDENTIFIED BY 'school_manager';

GRANT ALL PRIVILEGES ON school_manager.* TO 'school_manager_user'@'localhost';