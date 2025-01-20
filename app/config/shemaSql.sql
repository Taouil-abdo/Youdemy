DROP DATABASE IF EXISTS youdemy;
CREATE DATABASE youdemy;

USE youdemy;

CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    bio TEXT,
    profile_picture VARCHAR(255),
    role ENUM('Admin', 'Student', 'Teacher') NOT NULL,
    status ENUM('banned', 'accepte', 'pendding') NOT NULL DEFAULT 'pendding'
);

CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    categorie_name TEXT NOT NULL
);

CREATE TABLE tags (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE courses (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    featured_image VARCHAR(255),
    content ENUM('video','document'),
    contentTypeVideo VARCHAR(255) NULL,
    contentTypeDocument TEXT NULL,
    Totalhours INT,
    status ENUM('accepted', 'refuse', 'pendding') NOT NULL DEFAULT 'pendding',
    scheduled_date DATETIME NULL,
    level ENUM('Beginner', 'Intermediate', 'Advanced'),
    price FLOAT,
    category_id BIGINT NOT NULL,
    teacher_id BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (teacher_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE course_tags (
    course_id BIGINT UNSIGNED,
    tag_id BIGINT,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE enrollments (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT NOT NULL,
    course_id BIGINT UNSIGNED NOT NULL,
    enrollment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Active', 'Completed', 'Pending', 'Canceled') DEFAULT 'Active',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE ON UPDATE CASCADE
);



INSERT INTO users (username, email, password, bio, profile_picture, role, status)
VALUES
('admin_user', 'admin@youdemy.com', 'admin123', 'Administrator of the platform', 'admin.jpg', 'Admin', 'accepte'),
('john_doe', 'john.doe@gmail.com', 'password123', 'Student passionate about web development', 'john.jpg', 'Student', 'accepte'),
('jane_smith', 'jane.smith@gmail.com', 'password456', 'Teacher specializing in JavaScript', 'jane.jpg', 'Teacher', 'accepte'),
('sarah_connor', 'sarah.connor@gmail.com', 'password789', 'Enthusiastic student learning PHP', 'sarah.jpg', 'Student', 'pendding'),
('mark_brown', 'mark.brown@gmail.com', 'password321', 'Experienced Python instructor', 'mark.jpg', 'Teacher', 'banned');

INSERT INTO categories (categorie_name)
VALUES
('Web Development'),
('Data Science'),
('Graphic Design'),
('Cybersecurity'),
('Business Management');

INSERT INTO tags (tag_name)
VALUES
('JavaScript'),
('PHP'),
('HTML'),
('Python'),
('CSS');

INSERT INTO courses (title, slug, content, featured_image, Totalhours, status, scheduled_date, level, price, category_id, teacher_id)
VALUES
('JavaScript for Beginners', 'javascript-for-beginners', 'Learn the basics of JavaScript programming.', 'js_course.jpg', 30, 'accepted', '2025-01-20 10:00:00', 'Beginner', 50.00, 1, 3),
('Advanced Python Programming', 'advanced-python', 'Master advanced Python concepts.', 'python_course.jpg', 40, 'accepted', '2025-01-25 15:00:00', 'Advanced', 70.00, 2, 5),
('Introduction to HTML and CSS', 'intro-html-css', 'Get started with web design.', 'html_css_course.jpg', 25, 'accepted', '2025-01-18 09:00:00', 'Beginner', 30.00, 1, 3),
('Cybersecurity Basics', 'cybersecurity-basics', 'Understand the fundamentals of cybersecurity.', 'cyber_course.jpg', 35, 'pendding', '2025-01-30 12:00:00', 'Intermediate', 60.00, 4, 3),
('Business Strategy Essentials', 'business-strategy', 'Learn essential strategies for managing a business.', 'business_course.jpg', 20, 'refuse', NULL, 'Intermediate', 45.00, 5, 3);


INSERT INTO enrollments (user_id, course_id, enrollment_date, status)
VALUES
(2, 1, '2025-01-15 14:30:00', 'Active'),
(4, 2, '2025-01-16 10:00:00', 'Pending'),
(2, 3, '2025-01-17 12:45:00', 'Completed'),
(3, 4, '2025-01-18 09:20:00', 'Canceled'),
(4, 1, '2025-01-19 16:10:00', 'Active');