-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: wiruspolban
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `nowhatsapp` int(20) NOT NULL,
  `jurusanid` int(3) DEFAULT NULL,
  `prodiid` int(3) DEFAULT NULL,
  `roleid` int(3) NOT NULL,
  `statusid` int(11) DEFAULT NULL,
  `jenisusahaid` int(3) DEFAULT NULL,
  `nimteman1` int(11) DEFAULT NULL,
  `nimteman2` int(11) DEFAULT NULL,
  `nimteman3` int(11) DEFAULT NULL,
  `nimteman4` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roleid` (`roleid`),
  KEY `prodiid` (`prodiid`),
  KEY `jurusanid` (`jurusanid`),
  KEY `statusid` (`statusid`),
  KEY `jenisusahaid` (`jenisusahaid`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `roles` (`roleid`),
  CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`prodiid`) REFERENCES `prodi` (`prodiid`),
  CONSTRAINT `admin_ibfk_3` FOREIGN KEY (`jurusanid`) REFERENCES `jurusan` (`jurusanid`),
  CONSTRAINT `admin_ibfk_4` FOREIGN KEY (`statusid`) REFERENCES `status` (`statusid`),
  CONSTRAINT `admin_ibfk_5` FOREIGN KEY (`jenisusahaid`) REFERENCES `jenisusaha` (`jenisusahaid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'auwfar','f0a047143d1da15b630c73f0256d5db0','Achmad Chadil Auwfar','',0,1,1,1,3,1,NULL,NULL,NULL,NULL),(2,'ozil','f4e404c7f815fc68e7ce8e3c2e61e347','Mesut ','',0,1,2,2,1,1,NULL,NULL,NULL,NULL),(3,'ferdy','c01cf3245427e5eae41a8c0c61357335','Naufal Ferdy','',0,1,3,3,2,3,1,NULL,NULL,NULL),(4,'kevin','c01cf3245427e5eae41a8c0c61357335','Kevin Syauqi','',0,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fileproposal`
--

DROP TABLE IF EXISTS `fileproposal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fileproposal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) DEFAULT NULL,
  `jenisusahaid` int(3) NOT NULL,
  `proposal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jenisusahaid` (`jenisusahaid`),
  CONSTRAINT `fileproposal_ibfk_1` FOREIGN KEY (`jenisusahaid`) REFERENCES `jenisusaha` (`jenisusahaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fileproposal`
--

LOCK TABLES `fileproposal` WRITE;
/*!40000 ALTER TABLE `fileproposal` DISABLE KEYS */;
/*!40000 ALTER TABLE `fileproposal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fileproposaltahap3`
--

DROP TABLE IF EXISTS `fileproposaltahap3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fileproposaltahap3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) DEFAULT NULL,
  `proposal` varchar(255) DEFAULT NULL,
  `jenisusahaid` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jenisusahaid` (`jenisusahaid`),
  CONSTRAINT `fileproposaltahap3_ibfk_1` FOREIGN KEY (`jenisusahaid`) REFERENCES `jenisusaha` (`jenisusahaid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fileproposaltahap3`
--

LOCK TABLES `fileproposaltahap3` WRITE;
/*!40000 ALTER TABLE `fileproposaltahap3` DISABLE KEYS */;
/*!40000 ALTER TABLE `fileproposaltahap3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jawabanpertanyaan`
--

DROP TABLE IF EXISTS `jawabanpertanyaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jawabanpertanyaan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `NIM` varchar(255) DEFAULT NULL,
  `jenisusahaid` int(3) NOT NULL,
  `jawabanpertanyaan1` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan2` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan3` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan4` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan5` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan6` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan7` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan8` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan9` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan10` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan11` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan12` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan13` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan14` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan15` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan16` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan17` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan18` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan19` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan20` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan21` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan22` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan23` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan24` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan25` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan26` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan27` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan28` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan29` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan30` varchar(500) DEFAULT NULL,
  `jawabanpertanyaan31` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jenisusahaid` (`jenisusahaid`),
  CONSTRAINT `jawabanpertanyaan_ibfk_1` FOREIGN KEY (`jenisusahaid`) REFERENCES `jenisusaha` (`jenisusahaid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jawabanpertanyaan`
--

LOCK TABLES `jawabanpertanyaan` WRITE;
/*!40000 ALTER TABLE `jawabanpertanyaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jawabanpertanyaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenisusaha`
--

DROP TABLE IF EXISTS `jenisusaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenisusaha` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `jenisusahaid` int(3) NOT NULL,
  PRIMARY KEY (`jenisusahaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenisusaha`
--

LOCK TABLES `jenisusaha` WRITE;
/*!40000 ALTER TABLE `jenisusaha` DISABLE KEYS */;
INSERT INTO `jenisusaha` VALUES ('Industri Berbasis Teknologi','Industri Berbasis Teknologi',1),('Industri Kreatif','Industri Kreatif',2),('Industri Makanan dan Minuman (Kuliner)','Industri Makanan dan Minuman (Kuliner)',3),('Industri Produksi/Budi-daya','Industri Produksi/Budi-daya',4),('Industri Jasa dan Perdagangan','Industri Jasa dan Perdagangan',5);
/*!40000 ALTER TABLE `jenisusaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurusan` (
  `jurusanid` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`jurusanid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan`
--

LOCK TABLES `jurusan` WRITE;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES (1,'Jurusan Teknik Mesin','Jurusan Teknik Mesin'),(2,'Jurusan Teknik Elektro','Jurusan Teknik Elektro'),(3,'Jurusan Teknik Sipil','Jurusan Teknik Sipil'),(4,'Jurusan Teknik Energi','Jurusan Teknik Energi'),(5,'Jurusan Teknik Refrigasi','Jurusan Teknik Refrigasi'),(6,'Jurusan Teknik Kimia','Jurusan Teknik Kimia'),(7,'Jurusan Teknik Informatika','Jurusan Teknik Informatika'),(8,'Jurusan Bahasa Inggris','Jurusan Bahasa Inggris'),(9,'Jurusan Akuntansi','Jurusan Akuntansi'),(10,'Jurusan Administrasi Niaga','Jurusan Administrasi Niaga');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pertanyaan`
--

DROP TABLE IF EXISTS `pertanyaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pertanyaan` (
  `pertanyaanid` int(3) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pertanyaanid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pertanyaan`
--

LOCK TABLES `pertanyaan` WRITE;
/*!40000 ALTER TABLE `pertanyaan` DISABLE KEYS */;
INSERT INTO `pertanyaan` VALUES (1,'Hal mulia apa yang tim Anda ingin wujudkan dalam membangun  bisnis?'),(2,'Apa atau siapa yang menjadi pemicu hal mulia yang ingin diwujudkan tersebut?'),(3,'Bisnis atau topik bisnis apa yang Anda ajukan'),(4,'Goal/target omset dan net profit usaha Anda di tahun ini?'),(5,'Realitas/capaian omset dan net profit usaha Anda di tahun ini?'),(6,'Segmen spesifik pelanggan mana yang akan Anda sasar?'),(7,'Area mana yang akan menjadi target ideal jangkauan bisnis Anda?'),(8,'Dalam 4 bulan pertama bisnis Anda berjalan, daerah mana yang akan menjadi awal target pasar Anda?'),(9,'Coba Anda amati dan tanyakan kepada calon pelanggan yang Anda sasar. Aktifitas/upaya apa saja yang perlu mereka lakukan untuk mendapatkan produk/jasa yang yang sesuai dengan konteks bisnis Anda?'),(10,'Kesulitan apa saja yang benar benar dirasakan oleh calon pelanggan Anda, terkait dengan hal-hal yang perlu dilakukan untuk mendapatkan produk/jasa yang sesuai dengan konteks bisnis Anda?'),(11,'Jika kesulitan-kesulitan tersebut dapat terselesaikan, harapan-harapan apa saja yang ingin diwujudkan oleh calon pelanggan Anda?'),(12,'Dari semua kesulitan dan harapan calon pelanggan Anda, produk/layanan Anda akan menyelesaikan kesulitan dan memenuhi harapan yang mana?'),(13,'Produk/jasa apa yang Anda tawarkan kepada calon pelanggan Anda?'),(14,'Referensi produk/layanan apa saja atau hasil riset maupun jurnal dari pakar siapa yang Anda jadikan pertimbangan untuk membuat produk/layanan Anda?'),(15,'Bagaimana produk/jasa Anda tersebut bekerja menyelesaikan masalah dan memenuhi keinginan pelanggan yang Anda sasar?'),(16,'Menurut Anda, siapa saja yang akan menjadi kompetitor dalam menyediakan produk/jasa tersebut?'),(17,'Apa saja keunggulan produk/jasa yang disediakan oleh kompetitor Anda?'),(18,'Lalu, hal apa saja yang menjadi keunggulan kompetitif produk/jasa Anda dibandingkan dengan produk/jasa kompetitor?'),(19,'Dari sudut mana saja bisnis Anda akan mendapatkan revenue dari pelanggan?'),(20,'Bagaimana strategi Anda untuk membuat calon pelanggan mengetahui produk/jasa yang Anda sediakan?'),(21,'Bagaimana strategi Anda untuk membuat calon pelanggan tertarik dan akhirnya memutuskan membeli produk/jasa yang Anda sediakan?'),(22,'Bagaimana caranya Anda merespon pelanggan yang bertanya, membeli dan komplain terhadap layanan Anda?'),(23,'Strategi apa yang akan Anda lakukan untuk menjadikan pelanggan Anda loyal?'),(24,'Dimana calon pelanggan dapat memperoleh produk/jasa Anda? Melalui sistem online / Melalui sistem offline / Melalui sistem online dan offline'),(25,'Siapa saja anggota tim terbaik yang akan Anda libatkan dalam bisnis, dan apa keahlian masing-masing? -lebih dari 1'),(26,'Apa saja tanggung jawab masing-masing tim Anda tersebut? -lebih dari 1'),(27,'Apa indikator keberhasilan dari tanggung jawab  masing-masing tim Anda tersebut? -lebih dari 1'),(28,'Peralatan dan bahan utama apa saja yang Anda butuhkan untuk membuat produk/jasa tersebut?'),(29,'Jika Anda harus bermitra dalam menyediakan produk/jasa Anda, pihak mana yang akan Anda ajak kerja sama?'),(30,'Biaya apa saja yang Anda butuhkan dalam menyediakan, menjual, dan mengantarkan (men-deliver) produk/jasa kepada pelanggan?'),(31,'Jika terpilih sebagai penerima hibah, apa Anda sanggup memenuhi ketentuan dan syarat yang sudah ditetapkan? Yes/No');
/*!40000 ALTER TABLE `pertanyaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posisi`
--

DROP TABLE IF EXISTS `posisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posisi`
--

LOCK TABLES `posisi` WRITE;
/*!40000 ALTER TABLE `posisi` DISABLE KEYS */;
INSERT INTO `posisi` VALUES (1,'IT'),(2,'HRD'),(3,'Keuangan'),(4,'Produk'),(5,'Web Developer'),(6,'Manager');
/*!40000 ALTER TABLE `posisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodi` (
  `prodiid` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`prodiid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (1,'Teknik Sipil / D4 - Teknik Perancangan Jalan dan Jembatan','Teknik Sipil / D4 - Teknik Perancangan Jalan dan Jembatan'),(2,'Teknik Sipil / D4 - Teknik Perawatan dan Perbaikan Gedung','Teknik Sipil / D4 - Teknik Perawatan dan Perbaikan Gedung'),(3,'Teknik Sipil / D3 - Teknik Konstruksi Sipil','Teknik Sipil / D3 - Teknik Konstruksi Sipil'),(4,'Teknik Sipil / D3 - Teknik Konstruksi Gedung','Teknik Sipil / D3 - Teknik Konstruksi Gedung'),(5,'Teknik Mesin / D4 - Teknik Perancangan dan Konstruksi Mesin','Teknik Mesin / D4 - Teknik Perancangan dan Konstruksi Mesin'),(6,'Teknik Mesin / D4 - Proses Manufaktur','Teknik Mesin / D4 - Proses Manufaktur'),(7,'Teknik Mesin / D3 - Teknik Mesin','Teknik Mesin / D3 - Teknik Mesin'),(8,'Teknik Mesin / D3 - Teknik Aeronautika','Teknik Mesin / D3 - Teknik Aeronautika'),(9,'Teknik Elektro / D4 - Teknik Elektronika','Teknik Elektro / D4 - Teknik Elektronika'),(10,'Teknik Elektro / D3 - Teknik Elektronika','Teknik Elektro / D3 - Teknik Elektronika'),(11,'Teknik Elektro / D4 - Teknik Otomasi Industri','Teknik Elektro / D4 - Teknik Otomasi Industri'),(12,'Teknik Elektro / D3 - Teknik Listrik','Teknik Elektro / D3 - Teknik Listrik'),(13,'Teknik Elektro / D4 - Teknik Telekomunikasi','Teknik Elektro / D4 - Teknik Telekomunikasi'),(14,'Teknik Elektro / D3 - Teknik Telekomunikasi','Teknik Elektro / D3 - Teknik Telekomunikasi'),(15,'Teknik Kimia / D4 - Teknik Kimia Produksi Bersih','Teknik Kimia / D4 - Teknik Kimia Produksi Bersih'),(16,'Teknik Kimia / D3 - Teknik Kimia','Teknik Kimia / D3 - Teknik Kimia'),(17,'Teknik Kimia / D3 - Analis Kimia','Teknik Kimia / D3 - Analis Kimia'),(18,'Teknik Komputer dan Informatika / D4 - Teknik Informatika','Teknik Komputer dan Informatika / D4 - Teknik Informatika'),(19,'Teknik Komputer dan Informatika / D3 - Teknik Informatika','Teknik Komputer dan Informatika / D3 - Teknik Informatika'),(20,'Teknik Refrigerasi dan Tata Udara / D4 - Teknik Pendingin dan Tata Udara','Teknik Refrigerasi dan Tata Udara / D4 - Teknik Pendingin dan Tata Udara'),(21,'Teknik Refrigerasi dan Tata Udara / D3 - Teknik Pendingin dan Tata Udara','Teknik Refrigerasi dan Tata Udara / D3 - Teknik Pendingin dan Tata Udara'),(22,'Teknik Konversi Energi / D4 - Teknologi Pembangkit Tenaga Listrik','Teknik Konversi Energi / D4 - Teknologi Pembangkit Tenaga Listrik'),(23,'Teknik Konversi Energi / D4 - Teknologi Pembangkit Tenaga Listrik (Kerja Sama POLBAN - PT PLN)','Teknik Konversi Energi / D4 - Teknologi Pembangkit Tenaga Listrik (Kerja Sama POLBAN - PT PLN)'),(24,'Teknik Konversi Energi / D4 - Teknik Konservasi Energi','Teknik Konversi Energi / D4 - Teknik Konservasi Energi'),(25,'Teknik Konversi Energi / D3 - Teknik Konversi Energi','Teknik Konversi Energi / D3 - Teknik Konversi Energi'),(26,'Akuntansi / D4 - Akuntansi Manajemen Pemerintahan','Akuntansi / D4 - Akuntansi Manajemen Pemerintahan'),(27,'Akuntansi / D4 - Akuntansi','Akuntansi / D4 - Akuntansi'),(28,'Akuntansi / D3 - Akuntansi','Akuntansi / D3 - Akuntansi'),(29,'Akuntansi / D4 - Keuangan Syariah','Akuntansi / D4 - Keuangan Syariah'),(30,'Akuntansi / D3 - Keuangan dan Perbankan','Akuntansi / D3 - Keuangan dan Perbankan'),(31,'Administrasi Niaga / D4 - Administrasi Bisnis','Administrasi Niaga / D4 - Administrasi Bisnis'),(32,'Administrasi Niaga / D3 - Administrasi Bisnis','Administrasi Niaga / D3 - Administrasi Bisnis'),(33,'Administrasi Niaga / D4 - Manajemen Pemasaran','Administrasi Niaga / D4 - Manajemen Pemasaran'),(34,'Administrasi Niaga / D3 - Manajemen Pemasaran','Administrasi Niaga / D3 - Manajemen Pemasaran'),(35,'Administrasi Niaga / D4 - Manajemen Aset','Administrasi Niaga / D4 - Manajemen Aset'),(36,'Administrasi Niaga / D3 - Usaha Perjalanan Wisata','Administrasi Niaga / D3 - Usaha Perjalanan Wisata'),(37,'Bahasa Inggris / D3 - Bahasa Inggris','Bahasa Inggris / D3 - Bahasa Inggris');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `roleid` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'MAHASISWA','Mahasiswa/Pengusul'),(2,'REVIEWER','Reviewer'),(3,'PEMBIMBING','Pembimbing'),(4,'ADMIN','Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `statusid` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`statusid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'LOLOS TAHAP 1','Lolos Administrasi'),(2,'LOLOS TAHAP 2','Lolos Seleksi Internal'),(3,'LOLOS TAHAP 3','Lolos Seleksi Eksternal');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timelinekegiatan`
--

DROP TABLE IF EXISTS `timelinekegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timelinekegiatan` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `tanggalkegiatan` date NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timelinekegiatan`
--

LOCK TABLES `timelinekegiatan` WRITE;
/*!40000 ALTER TABLE `timelinekegiatan` DISABLE KEYS */;
INSERT INTO `timelinekegiatan` VALUES (1,'2019-12-10','KBMI Polban'),(2,'2020-04-02','Tes Timeline'),(3,'2020-04-07','Tes Timeline'),(4,'2020-04-01','Tes');
/*!40000 ALTER TABLE `timelinekegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'wiruspolban'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-14 17:51:41
