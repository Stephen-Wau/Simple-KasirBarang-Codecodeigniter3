# Simple Kasir Barang

Berikut aplikasi kasir sederhana yang memiliki relasi antar tabel dimana terdapat beberapa fitur seperti : 
- Login
- CRUD Barang
- Print Daftar Barang
- Kasir Barang
- List Transaksi

Aplikasi ini merupakan project kecil dari matakuliah Permograman Web semester 4 dimana digunakan supaya mahasiswa dapat mengenal implementasi CI3 pada web. aplikasi ini juga menggunakan AJAX sederhana pada fitur Kasir

## Run Database

jalankan terlebih dahulu mySQL anda :
```bash
mysql -u root -p
```

kemudian Buka file pada folder db/pwl pos.sql lalu copy dan paste seluruh script pada terminal. 

## Run Program

Jalankan kode berikut diterminal untuk run program. 

```bash
php -S localhost:8000
```

## Login

silahkan masukan email dan password acak. misal : 

```bash
email 	: admin@mail.com
password  : asdasd
```

kemudian login, jika anda diminta memasukan password baru maka masukan password yang anda inginkan.

## Update Compouser

jika fitur print barang (excel) error, silahkan update compouser pd project ini dgn code :

```bash
compouser update
```

