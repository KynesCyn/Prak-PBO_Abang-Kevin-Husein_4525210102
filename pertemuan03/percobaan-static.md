# Hasil Percobaan Anggota Statis (Static)
**Mata Kuliah:** Pemrograman Berorientasi Objek
**Materi:** Constructor, Anggota Statis, dan Konstanta

## 1. Mencetak `jumlahRekening` lewat nama kelas
**Kode yang dijalankan:**
`System.out.println(RekeningBank.getJumlahRekening());`

**Hasil:**
Program berhasil dikompilasi dan mencetak angka (misal: 3) tanpa menghasilkan error. 

**Kesimpulan:**
Method statis bisa dipanggil langsung menggunakan nama kelas (`RekeningBank`) tanpa harus melakukan instansiasi (membuat objek dengan `new`) terlebih dahulu. Ini membuktikan bahwa method statis adalah milik kelas, bukan milik objek individu.

---

## 2. Mengakses `this` di dalam method static
**Percobaan:**
Mencoba menambahkan pemanggilan `this.saldo` di dalam method statis `getJumlahRekening()`.

**Hasil / Pesan Kompilator:**
`error: non-static variable this cannot be referenced from a static context`

**Kesimpulan:**
Keyword `this` merujuk pada *instance* (objek) yang sedang aktif. Karena method statis dijalankan di level kelas dan tidak terikat pada objek mana pun, maka method statis tidak mengenali `this`.

---

## 3. Mengubah atribut instance menjadi static
**Percobaan:**
Mengubah `private double saldo;` menjadi `private static double saldo;`. Kemudian membuat dua rekening:
- Rekening A dengan saldo awal 1.000.000
- Rekening B dengan saldo awal 250.000
Lalu mencetak informasi kedua rekening tersebut.

**Hasil:**
Kedua rekening (A dan B) menampilkan jumlah saldo yang sama, yaitu 250.000 (saldo terakhir yang dimasukkan).

**Kesimpulan:**
Ketika atribut (seperti `saldo`) dijadikan `static`, memori untuk variabel tersebut dibagi bersama (*shared*) oleh semua objek dari kelas tersebut. Sehingga, jika satu objek mengubah nilainya, nilai pada objek lain akan ikut berubah. (Catatan: Setelah percobaan ini selesai, `saldo` sudah dikembalikan menjadi *non-static* sesuai instruksi).

## Jawaban Tugas Rumah - Kapan penggunaan static membuat kode sulit diuji?

Penggunaan static membuat kode sulit diuji ketika ia digunakan untuk menyimpan global state (status global) yang nilainya bisa diubah-ubah (mutable). Karena anggota statis dimiliki oleh kelas dan membagikan memori yang sama ke seluruh aplikasi, nilainya akan terus bertahan selama program berjalan. Dalam unit testing, hal ini melanggar prinsip isolasi tes. Jika satu tes mengubah nilai variabel statis, perubahan tersebut akan bocor (state leakage) dan memengaruhi hasil tes-tes berikutnya, sehingga tes menjadi rentan gagal secara acak (flaky).

Sebagai contoh pada kode saya sendiri di kelas RekeningBank, terdapat variabel private static int jumlahRekening. Jika "Tes A" instansiasi dua objek rekening, nilai penghitung ini menjadi 2. Ketika "Tes B" dijalankan setelahnya dan mengekspektasikan jumlahRekening dimulai dari 0, "Tes B" pasti akan gagal karena ia mewarisi nilai 2 dari "Tes A". Untuk mengujinya dengan aman, kita terpaksa membuat method tambahan khusus hanya untuk me-reset nilai statis tersebut kembali ke 0 setiap kali sebuah tes selesai.