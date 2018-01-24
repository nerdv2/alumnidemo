/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 5.7.20-0ubuntu0.17.10.1 : Database - alumni_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`localdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `localdb`;

/*Table structure for table `cms_admin` */

DROP TABLE IF EXISTS `cms_admin`;

CREATE TABLE `cms_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `cms_admin` */

insert  into `cms_admin`(`id`,`username`,`password`,`updated_at`) values 
(1,'admin','$2y$10$/D14sJ16TJvR3QpSRtcQoetVVY6bXX8ODU7l/y4Xth5iuJ5HZJeGi','2018-01-21 00:00:00');

/*Table structure for table `cms_formulir` */

DROP TABLE IF EXISTS `cms_formulir`;

CREATE TABLE `cms_formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `lastclass` int(11) NOT NULL,
  `last_job` varchar(255) DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `tempat_pilihan` int(11) DEFAULT NULL,
  `waktu_pilihan` int(11) DEFAULT NULL,
  `pesan` text,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `photo_file` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_formulir` */

/*Table structure for table `cms_header` */

DROP TABLE IF EXISTS `cms_header`;

CREATE TABLE `cms_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `cms_header` */

insert  into `cms_header`(`id`,`title`,`text`,`created_at`,`updated_at`) values 
(1,'Sekilas..','Assallamu’allaikum wr wb.\r\n\r\nSalam sejahtera bagi kita semua.\r\n\r\nYth Civitas alumni sma 12 Bandung.\r\n\r\nAlhamdulillah, puji syukur kpd Tuhan Yang  Maha Esa, Sekarang ini kita  sudah punya web alumni SMA 12 angkatan \'94.\r\n\r\nWeb alumni ini dapat menjadi wadah untuk meliput , diliput dan share foto-foto maupun kegiatan berbagai angkatan pada alumni sma 12.\r\n\r\nBisa Berbagi informasi profile usaha, lowongan kerja, peluang usaha, event² angkatan dan sebagainya.\r\n\r\nBila ada alumni sma 12 yg mau diangkat utk menjadi  salah satu profile masing² angkatannya , bisa hubungi ke saudara Tinoy (Bio 3)/Kontak WhatsApp.\r\n\r\nSemoga dengan adanya web alumni sma 12 ini dapat memberikan manfaat bagi kita semua para alumni sma 12.\r\n\r\nTerima kasih atas perhatiannya.\r\n\r\nMari kita eratkan tali persatuan dan mewujudkan persaudaraan antar alumni Ikatan Keluarga Alumni SMA 12 Bandung.','2018-01-21 12:14:20','2018-01-21 12:14:20');

/*Table structure for table `cms_kelas` */

DROP TABLE IF EXISTS `cms_kelas`;

CREATE TABLE `cms_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `cms_kelas` */

insert  into `cms_kelas`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Fisika 1','2018-01-21 00:00:00','2018-01-21 00:00:00'),
(2,'Fisika 2','2018-01-21 00:00:00','2018-01-21 00:00:00'),
(3,'Biologi 3','2018-01-21 00:00:00','2018-01-21 00:00:00'),
(4,'Biologi 4','2018-01-21 00:00:00','2018-01-21 00:00:00'),
(9,'Sosial 5','2018-01-21 00:00:00','2018-01-21 00:00:00'),
(10,'Sosial 6','2018-01-21 00:00:00','2018-01-21 00:00:00'),
(11,'Sosial 7','2018-01-21 00:00:00','2018-01-21 00:00:00'),
(12,'Sosial 8','2018-01-21 00:00:00','2018-01-21 00:00:00');

/*Table structure for table `cms_photo` */

DROP TABLE IF EXISTS `cms_photo`;

CREATE TABLE `cms_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `photo_name` varchar(255) DEFAULT NULL,
  `photo_desc` varchar(255) DEFAULT NULL,
  `approve` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_photo` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
