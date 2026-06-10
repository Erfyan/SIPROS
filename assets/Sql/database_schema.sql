-- SIPROS Database Setup & Fixes
-- This file documents database structure and corrections made

-- ===== TABLE STRUCTURE =====

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Files table (FIXED: renamed path_file to file_path for consistency)
CREATE TABLE IF NOT EXISTS files (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    fase VARCHAR(50) NOT NULL,
    nama_file VARCHAR(150) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Notes table
CREATE TABLE IF NOT EXISTS notes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    fase VARCHAR(50),
    isi_catatan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Progress table
CREATE TABLE IF NOT EXISTS progress (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    fase VARCHAR(50) NOT NULL,
    status ENUM('belum','proses','selesai') DEFAULT 'belum',
    persentase INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contacts table
CREATE TABLE IF NOT EXISTS contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pesan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('terkirim','gagal') DEFAULT 'terkirim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ===== FIXES APPLIED =====
-- 1. Renamed files.path_file → files.file_path (to match controller code)
--    ALTER TABLE files CHANGE COLUMN path_file file_path VARCHAR(255) NOT NULL;

-- ===== NOTES =====
-- - All timestamps use UTC by default
-- - Foreign keys use ON DELETE CASCADE for data integrity
-- - Email field in users table is UNIQUE to prevent duplicate registrations
-- - File uploads path: uploads/skripsi/ (must exist and be writable)
