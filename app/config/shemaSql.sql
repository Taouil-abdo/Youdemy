
DROP DATABASE IF EXISTS youdemy_db;
CREATE DATABASE youdemy_db;

USE youdemy_db;


CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    bio TEXT,
    profile_picture VARCHAR(255),
    role ENUM('Admin', 'Student', 'Teacher') NOT NULL,
    status ENUM('banned' ,'accepte','pendding') NOT NULL 

) ;
-- Create categories table
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    categorie_name TEXT NOT NULL
) ;

-- Create tags table
CREATE TABLE tags (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(255) NOT NULL UNIQUE
) ;
CREATE TABLE courses(
 id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    featured_image VARCHAR(255),
    Totalhours INT,
    status ENUM('accepted', 'refuse', 'pendding') NOT NULL DEFAULT 'pendding',
    scheduled_date DATETIME NULL,
    level ENUM('Beginner', 'Intermediate', 'Advanced'),
    price FLOAT,
    category_id BIGINT NOT NULL,
    enseignant_id BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (enseignant_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ;
CREATE TABLE course_tags (
    course_id BIGINT UNSIGNED,
    tag_id BIGINT,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE ON UPDATE CASCADE
) ;
CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    enrollment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Active', 'Completed', 'Pending', 'Canceled') DEFAULT 'Active',
    completion_date DATETIME NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE ,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE ON UPDATE CASCADE
);

