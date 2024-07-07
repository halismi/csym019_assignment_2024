CREATE DATABASE university_courses;

USE university_courses;

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    level VARCHAR(50) NOT NULL,
    duration VARCHAR(50) NOT NULL,
    overview TEXT,
    highlights TEXT,
    course_details TEXT,
    entry_requirements TEXT,
    fees_and_funding_GBP DECIMAL(10, 2),
    fees_and_funding_EUR DECIMAL(10, 2),
    fees_and_funding_USD DECIMAL(10, 2),
    funding_available BOOLEAN,
    accreditation VARCHAR(255),
    student_perks TEXT,
    faqs TEXT,
    image_url VARCHAR(255)
);