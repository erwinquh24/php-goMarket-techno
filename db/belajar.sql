/*
SQLyog Community v12.2.1 (64 bit)
MySQL - 10.1.16-MariaDB : Database - belajar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`belajar` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `belajar`;

/*Table structure for table `data_pesanan` */

DROP TABLE IF EXISTS `data_pesanan`;

CREATE TABLE `data_pesanan` (
  `no` int(11) NOT NULL,
  `nama_costumer` varchar(100) NOT NULL,
  `alamat_costumer` varchar(100) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_pesanan` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id`,`nama`,`username`,`password`) values 
(5,'Benyamin','ben','$2y$10$WPP927M2FvZbifXW4Tux2eMF9I8huwwLgYrgzS/suaA6AROqZ9FLW'),
(6,'erwin','erw','$2y$10$p4zdDYo6pgMCPteyw6XaVu8tMrZHnKg4.2TCojkgqVe36nz0lUdvW');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `no` int(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga_barang` int(100) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`no`,`nama_barang`,`gambar`,`harga_barang`,`jumlah_barang`) values 
(1,'beras','beras.PNG',10000,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
