drop database pwl_pos_2020;
create database pwl_pos_2020;
use pwl_pos_2020;

create table barang(
  id_barang int not null primary key auto_increment,
  kode_barang varchar(20) not null,
  nama_barang varchar(50),
  harga_barang int,
  stock_barang int,
  gambar_barang text,
  unique(kode_barang)
);

create table transaksi(
  id_transaksi int not null primary key auto_increment,
  no_transaksi varchar(50),
  tanggal_transaksi datetime
);

drop table item_transaksi;
create table item_transaksi(
  id_item_transaksi int not null primary key auto_increment,
  harga_item_transaksi int,
  qty_item_transaksi int,
  total_item_transaksi int,
  id_barang int,
  id_transaksi int,
  foreign key(id_transaksi) references transaksi(id_transaksi),
  foreign key(id_barang) references barang(id_barang)
);

alter table barang add is_active tinyint default 1;

alter table transaksi add nomor int default 0;

create table users(
    id_user int not null primary key auto_increment,
    nama_user varchar(100),
    email_user varchar(100),
    password_user varchar(200),
    role_user enum("admin","kasir")
);

insert into users value (null,"Admin","admin@mail.com","$2y$10$6kcBA5i9GVqs/v3DAoMl2eTRIHjlh5qRZKZeUt.xikp1wWiPGgTMS","admin");

alter table users
add first_login tinyint default 1,
add is_active tinyint default 1;
 