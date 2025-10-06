cd c:/xampp/mysql/bin
mysql -u root

\T C:\

CREATE DATABASE Klinik_Sehat;


USE Klinik_Sehat;

CREATE TABLE pasien (
  id_pasien INT(4),
  nama_pasien VARCHAR(50),
  alamat_pasien VARCHAR(100),
  no_telp_pasien VARCHAR(15)
);

CREATE TABLE dokter (
  id_dokter INT(4),
  nama_dokter VARCHAR(50),
  spesialisasi VARCHAR(50),
  no_telp_dokter VARCHAR(15)
);

CREATE TABLE kunjungan (
  id_kunjungan INT(4),
  id_pasien INT(4),
  id_dokter INT(4),
  tanggal_kunjungan DATE,
  keluhan TEXT
);

CREATE TABLE jadwal (
  id_jadwal INT(4),
  id_dokter INT(4),
  hari_praktek VARCHAR(20),
  jam_praktek TIME
);


SHOW DATABASES;

DESC pasien;
DESC dokter;
DESC kunjungan;
DESC jadwal;

INSERT INTO pasien VALUES
(101, 'Ahmad Fauzi', 'Jakarta', '081234567890'),
(102, 'Budi Rahardjo', 'Bandung', '081234567891'),
(103, 'Citra Lestari', 'Surabaya', '081234567892'),
(104, 'Dedi Santoso', 'Semarang', '081234567893'),
(105, 'Eka Prasetya', 'Yogyakarta', '081234567894'),
(106, 'Fitria Dewi', 'Bali', '081234567895'),
(107, 'Guntur Saputra', 'Medan', '081234567896'),
(108, 'Hendra Susanto', 'Palembang', '081234567897');

INSERT INTO dokter VALUES
(201, 'Dr. Ari Setiawan', 'Umum', '081345678900'),
(202, 'Dr. Budi Pratama', 'Gigi', '081345678901'),
(203, 'Dr. Chandra', 'Anak', '081345678902'),
(204, 'Dr. Dian Purwanto', 'Kulit dan Kelamin', '081345678903'),
(205, 'Dr. Eka Susilo', 'Bedah', '081345678904'),
(206, 'Dr. Fajar Susanto', 'Jantung', '081345678905'),
(207, 'Dr. Gunawan', 'Saraf', '081345678906'),
(208, 'Dr. Hasan Basri', 'Mata', '081345678907');

INSERT INTO kunjungan VALUES
(301, 101, 201, '2023-01-10', 'Demam dan pusing'),
(302, 102, 202, '2023-01-11', 'Sakit gigi'),
(303, 103, 203, '2023-01-12', 'Batuk dan pilek'),
(304, 104, 204, '2023-01-13', 'Ruam kulit'),
(305, 105, 205, '2023-01-14', 'Luka sayatan'),
(306, 106, 206, '2023-01-15', 'Sesak napas'),
(307, 107, 207, '2023-01-16', 'Kesemutan'),
(308, 108, 208, '2023-01-17', 'Mata berair');

INSERT INTO jadwal VALUES
(401, 201, 'Senin', '08:00:00'),
(402, 202, 'Selasa', '09:00:00'),
(403, 203, 'Rabu', '10:00:00'),
(404, 204, 'Kamis', '11:00:00'),
(405, 205, 'Jumat', '12:00:00'),
(406, 206, 'Sabtu', '13:00:00'),
(407, 207, 'Minggu', '14:00:00'),
(408, 208, 'Senin', '15:00:00');


SELECT * FROM pasien;
SELECT * FROM dokter;
SELECT * FROM kunjungan;
SELECT * FROM jadwal;

ALTER TABLE pasien ADD PRIMARY KEY (id_pasien);
ALTER TABLE dokter ADD PRIMARY KEY (id_dokter);
ALTER TABLE kunjungan ADD PRIMARY KEY (id_kunjungan);
ALTER TABLE jadwal ADD PRIMARY KEY (id_jadwal);

ALTER TABLE pasien ADD UNIQUE (no_telp_pasien);

CREATE TABLE dokter_copy AS SELECT * FROM dokter;

INSERT INTO dokter_copy VALUES (209, 'Dr. Ari Setiawan', 'Umum', '081345678999');

ALTER TABLE kunjungan 
  ADD CONSTRAINT fk_kunjungan_pasien FOREIGN KEY (id_pasien) REFERENCES pasien(id_pasien),
  ADD CONSTRAINT fk_kunjungan_dokter FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter);

ALTER TABLE jadwal 
  ADD CONSTRAINT fk_jadwal_dokter FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter);


INSERT INTO pasien VALUES (109, 'Indra Wijaya', 'Solo', '081234567898');

INSERT INTO kunjungan VALUES (309, 109, 201, '2023-01-18', 'Batuk kering');

DELETE FROM pasien WHERE id_pasien = 109;

SELECT * FROM kunjungan;

ALTER TABLE kunjungan ADD biaya_kunjungan DECIMAL(10,2);

ALTER TABLE kunjungan CHANGE biaya_kunjungan tarif_kunjungan DECIMAL(10,2);

ALTER TABLE kunjungan DROP COLUMN tarif_kunjungan;
DESC kunjungan;

RENAME TABLE kunjungan TO rekam_medis;

DELETE FROM rekam_medis;

INSERT INTO rekam_medis (id_kunjungan, id_pasien, id_dokter, tanggal_kunjungan, keluhan) VALUES
(310, 101, 201, '2023-01-20', 'Sakit kepala'),
(311, 102, 202, '2023-01-21', 'Nyeri gigi'),
(312, 103, 203, '2023-01-22', 'Flu');

UPDATE jadwal j
JOIN dokter d ON j.id_dokter = d.id_dokter
SET j.hari_praktek = 'Jumat'
WHERE d.nama_dokter = 'Dr. Ari Setiawan';

DELETE FROM dokter WHERE spesialisasi = 'Kulit dan Kelamin';

DROP TABLE rekam_medis, pasien, dokter, jadwal, dokter_copy;
SHOW TABLES;

DROP DATABASE Klinik_Sehat;
SHOW DATABASES;
