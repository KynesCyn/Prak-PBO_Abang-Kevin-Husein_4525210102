# Laporan Praktikum PBO Pertemuan 06

**Nama**        : Abang Kevin Husein  
**NPM**         : 4525210102  
**Mata Kuliah** : Pemrograman Berorientasi Objek  

---

## Materi
- **Abstraksi & Antarmuka (Abstract Class & Interface)**
- **Interface Segregation Principle (ISP)**
- **Enum dengan Perilaku/Method**
- **Trait (PHP) & Default Method (Java)**

---

## 1. Implementasi Bahasa Java

### Screenshot Coding Fuelable.java
![Fuelable.java](img/Fuelable.png)
> **Penjelasan:** `Fuelable` adalah sebuah interface yang mendefinisikan kontrak bagi objek yang dapat diisi bahan bakar. Interface ini memuat method `isiBahanBakar()`, `kapasitasTangki()`, dan `tipeBahanBakar()`. Pemisahan interface ini dari `Movable` menerapkan *Interface Segregation Principle* (ISP) agar kelas yang tidak butuh bahan bakar (seperti `Sepeda`) tidak dipaksa mengimplementasikannya.

---

### Screenshot Coding Kendaraan.java
![Kendaraan.java](img/kendaraan.png)
> **Penjelasan:** `Kendaraan` merupakan *abstract class* yang berfungsi sebagai cetak biru dasar untuk semua jenis kendaraan. Kelas ini menampung *field* umum seperti `merek` dan `tahun`, method konkrit `umur()`, serta *abstract method* `jumlahRoda()` yang wajib diimplementasikan oleh kelas turunannya.

---

### Screenshot Coding Movable.java
![Movable.java](img/Movable.png)
> **Penjelasan:** Interface `Movable` mendefinisikan kemampuan objek untuk bergerak lewat method `bergerak()` dan `kecepatanMaksimum()`. Terdapat juga *default method* `ringkasanGerak()` (fitur Java 8+) yang memberikan implementasi default penggabungan teks ringkasan kecepatan tanpa memaksa implementor menulis ulang kodenya.

---

### Screenshot Coding Mobil.java
![Mobil.java](img/Mobil.png)
> **Penjelasan:** Kelas `Mobil` adalah kelas konkrit yang mewarisi (*extends*) `Kendaraan` serta mengimplementasikan dua interface (*implements*) sekaligus, yaitu `Movable` dan `Fuelable`. Kelas ini mendefinisikan kapasitas tangki, kecepatan maksimum, serta logika pengisian bahan bakar yang aman (menolak nilai `<= 0` dan tidak melebihi kapasitas).

---

### Screenshot Coding Sepeda.java
![Sepeda.java](img/Sepeda.png)
> **Penjelasan:** Kelas `Sepeda` mewarisi `Kendaraan` dan mengimplementasikan `Movable`, namun **TIDAK** mengimplementasikan `Fuelable`. Hal ini menunjukkan fleksibilitas interface, di mana sepeda dapat bergerak tetapi tidak memerlukan bahan bakar.

---

### Screenshot Coding TipeBahanBakar.java
![TipeBahanBakar.java](img/TipeBahanBakar.png)
> **Penjelasan:** `TipeBahanBakar` adalah sebuah *enum* yang tidak hanya menyimpan konstanta (`BENSIN`, `SOLAR`, `LISTRIK`), tetapi juga memiliki atribut (`label`, `hargaPerSatuan`) serta method perilaku seperti `biayaPengisian()` dan `ramahLingkungan()`.

---

### Screenshot Coding Main.java
![Main.java](img/Main.png)
> **Penjelasan:** File `Main.java` berfungsi sebagai *entry point* untuk menguji seluruh kelas Java. Di dalamnya terdapat fungsi `isiPenuh(Fuelable kendaraan)` yang memanfaatkan polimorfisme interface, sehingga bisa menerima objek apa pun yang mengimplementasikan `Fuelable`.

---

### Hasil Running Program Java
![Hasil Running Java](img/runningmainjava.png)
> **Penjelasan Output:** Program berhasil mengeksekusi metode pergerakan kendaraan, menampilkan ringkasan gerak, menghitung biaya pengisian bahan bakar mobil, serta menampilkan daftar enum tipe bahan bakar beserta status ramah lingkungannya.

---

## 2. Implementasi Bahasa PHP

### Screenshot Coding abstraksi.php
![abstraksi.php](img/Abstraksi.png)
> **Penjelasan:** File ini berisi definisi lengkap struktur OOP PHP yang meliputi interface `Movable` & `Fuelable`, `TipeBahanBakar` (Backed Enum PHP 8.1+), *Trait* `Loggable`, *Abstract Class* `Kendaraan`, serta kelas konkrit `Mobil`, `Sepeda`, dan `Pesanan`.
> 
> *Penggunaan Trait `Loggable`* menunjukkan konsep *horizontal code reuse*, di mana kelas `Mobil` dan kelas `Pesanan` (yang sama sekali tidak sekerabat) bisa membagikan kemampuan pencatatan log yang sama.

---

### Screenshot Coding Main.php
![Main.php](img/Mainphp.png)
> **Penjelasan:** File eksekusi utama PHP yang mengimpor `abstraksi.php` menggunakan `require_once`. File ini menjalankan perulangan objek `Movable`, pemanggilan fungsi `isiPenuh()`, iterasi Enum `TipeBahanBakar`, serta pemanggilan trait `log()` dari objek `Mobil` dan `Pesanan`.

---

### Hasil Running Program PHP
![Hasil Running PHP](img/hasilrunningphp.png)
> **Penjelasan Output:** Menampilkan eksekusi program PHP yang berjalan lancar, memproses pengisian bahan bakar, pergerakan sepeda dan mobil, hingga pencetakan log berformat dari trait `Loggable`.

### Keputusan.md
![alt text](img/Keputusan.png)
