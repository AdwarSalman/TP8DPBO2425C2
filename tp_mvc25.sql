-- 1️⃣ Buat database
CREATE DATABASE tp_mvc25;
USE tp_mvc25;

-- 2️⃣ Tabel dosen (lecturers)
CREATE TABLE lecturers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  nidn VARCHAR(20) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  join_date DATE NOT NULL
);

-- 3️⃣ Tabel mata kuliah (courses)
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_name VARCHAR(100) NOT NULL,
  course_code VARCHAR(20) NOT NULL,
  lecturer_id INT,
  FOREIGN KEY (lecturer_id) REFERENCES lecturers(id)
);

-- 4️⃣ Tabel mahasiswa (students)
CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  nim VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  course_id INT,
  FOREIGN KEY (course_id) REFERENCES courses(id)
);

-- 5️⃣ Tambahkan beberapa data awal
INSERT INTO lecturers (name, nidn, phone, join_date) VALUES
('Dr. Budi Santoso', '12345', '081234567890', '2022-07-10'),
('Prof. Sari Widodo', '67890', '081298765432', '2021-05-15');

INSERT INTO courses (course_name, course_code, lecturer_id) VALUES
('Pemrograman Web', 'IF101', 1),
('Basis Data', 'IF102', 1),
('Struktur Data', 'IF201', 2);

INSERT INTO students (name, nim, email, course_id) VALUES
('Andi Pratama', '240001', 'andi@univ.ac.id', 1),
('Bella Kartika', '240002', 'bella@univ.ac.id', 1),
('Citra Wulandari', '240003', 'citra@univ.ac.id', 2),
('Dedi Saputra', '240004', 'dedi@univ.ac.id', 3);
