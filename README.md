
# Tugas Praktikum 9 DPBO – Sistem Akademik (MVC Pattern)

Tugas ini merupakan bagian dari **Tugas Praktikum 9** mata kuliah **Desain Pemrograman Berorientasi Objek (DPBO)**.  
Pada praktikum ini, saya mengembangkan **Sistem Informasi Akademik sederhana** berbasis **PHP** dengan menggunakan arsitektur **MVC (Model-View-Controller)**.

---

## ✍️ Janji

Saya **[Nama Kamu]** dengan NIM **[NIM Kamu]** mengerjakan Tugas Praktikum 9 dalam Mata Kuliah **Desain Pemrograman Berorientasi Objek (DPBO)**.  
Untuk keberkahan-Nya, maka saya **tidak melakukan kecurangan** seperti yang telah dispesifikasikan.  
**Aamiin.**

---

## 🧠 Desain Program

Program ini dibangun dengan menerapkan **pattern MVC**, yang memisahkan antara:

- **Model** → menangani logika dan koneksi database  
- **View** → bertanggung jawab terhadap tampilan antarmuka pengguna  
- **Controller** → mengatur alur data antara model dan view

Aplikasi ini terdiri dari **tiga entitas utama**:

1. **Lecturers (Dosen)**  
   Menyimpan data dosen seperti nama, NIDN, nomor telepon, dan tanggal bergabung.

2. **Courses (Mata Kuliah)**  
   Menyimpan data mata kuliah yang diajar oleh dosen tertentu (relasi 1-N dengan Lecturer).

3. **Students (Mahasiswa)**  
   Menyimpan data mahasiswa yang mengikuti mata kuliah tertentu (relasi 1-N dengan Course).

---

## 🗂️ Struktur Folder

- tp_mvc25/project/
  - index.php → Entry point aplikasi (router utama)
  - config/
    - database.php → File konfigurasi dan koneksi database (PDO)
  - app/
    - controllers/
      - LecturerController.php
      - CourseController.php
      - StudentController.php
    - models/
      - Lecturer.php
      - Course.php
      - Student.php
    - views/
      - lecturer/
        - index.php
        - create.php
        - edit.php
      - course/
        - index.php
        - create.php
        - edit.php
      - student/
        - index.php
        - create.php
        - edit.php
  - public/
    - css/ → Bootstrap CSS (opsional)
    - js/ → File JS (opsional)
  - tp_mvc25.sql → File database untuk import ke phpMyAdmin

---

## ⚙️ Fitur Utama

✅ CRUD **Lecturers (Dosen)**  
✅ CRUD **Courses (Mata Kuliah)**  
✅ CRUD **Students (Mahasiswa)**  
✅ Relasi antar tabel:
- 1 Dosen → banyak Mata Kuliah  
- 1 Mata Kuliah → banyak Mahasiswa  
✅ Navigasi antar halaman (Lecturer, Course, Student)  
✅ Tampilan berbasis **Bootstrap** agar responsif dan rapi  

---

## 🧭 Alur Program

### Routing (`index.php`)
Menentukan controller dan action berdasarkan parameter URL:  
index.php?controller=lecturer&action=index

### Controller
- Menerima request dari router  
- Menghubungi model untuk akses data  
- Memanggil view untuk menampilkan hasil

Contoh:
```php
public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->model->create($_POST);
        header("Location: index.php?controller=lecturer&action=index");
    }
    include "app/views/lecturer/create.php";
}
```


### Model
- Menyediakan fungsi CRUD (Create, Read, Update, Delete)
- Menggunakan PDO untuk koneksi database yang aman dan efisien

### View
- Bertugas merender tampilan HTML

- Mengambil data dari controller dan menampilkannya dengan Bootstrap

### 🏠 Halaman Utama
- Halaman utama menampilkan daftar dosen (lecturer/index.php) dengan tombol navigasi menuju:

- Halaman daftar Lecturers

- Halaman daftar Courses

- Halaman daftar Students

## Dokumentasi
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/7ea4e7d3-bb7a-4872-89b3-00a3f33c4e8a" />
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/953775dd-e304-49e9-8de1-4c74257e4e2c" />
<img width="1920" height="1020" alt="Screenshot 2025-11-12 031409" src="https://github.com/user-attachments/assets/c13f1171-3560-4954-a370-6a92de75921a" />
<img width="1920" height="1020" alt="Screenshot 2025-11-12 031427" src="https://github.com/user-attachments/assets/b24e2489-6a2b-4d1a-bb51-a1a3c9df9270" />
<img width="1920" height="1020" alt="Screenshot 2025-11-12 031443" src="https://github.com/user-attachments/assets/ac4fa524-6a55-433c-808b-f387f9250b87" />
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/e512b529-58e0-4829-aaae-fa0bfd6beaaa" />
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/ea926fa8-ae5a-4173-8ded-e696ca93ceb9" />
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/0a2ac4e9-ff75-4ef1-aafc-bdb3d7d3cd02" />
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/4734d4a8-78cf-4058-b8c1-c38ccba9857e" />

### Run Program
https://github.com/user-attachments/assets/0af1ad6e-04e9-46df-ba52-3dadeca01596



