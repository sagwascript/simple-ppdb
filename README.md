
# Sistem Informasi Pendaftaran Online

Based on [this repo](https://github.com/rusydimuhammad/Sistem-Informasi-Pendaftaran-Online)

Aplikasi ini merupakan Aplikasi Penerimaan Siswa Baru secara online menggunakan website dengan PHP dan MySQL. Aplikasi ini menggunakan database yang dinamakan "db_psb", pada database tersebut terdapat dua table, yaitu Tabel Admin dan Tabel Pendaftaran. Terdapat dua user yang tersedia pada aplikasi ini, yaitu user admin dan user calon siswa.

User:
----------------
1. Admin (Edit Data, Hapus Data, Update Data, Read Data, Print Data)
2. Calon Siswa (Daftar, Print)

Fitur:
----------------
1. Autentikasi Login Admin
2. CRUD Data Penerimaan Siswa Baru

Tambahan Fitur:
----------------
1. Load credentials database dari file .env
1. Form pendaftaran menggunakan bind params
1. Upload foto disimpan sebagai Base64 string di database
1. Menampilkan data foto dari database