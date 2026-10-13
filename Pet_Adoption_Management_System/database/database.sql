CREATE DATABASE IF NOT EXISTS pet_adoption;
USE pet_adoption;

CREATE TABLE IF NOT EXISTS pets (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 type VARCHAR(50) NOT NULL,
 breed VARCHAR(100) NOT NULL,
 age INT NOT NULL,
 gender VARCHAR(20) NOT NULL,
 description TEXT,
 status VARCHAR(30) DEFAULT 'Available'
);

CREATE TABLE IF NOT EXISTS adoptions (
 id INT AUTO_INCREMENT PRIMARY KEY,
 pet_id INT NOT NULL,
 applicant_name VARCHAR(100) NOT NULL,
 email VARCHAR(150) NOT NULL,
 phone VARCHAR(30) NOT NULL,
 address TEXT NOT NULL,
 reason TEXT,
 status VARCHAR(30) DEFAULT 'Pending',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE
);

INSERT INTO pets (name,type,breed,age,gender,description,status) VALUES
('Tommy','Dog','Labrador',2,'Male','Friendly and active dog looking for a loving family.','Available'),
('Bruno','Dog','Golden Retriever',3,'Male','Calm, playful and family-friendly.','Available'),
('Mimi','Cat','Persian',2,'Female','Quiet and affectionate indoor cat.','Available'),
('Luna','Cat','Domestic Short Hair',1,'Female','Playful young cat who enjoys attention.','Available');
