create database pwl_2020_01;
use pwl_2020_01;

create table mahasiswa(
  id_mahasiswa int not null primary key auto_increment,
  nim_mahasiswa varchar(10) not null,
  nama_mahasiswa varchar(100),
  jk_mahasiswa varchar(1),
  alamat_mahasiswa text,
  unique(nim_mahasiswa)
);

