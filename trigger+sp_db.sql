//DDL Dbku
//walimurid
CREATE TABLE walimurid( nik_walmur CHAR(16) NOT NULL, 
    nama_walmur VARCHAR(50) NOT NULL, 
    pekerjaan_walmur VARCHAR(30) NOT NULL, 
    PRIMARY KEY (nik_walmur))

//siswa
CREATE TABLE siswa( noinduk_siswa CHAR(10)NOT NULL, 
    nik_walmur CHAR(16) NOT NULL, 
    nama_siswa VARCHAR(50)NOT NULL, 
    jenis_kelamin BOOLEAN NOT NULL, 
    tgl_lahir DATE NOT NULL, 
    tgl_masuk DATE NOT NULL, 
    tgl_lulus DATE, 
    alamat VARCHAR (100) NOT NULL, 
    anak_ke INT,  
    PRIMARY KEY (noinduk_siswa) )

//pegawai
CREATE TABLE pegawai( nip_peg CHAR(5) NOT NULL, 
    nama_peg VARCHAR(30) NOT NULL, 
    jk_peg BOOLEAN NOT NULL, 
    alamat_peg VARCHAR(100) NOT NULL, 
    no_telp VARCHAR(15) NOT NULL, 
    email_peg VARCHAR(40), 
    tglmasuk_peg DATE NOT NULL, 
    PRIMARY KEY (nip_peg) )

//kelas
CREATE TABLE kelas( id_ruang_kelas CHAR(1), 
    nama_ruang_kelas VARCHAR(10), 
    PRIMARY KEY(id_ruang_kelas)) 


//kel belajar
CREATE TABLE kel_bljr(tingkat_tk BOOLEAN NOT NULL, 
    anggota_kel CHAR (10) NOT NULL, 
    ruang_kelas CHAR(1) NOT NULL, 
    guru CHAR(5) NOT NULL, 
    tahun_ajar INT NOT NULL, 
    PRIMARY KEY(anggota_kel, ruang_kelas, guru, tahun_ajar), 
    CONSTRAINT anggota_kel FOREIGN KEY (anggota_kel) REFERENCES siswa(noinduk_siswa), 
    CONSTRAINT ruang_kelas FOREIGN KEY (ruang_kelas) REFERENCES kelas(id_ruang_kelas), 
    CONSTRAINT guru FOREIGN KEY (guru) REFERENCES pegawai(nip_peg), 
    CONSTRAINT tahun_ajar FOREIGN KEY (tahun_ajar) REFERENCES tahun_ajaran(id_tahunajar))


//kriteria nilai harian
CREATE TABLE kriteria_nilai_harian ( id_kriteria_harian CHAR (3) NOT NULL, 
    nama_kriteria_harian VARCHAR (40) NOT NULL, 
    PRIMARY KEY (id_kriteria_harian))


//kriteria nilai bulanan
CREATE TABLE kriteria_nilai_bulanan( id_kriteria_bulanan CHAR (3) NOT NULL, 
    nama_kriteria_bulanan VARCHAR (40) NOT NULL, 
    PRIMARY KEY (id_kriteria_bulanan))


//nilai_harian
CREATE TABLE nilai_harian ( id_nilai_harian CHAR (8) NOT NULL, 
    id_kriteria_harian CHAR (3) NOT NULL,  
    tgl_ambil_nilai DATE NOT NULL,  
    noinduk_siswa CHAR (10), PRIMARY KEY (id_nilai_harian), 
    CONSTRAINT fk_kriteria_harian FOREIGN KEY (id_kriteria_harian) REFERENCES kriteria_nilai_harian (id_kriteria_harian), 
    CONSTRAINT fk_no_siswa FOREIGN KEY (noinduk_siswa) REFERENCES siswa (noinduk_siswa))


//nilai_bulanan
CREATE TABLE nilai_bulanan( id_nilai_bulanan CHAR (5) NOT NULL, 
    bulan_ambil_nilai DATE NOT NULL, 
    id_kriteria_bulanan CHAR (3) NOT NULL, 
    noinduk_siswa CHAR (10) NOT NULL, PRIMARY KEY (id_nilai_bulanan), 
    CONSTRAINT fk_kriteria_bulanan FOREIGN KEY (id_kriteria_bulanan) REFERENCES kriteria_nilai_bulanan (id_kriteria_bulanan), 
    CONSTRAINT fk_nilai_bulan_siswa FOREIGN KEY (noinduk_siswa) REFERENCES siswa(noinduk_siswa))


//tabel rekap spp
CREATE TABLE rekapspp(id_spp CHAR (6) NOT NULL, 
    tgl_rekap DATE NOT NULL, 
    no_bayar CHAR(10) NOT NULL, 
    tgl_bayar DATE NOT NULL, 
    jumlah_bayar INT NOT NULL,
    noinduk_siswa CHAR (10) NOT NULL, 
    jenis_pembayaran CHAR (6) NOT NULL, 
    STATUS TEXT NOT NULL, 
    catatan TEXT NOT NULL, 
    PRIMARY KEY(id_spp), 
    CONSTRAINT no_siswa FOREIGN KEY (noinduk_siswa) REFERENCES siswa(noinduk_siswa), 
    CONSTRAINT jns_pembayaran FOREIGN KEY (jenis_pembayaran) REFERENCES jenis_pembayaran(id_jenis))
    
    
    //tabel rekap pendaftaran
CREATE TABLE rekap_daftar ( id_pendaftaran CHAR (6) NOT NULL, 
    tgl_rekap DATE NOT NULL, 
    no_bayar CHAR(10) NOT NULL, 
    tgl_bayar DATE NOT NULL, 
    jumlah_bayar INT NOT NULL,
    noinduk_siswa CHAR (10) NOT NULL, 
    jenis_pembayaran CHAR (6) NOT NULL, 
    STATUS TEXT NOT NULL, 
    tgl_pendaftaran DATE NOT NULL,
    catatan TEXT NOT NULL, 
    PRIMARY KEY(id_pendaftaran), 
    CONSTRAINT induk_siswa FOREIGN KEY (noinduk_siswa) REFERENCES siswa(noinduk_siswa), 
    CONSTRAINT jenis_bayar FOREIGN KEY (jenis_pembayaran) REFERENCES jenis_pembayaran(id_jenis))


//pembuatan sp siswa pindah
DROP PROCEDURE siswa_pindah;
DELIMITER //
CREATE PROCEDURE siswa_pindah ()
BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, s.tgl_masuk, s.tgl_lulus, 
    s.alamat, w.nama_walmur FROM siswa s JOIN walimurid w 
    ON(s.NIK_walmur=w.NIK_walmur)
    WHERE tgl_lulus = '0000-00-00';
END//
DELIMITER ;

CALL siswa_pindah();


//pembuatan sp siswa lulus
DROP PROCEDURE siswa_lulus;
DELIMITER //
CREATE PROCEDURE siswa_lulus ()
BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, s.tgl_masuk, s.tgl_lulus, 
    s.alamat, w.nama_walmur FROM siswa s JOIN walimurid w 
    ON(s.NIK_walmur=w.NIK_walmur)
    WHERE tgl_lulus != '0000-00-00';
END//
DELIMITER ;

CALL siswa_lulus();


//function_untuk membuat jarak spp
DELIMITER //
CREATE OR REPLACE FUNCTION jarakspp (idpem CHAR(10))
RETURNS INT
BEGIN
DECLARE lama INT;
SELECT EXTRACT (DAY, tgl_bayar) INTO lama
FROM pembayaran
WHERE no_bayar = idpem;
RETURN lama;
END//
DELIMITER ;

SELECT jarakspp('BYR001');



//deadline spp (rekap data_yang sudah melakukan pembayaran spp)
DELIMITER //
CREATE OR REPLACE TRIGGER deadline_spp
AFTER INSERT ON pembayaran
FOR EACH ROW
BEGIN
IF (new.id_jenis != 'JP01')THEN
IF (SELECT jarakspp(new.no_bayar) <= 20)THEN
INSERT INTO rekapspp (tgl_rekap, no_bayar, tgl_bayar, jumlah_bayar, no.induk_siswa, id_jenis, STATUS, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jumlah_bayar, new.noinduk_siswa, new.id_jenis, 'LUNAS SPP', 'TEPAT WAKTU');
ELSE
INSERT INTO rekapspp (tgl_rekap, no_bayar, tgl_bayar, jumlah_bayar, no.induk_siswa, id_jenis, STATUS, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jumlah_bayar, new.noinduk_siswa, new.id_jenis, 'LUNAS SPP', 'TEPAT WAKTU');
END IF;
END IF;
END//
DELIMITER ;

INSERT INTO pembayaran(`no_bayar`, `tgl_pendaftaran`, `tgl_bayar`, `jumlah_bayar`, `noinduk_siswa`, `id_jenis`, `status`) 
VALUES ('BYR008','2020-03-09','0000-00-00','50000','SW003','JP01','0')

SELECT * FROM rekapspp;


//function_untuk membuat jarak lama membayar pendaftaran
DELIMITER //
CREATE OR REPLACE FUNCTION lamadaftar (idpem CHAR(10))
RETURNS INT
BEGIN
DECLARE lama INT;
SELECT TIMESTAMPDIFF (DAY, tgl_pendaftaran, tgl_bayar) INTO lama
FROM pembayaran
WHERE no_bayar = idpem;
RETURN lama;
END//
DELIMITER ;

SELECT lamadaftar('BYR003');


//deadline pendaftaran (rekap data_yang sudah melakukan pembayaran pendaftaran)
DELIMITER //
CREATE OR REPLACE TRIGGER pendaftaran_lunas
AFTER INSERT ON pembayaran
FOR EACH ROW
BEGIN
IF (new.id_jenis != 'JP02') THEN
IF (SELECT jarakspp(new.no_bayar)<=20) THEN
IF (new.tgl_pendaftaran != '0000-00-00') THEN
INSERT INTO rekap_daftar (tgl_rekap, no_bayar, tgl_bayar, jumlah_bayar, no.induk_siswa, id_jenis, STATUS, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jumlah_bayar, new.noinduk_siswa, new.id_jenis, 'LUNAS PENDAFTARAN', 'TEPAT WAKTU');
ELSE
INSERT INTO rekap_daftar (tgl_rekap, no_bayar, tgl_bayar, jumlah_bayar, no.induk_siswa, id_jenis, STATUS, catatan)
VALUES
(NOW(), new.no_bayar, new.tgl_bayar, new.jumlah_bayar, new.noinduk_siswa, new.id_jenis, 'LUNAS PENDAFTARAN', 'TEPAT WAKTU');
END IF ;
END IF ;
END IF ;
END//
DELIMITER ;


//yang sudah membayar pendaftaran
DROP PROCEDURE bayarpendaftaran;
DELIMITER //
CREATE PROCEDURE bayarpendaftaran()
BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_pendaftaran, j.nama_jenis
    FROM pembayaran p LEFT JOIN siswa s ON(s.noinduk_siswa = p.noinduk_siswa) 
    LEFT JOIN jenis_pembayaran j ON (j.id_jenis = p.id_jenis) 
    WHERE j.id_jenis ='JP01';
END//
DELIMITER ;

CALL bayarpendaftaran();


//untuk mengecek pembayaran
DROP PROCEDURE datapembayaran;
DELIMITER //
CREATE PROCEDURE datapembayaran()
BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_pendaftaran, j.nama_jenis
    FROM pembayaran p JOIN jenis_pembayaran j ON (j.id_jenis = p.id_jenis)
    LEFT JOIN siswa s ON(s.noinduk_siswa = p.noinduk_siswa) ;
    
END//
DELIMITER ;

CALL datapembayaran();


//yang sudah membayar SPP
DROP PROCEDURE bayarspp;
DELIMITER //
CREATE PROCEDURE bayarspp()
BEGIN
    SELECT s.noinduk_siswa, s.nama_siswa, p.no_bayar, p.tgl_bayar, p.tgl_pendaftaran, j.nama_jenis
    FROM pembayaran p LEFT JOIN siswa s ON(s.noinduk_siswa = p.noinduk_siswa) 
    RIGHT JOIN jenis_pembayaran j ON (j.id_jenis = p.id_jenis) 
    WHERE j.id_jenis ='JP02';
END //
DELIMITER ;

CALL bayarspp();





