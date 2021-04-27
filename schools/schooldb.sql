/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - schools_ht
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`schools_ht` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `schools_ht`;

/*Table structure for table `account_balances` */

DROP TABLE IF EXISTS `account_balances`;

CREATE TABLE `account_balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL DEFAULT 0,
  `currency_id` int(11) NOT NULL DEFAULT 0,
  `balance` decimal(16,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `account_balances` */

/*Table structure for table `crm_accounts` */

DROP TABLE IF EXISTS `crm_accounts`;

CREATE TABLE `crm_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(200) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `jobtitle` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `o` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `balance` decimal(16,2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `notes` text NOT NULL,
  `options` text DEFAULT NULL,
  `tags` text NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `ts` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `web` varchar(200) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `google` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `tax_number` varchar(100) DEFAULT NULL,
  `entity_number` varchar(100) DEFAULT NULL,
  `currency` int(11) DEFAULT 0,
  `pmethod` varchar(100) DEFAULT NULL,
  `autologin` varchar(100) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `lastloginip` varchar(100) DEFAULT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `isp` varchar(100) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lon` varchar(50) DEFAULT NULL,
  `gname` varchar(200) DEFAULT NULL,
  `gid` int(11) NOT NULL DEFAULT 0,
  `sid` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `country_code` varchar(20) DEFAULT NULL,
  `country_idd` varchar(20) DEFAULT NULL,
  `signed_up_by` varchar(100) DEFAULT NULL,
  `signed_up_ip` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ct` varchar(200) DEFAULT NULL,
  `assistant` varchar(200) DEFAULT NULL,
  `asst_phone` varchar(100) DEFAULT NULL,
  `second_email` varchar(100) DEFAULT NULL,
  `second_phone` varchar(100) DEFAULT NULL,
  `taxexempt` varchar(50) DEFAULT NULL,
  `latefeeoveride` varchar(50) DEFAULT NULL,
  `overideduenotices` varchar(50) DEFAULT NULL,
  `separateinvoices` varchar(50) DEFAULT NULL,
  `disableautocc` varchar(50) DEFAULT NULL,
  `billingcid` int(10) NOT NULL DEFAULT 0,
  `securityqid` int(10) NOT NULL DEFAULT 0,
  `securityqans` text DEFAULT NULL,
  `cardtype` varchar(200) DEFAULT NULL,
  `cardlastfour` varchar(20) DEFAULT NULL,
  `cardnum` text DEFAULT NULL,
  `startdate` varchar(50) DEFAULT NULL,
  `expdate` varchar(50) DEFAULT NULL,
  `issuenumber` varchar(200) DEFAULT NULL,
  `bankname` varchar(200) DEFAULT NULL,
  `banktype` varchar(200) DEFAULT NULL,
  `bankcode` varchar(200) DEFAULT NULL,
  `bankacct` varchar(200) DEFAULT NULL,
  `gatewayid` int(10) NOT NULL DEFAULT 0,
  `language` text DEFAULT NULL,
  `pwresetkey` varchar(100) DEFAULT NULL,
  `emailoptout` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pwresetexpiry` datetime DEFAULT NULL,
  `c1` varchar(200) DEFAULT NULL,
  `c2` varchar(200) DEFAULT NULL,
  `c3` varchar(200) DEFAULT NULL,
  `c4` varchar(200) DEFAULT NULL,
  `c5` varchar(200) DEFAULT NULL,
  `is_email_verified` int(1) NOT NULL DEFAULT 0,
  `is_phone_veirifed` int(1) NOT NULL DEFAULT 0,
  `photo_id_type` varchar(100) DEFAULT NULL,
  `photo_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `crm_accounts` */

insert  into `crm_accounts`(`id`,`account`,`fname`,`lname`,`company`,`jobtitle`,`cid`,`o`,`phone`,`email`,`username`,`address`,`city`,`state`,`zip`,`country`,`balance`,`status`,`notes`,`options`,`tags`,`password`,`token`,`ts`,`img`,`web`,`facebook`,`google`,`linkedin`,`twitter`,`skype`,`tax_number`,`entity_number`,`currency`,`pmethod`,`autologin`,`lastlogin`,`lastloginip`,`stage`,`timezone`,`isp`,`lat`,`lon`,`gname`,`gid`,`sid`,`role`,`country_code`,`country_idd`,`signed_up_by`,`signed_up_ip`,`dob`,`ct`,`assistant`,`asst_phone`,`second_email`,`second_phone`,`taxexempt`,`latefeeoveride`,`overideduenotices`,`separateinvoices`,`disableautocc`,`billingcid`,`securityqid`,`securityqans`,`cardtype`,`cardlastfour`,`cardnum`,`startdate`,`expdate`,`issuenumber`,`bankname`,`banktype`,`bankcode`,`bankacct`,`gatewayid`,`language`,`pwresetkey`,`emailoptout`,`created_at`,`updated_at`,`pwresetexpiry`,`c1`,`c2`,`c3`,`c4`,`c5`,`is_email_verified`,`is_phone_veirifed`,`photo_id_type`,`photo_id`) values 
(1,'test','','','','',0,1,'','',NULL,'','','','','United States',0.00,'Active','',NULL,'','','','','','','','','',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2017-11-13 05:12:33',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL),
(2,'test 2','','','','',0,1,'','customer@example.com',NULL,'','','','','United States',0.00,'Active','',NULL,'','','','','','','','','',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2017-11-13 05:12:40',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL),
(3,'Fortune4 Technologies','','','','',0,1,'','sameer@fortune4.in',NULL,'','mumbai','maharashtra','400088','India',0.00,'Active','',NULL,'','ibHYFYNIfPoZg','27gar44394v81qet3sxzf8b3bfb188e18bec547c55b00d56ab4e','','','','','','',NULL,NULL,NULL,NULL,2,NULL,'nyl02cc8rfepn155lv7k31564641401',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2019-08-01 02:36:38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL),
(4,'Sagar','','','Test company','',1,1,'7894561231','sagar.m@fortune4.in',NULL,'','','','','India',0.00,'Active','',NULL,'','ibpjKu8zHcTZI','uk8ohlq6hwe7ijyzntkqc5625479f7fb4ad279fe1d0b7302f3f1','','','','','','',NULL,NULL,NULL,NULL,2,NULL,'h638l1pl9twb6l6vz5wx41564989427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'2019-08-05 03:16:54',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL);

/*Table structure for table `crm_customfields` */

DROP TABLE IF EXISTS `crm_customfields`;

CREATE TABLE `crm_customfields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctype` text DEFAULT NULL,
  `relid` int(10) NOT NULL DEFAULT 0,
  `fieldname` text DEFAULT NULL,
  `fieldtype` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fieldoptions` text DEFAULT NULL,
  `regexpr` text DEFAULT NULL,
  `adminonly` text DEFAULT NULL,
  `required` text DEFAULT NULL,
  `showorder` text DEFAULT NULL,
  `showinvoice` text DEFAULT NULL,
  `sorder` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `crm_customfields` */

/*Table structure for table `crm_customfieldsvalues` */

DROP TABLE IF EXISTS `crm_customfieldsvalues`;

CREATE TABLE `crm_customfieldsvalues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fieldid` int(10) NOT NULL,
  `relid` int(10) NOT NULL,
  `fvalue` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `crm_customfieldsvalues` */

/*Table structure for table `crm_groups` */

DROP TABLE IF EXISTS `crm_groups`;

CREATE TABLE `crm_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(200) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `parent` varchar(200) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `exempt` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `separateinvoices` text DEFAULT NULL,
  `sorder` int(10) DEFAULT NULL,
  `c1` varchar(200) DEFAULT NULL,
  `c2` varchar(200) DEFAULT NULL,
  `c3` varchar(200) DEFAULT NULL,
  `c4` varchar(200) DEFAULT NULL,
  `c5` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `crm_groups` */

insert  into `crm_groups`(`id`,`gname`,`color`,`discount`,`parent`,`pid`,`exempt`,`description`,`separateinvoices`,`sorder`,`c1`,`c2`,`c3`,`c4`,`c5`) values 
(1,'Group 1','','','',0,'','','',0,'','','','','');

/*Table structure for table `crm_industries` */

DROP TABLE IF EXISTS `crm_industries`;

CREATE TABLE `crm_industries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `is_default` int(1) NOT NULL DEFAULT 0,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `crm_industries` */

insert  into `crm_industries`(`id`,`industry`,`is_active`,`is_default`,`sorder`,`created_at`,`updated_at`) values 
(1,'Agriculture',1,0,0,NULL,NULL),
(2,'Apparel',1,0,0,NULL,NULL),
(3,'Banking',1,0,0,NULL,NULL),
(4,'Biotechnology',1,0,0,NULL,NULL),
(5,'Chemicals',1,0,0,NULL,NULL),
(6,'Communications',1,0,0,NULL,NULL),
(7,'Construction',1,0,0,NULL,NULL),
(8,'Consulting',1,0,0,NULL,NULL),
(9,'Education',1,0,0,NULL,NULL),
(10,'Electronics',1,0,0,NULL,NULL),
(11,'Energy',1,0,0,NULL,NULL),
(12,'Engineering',1,0,0,NULL,NULL),
(13,'Entertainment',1,0,0,NULL,NULL),
(14,'Environmental',1,0,0,NULL,NULL),
(15,'Finance',1,0,0,NULL,NULL),
(16,'Food & Beverage',1,0,0,NULL,NULL),
(17,'Government',1,0,0,NULL,NULL),
(18,'Healthcare',1,0,0,NULL,NULL),
(19,'Hospitality',1,0,0,NULL,NULL),
(20,'Insurance',1,0,0,NULL,NULL),
(21,'Machinery',1,0,0,NULL,NULL),
(22,'Manufacturing',1,0,0,NULL,NULL),
(23,'Media',1,0,0,NULL,NULL),
(24,'Not For Profit',1,0,0,NULL,NULL),
(25,'Other',1,0,0,NULL,NULL),
(26,'Recreation',1,0,0,NULL,NULL),
(27,'Retail',1,0,0,NULL,NULL),
(28,'Shipping',1,0,0,NULL,NULL),
(29,'Technology',1,0,0,NULL,NULL),
(30,'Telecommunications',1,0,0,NULL,NULL),
(31,'Transportation',1,0,0,NULL,NULL),
(32,'Utilities',1,0,0,NULL,NULL);

/*Table structure for table `crm_lead_sources` */

DROP TABLE IF EXISTS `crm_lead_sources`;

CREATE TABLE `crm_lead_sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `is_default` int(1) NOT NULL DEFAULT 1,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `crm_lead_sources` */

insert  into `crm_lead_sources`(`id`,`sname`,`is_active`,`is_default`,`sorder`,`created_at`,`updated_at`) values 
(1,'Advertisement',1,1,0,NULL,NULL),
(2,'Customer Event',1,1,0,NULL,NULL),
(3,'Employee Referral',1,1,0,NULL,NULL),
(4,'Google AdWords',1,1,0,NULL,NULL),
(5,'Other',1,1,0,NULL,NULL),
(6,'Partner',1,1,0,NULL,NULL),
(7,'Purchased List',1,1,0,NULL,NULL),
(8,'Trade Show',1,1,0,NULL,NULL),
(9,'Webinar',1,1,0,NULL,NULL),
(10,'Website',1,1,0,NULL,NULL),
(11,'Facebook',1,1,0,NULL,NULL);

/*Table structure for table `crm_lead_status` */

DROP TABLE IF EXISTS `crm_lead_status`;

CREATE TABLE `crm_lead_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `is_default` int(1) NOT NULL DEFAULT 0,
  `is_converted` int(1) NOT NULL DEFAULT 0,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `crm_lead_status` */

insert  into `crm_lead_status`(`id`,`sname`,`is_active`,`is_default`,`is_converted`,`sorder`,`created_at`,`updated_at`) values 
(1,'Unqualified',1,0,0,0,NULL,NULL),
(2,'New',1,1,0,0,NULL,NULL),
(3,'Working',1,0,0,0,NULL,NULL),
(4,'Nurturing',1,0,0,0,NULL,NULL),
(5,'Qualified',1,0,0,0,NULL,NULL);

/*Table structure for table `crm_leads` */

DROP TABLE IF EXISTS `crm_leads`;

CREATE TABLE `crm_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secret` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `oid` int(11) NOT NULL DEFAULT 0,
  `salutation` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `suffix` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `website` varchar(200) DEFAULT NULL,
  `industry` varchar(200) DEFAULT NULL,
  `employees` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `viewed_at` datetime DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `iid` int(11) NOT NULL DEFAULT 0,
  `rid` int(11) NOT NULL DEFAULT 0,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `assigned` int(11) NOT NULL DEFAULT 0,
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `public` int(1) NOT NULL DEFAULT 0,
  `ratings` varchar(50) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT 0,
  `lost` int(1) NOT NULL DEFAULT 0,
  `junk` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  `memo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `crm_leads` */

/*Table structure for table `crm_salutations` */

DROP TABLE IF EXISTS `crm_salutations`;

CREATE TABLE `crm_salutations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(200) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `is_default` int(1) NOT NULL DEFAULT 0,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `crm_salutations` */

insert  into `crm_salutations`(`id`,`sname`,`is_active`,`is_default`,`sorder`,`created_at`,`updated_at`) values 
(1,'Mr.',1,0,0,NULL,NULL),
(2,'Ms.',1,0,0,NULL,NULL),
(3,'Mrs.',1,0,0,NULL,NULL),
(4,'Dr.',1,0,0,NULL,NULL),
(5,'Prof.',1,0,0,NULL,NULL);

/*Table structure for table `ib_doc_rel` */

DROP TABLE IF EXISTS `ib_doc_rel`;

CREATE TABLE `ib_doc_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rtype` varchar(100) NOT NULL DEFAULT 'contact',
  `rid` int(11) NOT NULL DEFAULT 0,
  `did` int(11) NOT NULL DEFAULT 0,
  `can_download` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ib_doc_rel` */

/*Table structure for table `ib_invoice_access_log` */

DROP TABLE IF EXISTS `ib_invoice_access_log`;

CREATE TABLE `ib_invoice_access_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL DEFAULT 0,
  `cid` int(11) NOT NULL DEFAULT 0,
  `iid` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `customer` varchar(200) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `referer` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `country_iso` varchar(20) DEFAULT NULL,
  `viewed_at` varchar(200) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ib_invoice_access_log` */

/*Table structure for table `sys_accounts` */

DROP TABLE IF EXISTS `sys_accounts`;

CREATE TABLE `sys_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `balance` decimal(18,2) NOT NULL DEFAULT 0.00,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `contact_phone` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `ib_url` varchar(200) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `sorder` int(11) DEFAULT NULL,
  `e` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sys_accounts` */

insert  into `sys_accounts`(`id`,`account`,`description`,`balance`,`bank_name`,`account_number`,`currency`,`branch`,`address`,`contact_person`,`contact_phone`,`website`,`ib_url`,`created`,`notes`,`sorder`,`e`,`token`,`status`) values 
(1,'ICICI Test','',10299.00,'','','','','','','','','','2019-08-05','',1,'','',''),
(2,'IDBI','',190000.00,'','','','','','','','','','2019-08-16','',1,'','','');

/*Table structure for table `sys_activity` */

DROP TABLE IF EXISTS `sys_activity`;

CREATE TABLE `sys_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT 0,
  `msg` text NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT '',
  `stime` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `o` int(11) NOT NULL DEFAULT 0,
  `oname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_activity` */

/*Table structure for table `sys_api` */

DROP TABLE IF EXISTS `sys_api`;

CREATE TABLE `sys_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `apikey` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_api` */

insert  into `sys_api`(`id`,`label`,`ip`,`apikey`) values 
(1,'export','','8p5sfjovosh574h5wzggxrpd5lu93o97o95mynfh');

/*Table structure for table `sys_appconfig` */

DROP TABLE IF EXISTS `sys_appconfig`;

CREATE TABLE `sys_appconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` text NOT NULL,
  `value` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

/*Data for the table `sys_appconfig` */

insert  into `sys_appconfig`(`id`,`setting`,`value`) values 
(1,'CompanyName','Fortune4 Billing'),
(29,'theme','ibilling'),
(37,'currency_code','$'),
(56,'language','en'),
(57,'show-logo','1'),
(58,'nstyle','dark'),
(63,'dec_point','.'),
(64,'thousands_sep',','),
(65,'timezone','America/New_York'),
(66,'country','United States'),
(67,'country_code','US'),
(68,'df','Y-m-d'),
(69,'caddress','Fortune4 Billing <br> Unit No.01, Bldg. No.5, Sector III, M B P,  <br> Mahape, Navi Mumbai - 400 710.\r\n'),
(70,'account_search','1'),
(71,'redirect_url','dashboard'),
(72,'rtl','0'),
(73,'ckey','0982995697'),
(74,'networth_goal','200000'),
(75,'sysEmail','demo@example.com'),
(76,'url_rewrite','0'),
(77,'build','4803'),
(78,'animate','0'),
(79,'pdf_font','dejavusanscondensed'),
(80,'accounting','1'),
(81,'invoicing','1'),
(82,'quotes','1'),
(83,'client_dashboard','1'),
(84,'contact_set_view_mode','search'),
(85,'invoice_terms','<p>Fortune4&lt;br&gt; Unit No.01, Bldg. No.5, Sector III, M B P,  &lt;br&gt; Mahape, Navi Mumbai - 400 710.</p>'),
(86,'console_notify_invoice_created','0'),
(87,'i_driver','v2'),
(88,'purchase_code',NULL),
(89,'c_cache',''),
(90,'mininav','0'),
(91,'hide_footer','1'),
(92,'design','default'),
(93,'default_landing_page','login'),
(94,'recaptcha','0'),
(95,'recaptcha_sitekey',''),
(96,'recaptcha_secretkey',''),
(97,'home_currency','USD'),
(98,'currency_decimal_digits','true'),
(99,'currency_symbol_position','p'),
(100,'thousand_separator_placement','3'),
(101,'dashboard','canvas'),
(102,'header_scripts',''),
(103,'footer_scripts',''),
(104,'ib_key',''),
(105,'ib_s',''),
(106,'ib_u_t','1619601818'),
(107,'ib_u_a','0'),
(108,'momentLocale','en'),
(109,'contentAnimation','animated fadeIn'),
(110,'calendar','1'),
(111,'leads','1'),
(112,'tasks','1'),
(113,'orders','1'),
(114,'show_quantity_as',''),
(115,'gmap_api_key',''),
(116,'license_key',''),
(117,'local_key',''),
(118,'add_fund','0'),
(119,'add_fund_minimum_deposit','100'),
(120,'add_fund_maximum_deposit','2500'),
(121,'add_fund_maximum_balance','25000'),
(122,'add_fund_require_active_order','0'),
(123,'sales_target','10000'),
(124,'industry','default'),
(125,'inventory','1'),
(126,'secondary_currency',''),
(127,'customer_custom_username','0'),
(128,'documents','1'),
(129,'projects','1'),
(130,'purchase','1'),
(131,'suppliers','1'),
(132,'support','1'),
(133,'hrm','1'),
(134,'companies','1'),
(135,'plugins','1'),
(136,'country_flag_code','us'),
(137,'graph_primary_color','2196f3'),
(138,'graph_secondary_color','eb3c00');

/*Table structure for table `sys_cart` */

DROP TABLE IF EXISTS `sys_cart`;

CREATE TABLE `sys_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secret` varchar(100) DEFAULT NULL,
  `items` text DEFAULT NULL,
  `total` decimal(16,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `ip` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `browser` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `currency` varchar(200) DEFAULT NULL,
  `language` varchar(200) DEFAULT NULL,
  `coupon` varchar(200) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lon` varchar(50) DEFAULT NULL,
  `item_count` int(11) NOT NULL DEFAULT 0,
  `cid` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `lid` int(11) NOT NULL DEFAULT 0,
  `currency_id` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry` datetime DEFAULT NULL,
  `memo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_cart` */

/*Table structure for table `sys_cats` */

DROP TABLE IF EXISTS `sys_cats`;

CREATE TABLE `sys_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` enum('Income','Expense') NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `total_amount` decimal(16,4) DEFAULT 0.0000,
  `budget` decimal(16,4) DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

/*Data for the table `sys_cats` */

insert  into `sys_cats`(`id`,`name`,`type`,`sorder`,`total_amount`,`budget`,`created_at`,`updated_at`) values 
(14,'Advertising','Expense',1,0.0000,0.0000,NULL,NULL),
(15,'Bank and Credit Card Interest','Expense',21,0.0000,0.0000,NULL,NULL),
(16,'Car and Truck','Expense',22,0.0000,0.0000,NULL,NULL),
(17,'Commissions and Fees','Expense',23,0.0000,0.0000,NULL,NULL),
(18,'Contract Labor','Expense',24,0.0000,0.0000,NULL,NULL),
(19,'Contributions','Expense',25,0.0000,0.0000,NULL,NULL),
(20,'Cost of Goods Sold','Expense',26,0.0000,0.0000,NULL,NULL),
(21,'Credit Card Interest','Expense',27,0.0000,0.0000,NULL,NULL),
(22,'Depreciation','Expense',29,0.0000,0.0000,NULL,NULL),
(23,'Dividend Payments','Expense',30,0.0000,0.0000,NULL,NULL),
(24,'Employee Benefit Programs','Expense',31,0.0000,0.0000,NULL,NULL),
(25,'Entertainment','Expense',32,0.0000,0.0000,NULL,NULL),
(26,'Gift','Expense',33,0.0000,0.0000,NULL,NULL),
(27,'Insurance','Expense',34,0.0000,0.0000,NULL,NULL),
(28,'Legal, Accountant &amp; Other Professional Services','Expense',35,0.0000,0.0000,NULL,NULL),
(29,'Meals','Expense',36,0.0000,0.0000,NULL,NULL),
(30,'Mortgage Interest','Expense',37,0.0000,0.0000,NULL,NULL),
(31,'Non-Deductible Expense','Expense',38,0.0000,0.0000,NULL,NULL),
(33,'Other Business Property Leasing','Expense',20,0.0000,0.0000,NULL,NULL),
(34,'Owner Draws','Expense',19,0.0000,0.0000,NULL,NULL),
(35,'Payroll Taxes','Expense',6,0.0000,0.0000,NULL,NULL),
(37,'Phone','Expense',7,0.0000,0.0000,NULL,NULL),
(38,'Postage','Expense',8,0.0000,0.0000,NULL,NULL),
(39,'Rent','Expense',10,0.0000,0.0000,NULL,NULL),
(40,'Repairs &amp; Maintenance','Expense',9,0.0000,0.0000,NULL,NULL),
(41,'Supplies','Expense',11,0.0000,0.0000,NULL,NULL),
(42,'Taxes and Licenses','Expense',12,0.0000,0.0000,NULL,NULL),
(43,'Transfer Funds','Expense',13,0.0000,0.0000,NULL,NULL),
(44,'Travel','Expense',14,0.0000,0.0000,NULL,NULL),
(45,'Utilities','Expense',15,0.0000,0.0000,NULL,NULL),
(46,'Vehicle, Machinery &amp; Equipment Rental or Leasing','Expense',16,0.0000,0.0000,NULL,NULL),
(47,'Wages','Expense',17,0.0000,0.0000,NULL,NULL),
(48,'Regular Income','Income',1,0.0000,0.0000,NULL,NULL),
(49,'Owner Contribution','Income',12,0.0000,0.0000,NULL,NULL),
(50,'Interest Income','Income',11,0.0000,0.0000,NULL,NULL),
(51,'Expense Refund','Income',10,0.0000,0.0000,NULL,NULL),
(52,'Other Income','Income',9,0.0000,0.0000,NULL,NULL),
(53,'Salary','Income',8,0.0000,0.0000,NULL,NULL),
(54,'Equities','Income',7,0.0000,0.0000,NULL,NULL),
(55,'Rent &amp; Royalties','Income',6,0.0000,0.0000,NULL,NULL),
(56,'Home equity','Income',5,0.0000,0.0000,NULL,NULL),
(57,'Part Time Work','Income',3,0.0000,0.0000,NULL,NULL),
(58,'Account Transfer','Income',4,0.0000,0.0000,NULL,NULL),
(60,'Health Care','Expense',18,0.0000,0.0000,NULL,NULL),
(63,'Loans','Expense',28,0.0000,0.0000,NULL,NULL),
(64,'Selling Software','Income',2,0.0000,0.0000,NULL,NULL),
(65,'Software Customization','Income',13,0.0000,0.0000,NULL,NULL),
(67,'Salary','Expense',5,0.0000,0.0000,NULL,NULL),
(68,'Paypal','Expense',2,0.0000,0.0000,NULL,NULL),
(69,'Office Equipment','Expense',3,0.0000,0.0000,NULL,NULL),
(70,'Staff Entertaining','Expense',4,0.0000,0.0000,NULL,NULL),
(71,'Petty Cash','Income',0,0.0000,0.0000,NULL,NULL);

/*Table structure for table `sys_companies` */

DROP TABLE IF EXISTS `sys_companies`;

CREATE TABLE `sys_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `logo_url` varchar(200) DEFAULT NULL,
  `logo_path` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `emails` text DEFAULT NULL,
  `phones` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `pid` int(11) NOT NULL DEFAULT 0,
  `oid` int(11) NOT NULL DEFAULT 0,
  `rid` int(11) NOT NULL DEFAULT 0,
  `assigned` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `ratings` varchar(50) DEFAULT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  `c1` text DEFAULT NULL,
  `c2` text DEFAULT NULL,
  `c3` text DEFAULT NULL,
  `c4` text DEFAULT NULL,
  `c5` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_companies` */

insert  into `sys_companies`(`id`,`company_name`,`url`,`logo_url`,`logo_path`,`email`,`phone`,`emails`,`phones`,`tags`,`description`,`notes`,`address1`,`address2`,`city`,`state`,`zip`,`country`,`source`,`added_from`,`o`,`cid`,`aid`,`pid`,`oid`,`rid`,`assigned`,`created_at`,`created_by`,`updated_at`,`updated_by`,`last_contact`,`last_contact_by`,`ratings`,`trash`,`archived`,`c1`,`c2`,`c3`,`c4`,`c5`) values 
(1,'Test company','http://google.com','',NULL,'sameer@gmail.com','98989898989',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `sys_currencies` */

DROP TABLE IF EXISTS `sys_currencies`;

CREATE TABLE `sys_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) DEFAULT NULL,
  `iso_code` varchar(10) DEFAULT NULL,
  `symbol` varchar(20) DEFAULT NULL,
  `rate` decimal(16,8) NOT NULL DEFAULT 1.00000000,
  `prefix` varchar(20) DEFAULT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `format` varchar(100) DEFAULT NULL,
  `decimal_separator` varchar(10) DEFAULT NULL,
  `thousand_separator` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `available_in` text DEFAULT NULL,
  `isdefault` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sys_currencies` */

insert  into `sys_currencies`(`id`,`cname`,`iso_code`,`symbol`,`rate`,`prefix`,`suffix`,`format`,`decimal_separator`,`thousand_separator`,`created_at`,`created_by`,`updated_at`,`updated_by`,`available_in`,`isdefault`,`trash`,`archived`) values 
(1,'USD','USD','$',1.00000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0),
(2,'INR','INR','Rs',1.00000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0);

/*Table structure for table `sys_documents` */

DROP TABLE IF EXISTS `sys_documents`;

CREATE TABLE `sys_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `file_o_name` varchar(200) DEFAULT NULL,
  `file_r_name` varchar(200) DEFAULT NULL,
  `file_mime_type` varchar(200) DEFAULT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `file_dl_token` varchar(200) DEFAULT NULL,
  `file_owner` int(11) NOT NULL DEFAULT 0,
  `version` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `sha1` varchar(40) DEFAULT NULL,
  `md5` varchar(32) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `gid` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `contacts` text DEFAULT NULL,
  `deals` text DEFAULT NULL,
  `leads` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `customer_can_download` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  `is_global` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_documents` */

/*Table structure for table `sys_email_logs` */

DROP TABLE IF EXISTS `sys_email_logs`;

CREATE TABLE `sys_email_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `iid` int(11) NOT NULL DEFAULT 0,
  `rel_type` varchar(100) DEFAULT NULL,
  `rel_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `sys_email_logs` */

insert  into `sys_email_logs`(`id`,`userid`,`sender`,`email`,`subject`,`message`,`date`,`iid`,`rel_type`,`rel_id`) values 
(1,3,'','sameer@fortune4.in','Fortune4 Billing Invoice','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This email serves as your official invoice from <strong>Fortune4 Billing. </strong>	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"http://testourcode.com/billing/?ng=client/iview/1/token_9944382000\" target=\"_blank\">http://testourcode.com/billing/?ng=client/iview/1/token_9944382000</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: 1<br>Invoice Amount: 101.50<br>Due Date: 2019-08-23</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>Fortune4 Billing Team</div></div></div>','2019-08-01 02:43:21',1,NULL,0),
(2,4,'','sagar.m@fortune4.in','Laptop Ordered!','Your Laptop is ready to deliver','2019-08-05 03:19:04',0,NULL,0),
(3,4,'','sagar.m@fortune4.in','Fortune4 Billing Invoice','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This email serves as your official invoice from <strong>Fortune4 Billing. </strong>	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"http://testourcode.com/billing/?ng=client/iview/2/token_5278302795\" target=\"_blank\">http://testourcode.com/billing/?ng=client/iview/2/token_5278302795</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: 2<br>Invoice Amount: 100.00<br>Due Date: 2019-08-05</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>Fortune4 Billing Team</div></div></div>','2019-08-05 03:20:30',2,NULL,0);

/*Table structure for table `sys_email_templates` */

DROP TABLE IF EXISTS `sys_email_templates`;

CREATE TABLE `sys_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tplname` varchar(128) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `send` varchar(50) DEFAULT 'Active',
  `core` enum('Yes','No') DEFAULT 'Yes',
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`,`language_id`),
  KEY `tplname` (`tplname`(32))
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `sys_email_templates` */

insert  into `sys_email_templates`(`id`,`tplname`,`language_id`,`subject`,`message`,`send`,`core`,`hidden`) values 
(3,'Invoice:Invoice Created',1,'{{business_name}} Invoice','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This email serves as your official invoice from <strong>{{business_name}}. </strong>	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>','Yes','Yes',0),
(7,'Admin:Password Change Request',1,'{{business_name}} password change request','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Hi {{name}},</div>	<div style=\"padding:5px\">		This is to confirm that we have received a Forgot Password request for your Account Username - {{username}} <br>From the IP Address - {{ip_address}}	</div>	<div style=\"padding:5px\">		Click this linke to reset your password- <br><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{password_reset_link}}\">{{password_reset_link}}</a>	</div><div style=\"padding:5px\">Please note: until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.</div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>','Yes','Yes',0),
(10,'Admin:New Password',1,'{{business_name}} New Password for Admin','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\">\n\n<div style=\"padding:5px;font-size:11pt;font-weight:bold\">\n   Hello {{name}}\n</div>\n\n\n	<div style=\"padding:5px\">\n		Here is your new password for <strong>{{business_name}}. </strong>\n	</div>\n\n	\n<div style=\"padding:10px 5px\">\n    Log in URL: <a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{login_url}}\">{{login_url}}</a><br>Username: {{username}}<br>Password: {{password}}</div>\n\n<div style=\"padding:5px\">For security reason, Please change your password after login. </div>\n\n<div style=\"padding:0px 5px\">\n	<div>Best Regards,<br>{{business_name}} Team</div>\n\n</div>\n\n</div>','Yes','Yes',0),
(12,'Invoice:Invoice Payment Reminder',1,'{{business_name}} Invoice Payment Reminder','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This is a billing reminder that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is due on {{invoice_due_date}}. 	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>','Yes','Yes',0),
(13,'Invoice:Invoice Overdue Notice',1,'{{business_name}} Invoice Overdue Notice','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This is the notice that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is now overdue.	</div>	<div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>','Yes','Yes',0),
(14,'Invoice:Invoice Payment Confirmation',1,'{{business_name}} Invoice Payment Confirmation','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\">\n\n<div style=\"padding:5px;font-size:11pt;font-weight:bold\">\n   Greetings,\n</div>\n\n\n\n	<div style=\"padding:5px\">\n		This is a payment receipt for Invoice {{invoice_id}} sent on {{invoice_date}}.\n	</div>\n\n\n	<div style=\"padding:5px\">\n		Login to your client Portal to view this invoice.\n	</div>\n\n\n<div style=\"padding:10px 5px\">\n    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div>\n\n\n<div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div>\n\n\n<div style=\"padding:0px 5px\">\n	<div>Best Regards,<br>{{business_name}} Team</div>\n\n\n</div>\n\n\n</div>','Yes','Yes',0),
(15,'Invoice:Invoice Refund Confirmation',1,'{{business_name}} Invoice Refund Confirmation','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		This is confirmation that a refund has been processed for Invoice {{invoice_id}} sent on {{invoice_date}}.	</div><div style=\"padding:10px 5px\">    Invoice URL: <a href=\"{{invoice_url}}\" target=\"_blank\">{{invoice_url}}</a><a target=\"_blank\" style=\"color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none\" href=\"{{app_url}}\"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>','Yes','Yes',0),
(16,'Quote:Quote Created',1,'{{quote_subject}}','<div style=\"line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3\"><div style=\"padding:5px;font-size:11pt;font-weight:bold\">   Greetings,</div>	<div style=\"padding:5px\">		Dear {{contact_name}},&nbsp;<br> Here is the quote you requested for.  The quote is valid until {{valid_until}}.	</div><div style=\"padding:10px 5px\">    Quote Unique URL: <a href=\"{{quote_url}}\" target=\"_blank\">{{quote_url}}</a><br></div><div style=\"padding:5px\"><span style=\"font-size: 13.3333330154419px; line-height: 21.3333320617676px;\">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span><br></div><div style=\"padding:0px 5px\">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>','Yes','Yes',0),
(17,'Client:Client Signup Email',1,'Your {{business_name}} Login Info','<p>Dear {{client_name}},</p>\n<p>Welcome to {{business_name}}.</p>\n<p>You can track your billing, profile, transactions from this portal.</p>\n<p>Your login information is as follows:</p>\n<p>---------------------------------------------------------------------------------------</p>\n<p>Login URL: {{client_login_url}} <br />Email Address: {{client_email}}<br /> Password: Your chosen password.</p>\n<p>----------------------------------------------------------------------------------------</p>\n<p>We very much appreciate you for choosing us.</p>\n<p>{{business_name}} Team</p>','Yes','Yes',0);

/*Table structure for table `sys_emailconfig` */

DROP TABLE IF EXISTS `sys_emailconfig`;

CREATE TABLE `sys_emailconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(50) NOT NULL,
  `host` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `apikey` varchar(200) NOT NULL,
  `port` varchar(10) NOT NULL,
  `secure` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_emailconfig` */

insert  into `sys_emailconfig`(`id`,`method`,`host`,`username`,`password`,`apikey`,`port`,`secure`) values 
(1,'phpmail','smtp.gmail.com','you@gmail.com','123456','','587','tls');

/*Table structure for table `sys_events` */

DROP TABLE IF EXISTS `sys_events`;

CREATE TABLE `sys_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `contacts` text DEFAULT NULL,
  `deals` text DEFAULT NULL,
  `owner` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `etype` varchar(200) DEFAULT NULL,
  `priority` varchar(200) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `iid` int(11) NOT NULL DEFAULT 0,
  `oid` int(11) NOT NULL DEFAULT 0,
  `rid` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `allday` int(1) NOT NULL DEFAULT 0,
  `notification` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_events` */

insert  into `sys_events`(`id`,`title`,`description`,`contacts`,`deals`,`owner`,`status`,`etype`,`priority`,`color`,`o`,`cid`,`aid`,`iid`,`oid`,`rid`,`company_id`,`start`,`end`,`allday`,`notification`,`trash`,`archived`) values 
(1,'Meeting','Meeting with ICICI regarding Transactions',NULL,NULL,NULL,NULL,NULL,NULL,'#2196f3',NULL,0,0,0,0,0,0,'2019-09-04 01:00:00','2019-09-04 03:00:59',0,0,0,0);

/*Table structure for table `sys_invoiceitems` */

DROP TABLE IF EXISTS `sys_invoiceitems`;

CREATE TABLE `sys_invoiceitems` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoiceid` int(10) NOT NULL DEFAULT 0,
  `userid` int(10) NOT NULL,
  `type` text NOT NULL,
  `relid` int(10) NOT NULL,
  `itemcode` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(20) NOT NULL DEFAULT '1',
  `amount` decimal(14,2) NOT NULL DEFAULT 0.00,
  `taxed` int(1) NOT NULL,
  `taxamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(14,2) NOT NULL DEFAULT 0.00,
  `duedate` date DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoiceid` (`invoiceid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `sys_invoiceitems` */

insert  into `sys_invoiceitems`(`id`,`invoiceid`,`userid`,`type`,`relid`,`itemcode`,`description`,`qty`,`amount`,`taxed`,`taxamount`,`total`,`duedate`,`paymentmethod`,`notes`) values 
(4,1,3,'',0,'','Laptop','1',100.00,1,0.00,100.00,'2019-08-01','',''),
(3,1,3,'',0,'','HP pro book','1',0.00,0,0.00,0.00,'2019-08-01','',''),
(5,2,4,'',0,'','Laptop','1',100.00,0,0.00,100.00,'2019-08-05','',''),
(6,3,4,'',0,'','Laptop','1',100.00,1,0.00,100.00,'2019-08-07','','');

/*Table structure for table `sys_invoices` */

DROP TABLE IF EXISTS `sys_invoices`;

CREATE TABLE `sys_invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `account` varchar(200) NOT NULL,
  `cn` varchar(100) NOT NULL DEFAULT '',
  `invoicenum` text NOT NULL,
  `date` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` varchar(1) NOT NULL DEFAULT 'f',
  `discount_value` decimal(14,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(14,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `taxname` varchar(100) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `tax2` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL DEFAULT 0.00,
  `taxrate` decimal(10,2) NOT NULL,
  `taxrate2` decimal(10,2) NOT NULL,
  `status` text NOT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `vtoken` varchar(20) NOT NULL,
  `ptoken` varchar(20) NOT NULL,
  `r` varchar(100) NOT NULL DEFAULT '0',
  `nd` date DEFAULT NULL,
  `eid` int(10) NOT NULL DEFAULT 0,
  `ename` varchar(200) NOT NULL DEFAULT '',
  `vid` int(11) NOT NULL DEFAULT 0,
  `currency` int(11) NOT NULL DEFAULT 0,
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT 1.0000,
  `recurring` tinyint(1) NOT NULL DEFAULT 0,
  `recurring_ends` date DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT 0,
  `last_overdue_reminder` date DEFAULT NULL,
  `allowed_payment_methods` text DEFAULT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `q_hide` tinyint(1) NOT NULL DEFAULT 0,
  `show_quantity_as` varchar(100) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT 0,
  `is_credit_invoice` int(1) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `aname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `status` (`status`(3))
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `sys_invoices` */

insert  into `sys_invoices`(`id`,`userid`,`account`,`cn`,`invoicenum`,`date`,`duedate`,`datepaid`,`subtotal`,`discount_type`,`discount_value`,`discount`,`credit`,`taxname`,`tax`,`tax2`,`total`,`taxrate`,`taxrate2`,`status`,`paymentmethod`,`notes`,`vtoken`,`ptoken`,`r`,`nd`,`eid`,`ename`,`vid`,`currency`,`currency_symbol`,`currency_prefix`,`currency_suffix`,`currency_rate`,`recurring`,`recurring_ends`,`last_recurring_date`,`source`,`sale_agent`,`last_overdue_reminder`,`allowed_payment_methods`,`billing_street`,`billing_city`,`billing_state`,`billing_zip`,`billing_country`,`shipping_street`,`shipping_city`,`shipping_state`,`shipping_zip`,`shipping_country`,`q_hide`,`show_quantity_as`,`pid`,`is_credit_invoice`,`aid`,`aname`) values 
(1,3,'Fortune4 Technologies','','','2019-08-01','2019-08-23','2019-08-01 02:42:49',100.00,'p',0.00,0.00,0.00,'Sales Tax',1.50,0.00,101.50,1.50,0.00,'Unpaid','','<p>Fortune4<br> Unit No.01, Bldg. No.5, Sector III, M B P,  <br> Mahape, Navi Mumbai - 400 710.</p>','9944382000','8298653347','0','2019-08-01',0,'',0,2,'Rs',NULL,NULL,1.0000,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,0,0,NULL),
(2,4,'Sagar','','','2019-08-05','2019-08-05','2019-08-05 03:18:03',100.00,'f',0.00,0.00,100.00,'',0.00,0.00,100.00,0.00,0.00,'Paid','','','5278302795','6716327714','0','2019-08-05',0,'',0,0,'$',NULL,NULL,1.0000,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,0,0,NULL),
(3,4,'Sagar','','','2019-08-07','2019-08-07','2019-08-07 01:23:54',100.00,'p',0.00,0.00,109.00,'CGST',9.00,0.00,109.00,9.00,0.00,'Paid','','<p>Fortune4<br> Unit No.01, Bldg. No.5, Sector III, M B P,  <br> Mahape, Navi Mumbai - 400 710.</p>','8881877267','6042384718','0','2019-08-07',0,'',0,1,'$',NULL,NULL,1.0000,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,0,0,NULL);

/*Table structure for table `sys_item_cats` */

DROP TABLE IF EXISTS `sys_item_cats`;

CREATE TABLE `sys_item_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_item_cats` */

/*Table structure for table `sys_items` */

DROP TABLE IF EXISTS `sys_items`;

CREATE TABLE `sys_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `unit` varchar(100) NOT NULL DEFAULT '',
  `sales_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `inventory` decimal(16,4) NOT NULL DEFAULT 0.0000,
  `weight` decimal(16,4) NOT NULL DEFAULT 0.0000,
  `width` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `length` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `height` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sku` varchar(50) DEFAULT NULL,
  `upc` varchar(50) DEFAULT NULL,
  `ean` varchar(50) DEFAULT NULL,
  `mpn` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `sid` int(11) NOT NULL DEFAULT 0,
  `supplier` varchar(200) DEFAULT NULL,
  `bid` int(11) NOT NULL DEFAULT 0,
  `brand` varchar(200) DEFAULT NULL,
  `sell_account` int(11) NOT NULL DEFAULT 0,
  `purchase_account` int(11) NOT NULL DEFAULT 0,
  `inventory_account` int(11) NOT NULL DEFAULT 0,
  `taxable` int(1) NOT NULL DEFAULT 0,
  `location` varchar(200) DEFAULT NULL,
  `item_number` varchar(100) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `type` enum('Service','Product') NOT NULL,
  `track_inventroy` enum('Yes','No') NOT NULL DEFAULT 'No',
  `negative_stock` enum('Yes','No') NOT NULL DEFAULT 'No',
  `available` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `added` date DEFAULT NULL,
  `last_sold` date DEFAULT NULL,
  `e` mediumtext NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `gid` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `supplier_id` int(11) NOT NULL DEFAULT 0,
  `gname` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `expire_days` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT 0,
  `is_service` int(1) NOT NULL DEFAULT 0,
  `commission_percent` decimal(16,2) NOT NULL DEFAULT 0.00,
  `commission_percent_type` varchar(100) DEFAULT NULL,
  `commission_fixed` decimal(16,2) NOT NULL DEFAULT 0.00,
  `trash` int(1) NOT NULL DEFAULT 0,
  `payterm` varchar(200) DEFAULT NULL,
  `cost_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `unit_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `promo_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `setup` decimal(16,2) NOT NULL DEFAULT 0.00,
  `onetime` decimal(16,2) NOT NULL DEFAULT 0.00,
  `monthly` decimal(16,2) NOT NULL DEFAULT 0.00,
  `monthlysetup` decimal(16,2) NOT NULL DEFAULT 0.00,
  `quarterly` decimal(16,2) NOT NULL DEFAULT 0.00,
  `quarterlysetup` decimal(16,2) NOT NULL DEFAULT 0.00,
  `halfyearly` decimal(16,2) NOT NULL DEFAULT 0.00,
  `halfyearlysetup` decimal(16,2) NOT NULL DEFAULT 0.00,
  `annually` decimal(16,2) NOT NULL DEFAULT 0.00,
  `annuallysetup` decimal(16,2) NOT NULL DEFAULT 0.00,
  `biennially` decimal(16,2) NOT NULL DEFAULT 0.00,
  `bienniallysetup` decimal(16,2) NOT NULL DEFAULT 0.00,
  `triennially` decimal(16,2) NOT NULL DEFAULT 0.00,
  `trienniallysetup` decimal(16,2) NOT NULL DEFAULT 0.00,
  `has_domain` varchar(100) DEFAULT NULL,
  `free_domain` varchar(100) DEFAULT NULL,
  `email_rel` int(11) NOT NULL DEFAULT 0,
  `tags` text DEFAULT NULL,
  `c1` text DEFAULT NULL,
  `c2` text DEFAULT NULL,
  `c3` text DEFAULT NULL,
  `c4` text DEFAULT NULL,
  `c5` text DEFAULT NULL,
  `c6` text DEFAULT NULL,
  `c7` text DEFAULT NULL,
  `c8` text DEFAULT NULL,
  `c9` text DEFAULT NULL,
  `c10` text DEFAULT NULL,
  `c11` text DEFAULT NULL,
  `c12` text DEFAULT NULL,
  `c13` text DEFAULT NULL,
  `c14` text DEFAULT NULL,
  `c15` text DEFAULT NULL,
  `c16` text DEFAULT NULL,
  `c17` text DEFAULT NULL,
  `c18` text DEFAULT NULL,
  `c19` text DEFAULT NULL,
  `c20` text DEFAULT NULL,
  `c21` text DEFAULT NULL,
  `c22` text DEFAULT NULL,
  `c23` text DEFAULT NULL,
  `c24` text DEFAULT NULL,
  `c25` text DEFAULT NULL,
  `c26` text DEFAULT NULL,
  `c27` text DEFAULT NULL,
  `c28` text DEFAULT NULL,
  `c29` text DEFAULT NULL,
  `c30` text DEFAULT NULL,
  `sold_count` decimal(16,4) DEFAULT 0.0000,
  `total_amount` decimal(16,4) DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_items` */

insert  into `sys_items`(`id`,`name`,`unit`,`sales_price`,`inventory`,`weight`,`width`,`length`,`height`,`sku`,`upc`,`ean`,`mpn`,`isbn`,`sid`,`supplier`,`bid`,`brand`,`sell_account`,`purchase_account`,`inventory_account`,`taxable`,`location`,`item_number`,`description`,`type`,`track_inventroy`,`negative_stock`,`available`,`status`,`added`,`last_sold`,`e`,`sorder`,`gid`,`category_id`,`supplier_id`,`gname`,`product_id`,`size`,`start_date`,`end_date`,`expire_date`,`expire_days`,`image`,`flag`,`is_service`,`commission_percent`,`commission_percent_type`,`commission_fixed`,`trash`,`payterm`,`cost_price`,`unit_price`,`promo_price`,`setup`,`onetime`,`monthly`,`monthlysetup`,`quarterly`,`quarterlysetup`,`halfyearly`,`halfyearlysetup`,`annually`,`annuallysetup`,`biennially`,`bienniallysetup`,`triennially`,`trienniallysetup`,`has_domain`,`free_domain`,`email_rel`,`tags`,`c1`,`c2`,`c3`,`c4`,`c5`,`c6`,`c7`,`c8`,`c9`,`c10`,`c11`,`c12`,`c13`,`c14`,`c15`,`c16`,`c17`,`c18`,`c19`,`c20`,`c21`,`c22`,`c23`,`c24`,`c25`,`c26`,`c27`,`c28`,`c29`,`c30`,`sold_count`,`total_amount`,`created_at`,`updated_at`) values 
(1,'Laptop','',100.00,0.0000,0.0000,0.0000,0.0000,0.0000,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,0,0,0,0,NULL,'1','','Product','No','No',0,'Active',NULL,NULL,'',0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,0,0.00,NULL,0.00,0,NULL,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.0000,0.0000,NULL,NULL);

/*Table structure for table `sys_leads` */

DROP TABLE IF EXISTS `sys_leads`;

CREATE TABLE `sys_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `iid` int(11) NOT NULL DEFAULT 0,
  `oid` int(11) NOT NULL DEFAULT 0,
  `rid` int(11) NOT NULL DEFAULT 0,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `assigned` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `public` int(1) NOT NULL DEFAULT 0,
  `ratings` varchar(50) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT 0,
  `lost` int(1) NOT NULL DEFAULT 0,
  `junk` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_leads` */

/*Table structure for table `sys_logs` */

DROP TABLE IF EXISTS `sys_logs`;

CREATE TABLE `sys_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `userid` int(10) NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

/*Data for the table `sys_logs` */

insert  into `sys_logs`(`id`,`date`,`type`,`description`,`userid`,`ip`) values 
(47,'2019-08-07 01:22:51','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(46,'2019-08-07 01:22:36','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(45,'2019-08-07 01:22:36','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(44,'2019-08-06 08:50:07','Admin','Login Successful admin@admin.com',1,'27.106.26.202'),
(43,'2019-08-06 03:16:16','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(42,'2019-08-06 00:43:38','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(41,'2019-08-05 10:39:38','Admin','Login Successful admin@admin.com',1,'27.106.26.202'),
(40,'2019-08-05 06:09:47','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(11,'2019-07-31 08:13:20','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(12,'2019-07-31 08:43:51','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(13,'2019-07-31 12:47:40','Admin','Login Successful admin@admin.com',1,'111.119.221.62'),
(14,'2019-07-31 18:24:05','Admin','Login Successful admin@admin.com',1,'111.119.221.62'),
(15,'2019-08-01 00:55:12','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(16,'2019-08-01 01:01:37','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(17,'2019-08-01 02:33:26','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(18,'2019-08-01 02:36:38','Admin','New Contact Added Fortune4 Technologies [CID: 3]',1,'114.79.137.193'),
(19,'2019-08-01 04:17:10','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(20,'2019-08-01 04:21:55','Admin','Failed Login admin@admin.com',0,'114.79.137.193'),
(21,'2019-08-01 04:22:04','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(22,'2019-08-01 04:22:34','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(23,'2019-08-01 04:23:05','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(24,'2019-08-01 07:39:53','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(25,'2019-08-01 07:40:09','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(26,'2019-08-01 07:40:28','Admin','Failed Login admin@admin.com',0,'114.79.137.193'),
(27,'2019-08-01 07:40:33','Admin','Failed Login admin@admin.com',0,'114.79.137.193'),
(28,'2019-08-02 00:20:38','Admin','Login Successful admin@admin.com',1,'103.66.96.230'),
(29,'2019-08-02 01:36:46','Admin','Login Successful admin@admin.com',1,'103.66.96.230'),
(30,'2019-08-02 02:12:38','Admin','Login Successful admin@admin.com',1,'182.75.219.226'),
(31,'2019-08-02 02:47:26','Admin','Login Successful admin@admin.com',1,'103.66.96.230'),
(32,'2019-08-02 02:57:45','Admin','Login Successful admin@admin.com',1,'182.75.219.226'),
(33,'2019-08-02 06:11:57','Admin','Login Successful admin@admin.com',1,'182.75.219.226'),
(34,'2019-08-02 06:39:32','Admin','Login Successful admin@admin.com',1,'182.75.219.226'),
(35,'2019-08-05 02:58:50','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(36,'2019-08-05 03:01:28','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(37,'2019-08-05 03:16:54','Admin','New Contact Added Sagar [CID: 4]',1,'114.79.137.193'),
(38,'2019-08-05 03:22:36','Admin','New Deposit: Invoice 2 Payment [TrID: 1 | Amount: 100]',1,'114.79.137.193'),
(39,'2019-08-05 04:19:42','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(48,'2019-08-07 01:45:14','Admin','New Deposit: Invoice 3 Payment [TrID: 2 | Amount: 109]',1,'114.79.137.193'),
(49,'2019-08-07 01:55:12','Admin','New Deposit: nhkk [TrID: 3 | Amount: 100]',1,'114.79.137.193'),
(50,'2019-08-07 01:55:27','Admin','New Expense: nhkk [TrID: 4 | Amount: 10]',1,'114.79.137.193'),
(51,'2019-08-07 02:53:11','Admin','Login Successful admin@admin.com',1,'27.106.26.202'),
(52,'2019-08-07 06:04:36','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(53,'2019-08-07 06:57:14','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(54,'2019-08-07 08:21:25','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(55,'2019-08-08 03:02:31','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(56,'2019-08-08 03:45:21','Admin','Login Successful admin@admin.com',1,'27.106.26.202'),
(57,'2019-08-08 05:16:31','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(58,'2019-08-09 00:14:35','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(59,'2019-08-09 02:03:49','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(60,'2019-08-09 06:00:03','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(61,'2019-08-09 06:00:03','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(62,'2019-08-12 01:57:11','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(63,'2019-08-12 05:02:33','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(64,'2019-08-12 05:02:33','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(65,'2019-08-12 05:46:43','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(66,'2019-08-12 08:34:25','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(67,'2019-08-13 04:35:38','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(68,'2019-08-13 06:03:26','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(69,'2019-08-14 07:48:37','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(70,'2019-08-14 09:02:16','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(71,'2019-08-16 02:27:09','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(72,'2019-08-16 04:25:30','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(73,'2019-08-16 09:08:48','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(74,'2019-08-26 01:56:29','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(75,'2019-08-26 02:40:20','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(76,'2019-08-26 04:26:49','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(77,'2019-08-26 06:00:42','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(78,'2019-08-27 04:24:38','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(79,'2019-08-27 08:59:58','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(80,'2019-08-28 01:29:18','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(81,'2019-08-28 03:24:52','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(82,'2019-10-07 03:18:20','Admin','Login Successful admin@admin.com',1,'114.79.137.193'),
(83,'2021-04-27 05:23:04','Admin','Failed Login admin@admin.com',0,'103.220.41.136'),
(84,'2021-04-27 05:23:20','Admin','Failed Login admin@admin.com',0,'103.220.41.136'),
(85,'2021-04-27 05:23:37','Admin','Login Successful admin@admin.com',1,'103.220.41.136'),
(86,'2021-04-27 06:33:40','Admin','Login Successful admin@admin.com',1,'103.220.41.136'),
(87,'2021-04-27 06:39:13','Admin','Login Successful admin@admin.com',1,'103.220.41.136');

/*Table structure for table `sys_orders` */

DROP TABLE IF EXISTS `sys_orders`;

CREATE TABLE `sys_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordernum` varchar(50) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sales_person` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `date_expiry` date DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `stitle` varchar(200) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `recurring` decimal(16,2) NOT NULL DEFAULT 0.00,
  `setup_fee` decimal(16,2) NOT NULL DEFAULT 0.00,
  `billing_cycle` text DEFAULT NULL,
  `addon_ids` text DEFAULT NULL,
  `related_orders` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `upgrade_ids` text DEFAULT NULL,
  `xdata` text DEFAULT NULL,
  `xsecret` varchar(100) DEFAULT NULL,
  `promo_code` text DEFAULT NULL,
  `promo_type` text DEFAULT NULL,
  `promo_value` text DEFAULT NULL,
  `payment_method` text DEFAULT NULL,
  `ipaddress` text DEFAULT NULL,
  `fraud_module` text DEFAULT NULL,
  `fraud_output` text DEFAULT NULL,
  `activation_subject` text DEFAULT NULL,
  `activation_message` text DEFAULT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  `c1` text DEFAULT NULL,
  `c2` text DEFAULT NULL,
  `c3` text DEFAULT NULL,
  `c4` text DEFAULT NULL,
  `c5` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_orders` */

insert  into `sys_orders`(`id`,`ordernum`,`source`,`status`,`sales_person`,`branch_name`,`cname`,`cid`,`contract_id`,`bid`,`date_added`,`date_expiry`,`pid`,`stitle`,`sid`,`iid`,`aid`,`amount`,`recurring`,`setup_fee`,`billing_cycle`,`addon_ids`,`related_orders`,`description`,`upgrade_ids`,`xdata`,`xsecret`,`promo_code`,`promo_type`,`promo_value`,`payment_method`,`ipaddress`,`fraud_module`,`fraud_output`,`activation_subject`,`activation_message`,`trash`,`archived`,`c1`,`c2`,`c3`,`c4`,`c5`) values 
(1,'1667960024',NULL,'Active',NULL,NULL,'Sagar',4,NULL,NULL,'2019-08-05',NULL,1,'Laptop',NULL,2,NULL,100.00,0.00,0.00,'One Time',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Laptop Ordered!','Your Laptop is ready to deliver',0,0,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `sys_permissions` */

DROP TABLE IF EXISTS `sys_permissions`;

CREATE TABLE `sys_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(200) DEFAULT NULL,
  `shortname` varchar(200) DEFAULT NULL,
  `available` int(1) NOT NULL DEFAULT 0,
  `core` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `sys_permissions` */

insert  into `sys_permissions`(`id`,`pname`,`shortname`,`available`,`core`) values 
(1,'Customers','customers',0,1),
(2,'Companies','companies',0,1),
(3,'Transactions','transactions',0,1),
(4,'Sales','sales',0,1),
(5,'Bank & Cash','bank_n_cash',0,1),
(6,'Products & Services','products_n_services',0,1),
(7,'Reports','reports',0,1),
(8,'Utilities','utilities',0,1),
(9,'Appearance','appearance',0,1),
(10,'Plugins','plugins',0,1),
(11,'Calendar','calendar',0,1),
(12,'Leads','leads',0,1),
(13,'Tasks','tasks',0,1),
(14,'Contracts','contracts',0,1),
(15,'Orders','orders',0,1),
(16,'Settings','settings',0,1),
(17,'Documents','documents',0,1);

/*Table structure for table `sys_pg` */

DROP TABLE IF EXISTS `sys_pg`;

CREATE TABLE `sys_pg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `settings` text NOT NULL,
  `value` text NOT NULL,
  `processor` text NOT NULL,
  `ins` text NOT NULL,
  `c1` text NOT NULL,
  `c2` text NOT NULL,
  `c3` text NOT NULL,
  `c4` text NOT NULL,
  `c5` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `sorder` int(2) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `mode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gateway_setting` (`name`(32),`processor`(32)),
  KEY `setting_value` (`processor`(32),`ins`(32))
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `sys_pg` */

insert  into `sys_pg`(`id`,`name`,`settings`,`value`,`processor`,`ins`,`c1`,`c2`,`c3`,`c4`,`c5`,`status`,`sorder`,`logo`,`mode`) values 
(1,'Paypal','Paypal Email','demo@example.com','paypal','Invoices','USD','1','','','','Active',1,NULL,NULL),
(2,'Stripe','API Key','hkhk','stripe','','USD','','','','','Active',2,NULL,''),
(3,'Bank / Cash','Instructions','Make a Payment to Our Bank Account <br>Bank Name : ICICI bank <br>Account Name: XYZ compnay <br>Account Number: 1505XXXXXXXX <br>','manualpayment','','','','','','','Active',3,NULL,''),
(4,'Authorize.net','API_LOGIN_ID','Insert API Login ID here','authorize_net','','Insert Transaction Key Here','','','','','Active',4,NULL,NULL),
(5,'Braintree','Merchant ID','your merchant id','braintree','','your public key','your private key','bank account','sandbox','','Inactive',5,NULL,NULL);

/*Table structure for table `sys_pl` */

DROP TABLE IF EXISTS `sys_pl`;

CREATE TABLE `sys_pl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `build` int(10) DEFAULT 1,
  `c1` text DEFAULT NULL,
  `c2` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_pl` */

/*Table structure for table `sys_pmethods` */

DROP TABLE IF EXISTS `sys_pmethods`;

CREATE TABLE `sys_pmethods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `sys_pmethods` */

insert  into `sys_pmethods`(`id`,`name`,`sorder`) values 
(1,'Cash',1),
(2,'Check',4),
(3,'Credit Card',5),
(4,'Debit',6),
(5,'Electronic Transfer',7),
(9,'Paypal',2),
(10,'ATM Withdrawals',3);

/*Table structure for table `sys_quoteitems` */

DROP TABLE IF EXISTS `sys_quoteitems`;

CREATE TABLE `sys_quoteitems` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `qid` int(10) NOT NULL,
  `itemcode` text NOT NULL,
  `description` text NOT NULL,
  `qty` text NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `taxable` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_quoteitems` */

/*Table structure for table `sys_quotes` */

DROP TABLE IF EXISTS `sys_quotes`;

CREATE TABLE `sys_quotes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `stage` enum('Draft','Delivered','On Hold','Accepted','Lost','Dead') NOT NULL,
  `validuntil` date NOT NULL,
  `userid` int(10) NOT NULL,
  `invoicenum` text NOT NULL,
  `cn` text NOT NULL,
  `account` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `companyname` text NOT NULL,
  `email` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postcode` text NOT NULL,
  `country` text NOT NULL,
  `phonenumber` text NOT NULL,
  `currency` int(10) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` text NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `taxname` text NOT NULL,
  `taxrate` decimal(10,2) NOT NULL,
  `tax1` decimal(10,2) NOT NULL,
  `tax2` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `proposal` text NOT NULL,
  `customernotes` text NOT NULL,
  `adminnotes` text NOT NULL,
  `datecreated` date NOT NULL,
  `lastmodified` date NOT NULL,
  `datesent` date NOT NULL,
  `dateaccepted` date NOT NULL,
  `vtoken` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_quotes` */

/*Table structure for table `sys_roles` */

DROP TABLE IF EXISTS `sys_roles`;

CREATE TABLE `sys_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_roles` */

insert  into `sys_roles`(`id`,`rname`) values 
(1,'Employee');

/*Table structure for table `sys_sales` */

DROP TABLE IF EXISTS `sys_sales`;

CREATE TABLE `sys_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT 0,
  `oid` int(11) NOT NULL DEFAULT 0,
  `oname` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `amount` decimal(14,2) NOT NULL,
  `term` varchar(100) NOT NULL,
  `milestone` varchar(100) NOT NULL,
  `p` int(11) NOT NULL,
  `o` int(11) NOT NULL,
  `open` date NOT NULL,
  `close` date NOT NULL,
  `status` enum('New','In Progress','Won','Lost') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_sales` */

/*Table structure for table `sys_schedule` */

DROP TABLE IF EXISTS `sys_schedule`;

CREATE TABLE `sys_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` mediumtext NOT NULL,
  `val` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `sys_schedule` */

insert  into `sys_schedule`(`id`,`cname`,`val`) values 
(1,'accounting_snapshot','Active'),
(2,'recurring_invoice','Active'),
(3,'notify','Active'),
(4,'notifyemail','demo@example.com');

/*Table structure for table `sys_schedulelogs` */

DROP TABLE IF EXISTS `sys_schedulelogs`;

CREATE TABLE `sys_schedulelogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `logs` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `sys_schedulelogs` */

insert  into `sys_schedulelogs`(`id`,`date`,`logs`) values 
(4,'2015-03-14','2015-03-14 20:17:15 : Schedule Jobs Started....... <br>2015-03-14 20:17:15 : Creating Accounting Snapshot <br>2015-03-14 20:17:15 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2015-03-13<br>Total Income: Tk. 0.00<br>Total Expense: Tk. 0.00<br>================================================== <br>2015-03-14 20:17:15 : Creating Recurring Invoice <br>2015-03-14 20:17:15 : 1 Invoice created! <br>================================================== <br>');

/*Table structure for table `sys_staffpermissions` */

DROP TABLE IF EXISTS `sys_staffpermissions`;

CREATE TABLE `sys_staffpermissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `shortname` varchar(50) DEFAULT NULL,
  `can_view` int(1) NOT NULL DEFAULT 0,
  `can_edit` int(1) NOT NULL DEFAULT 0,
  `can_create` int(1) NOT NULL DEFAULT 0,
  `can_delete` int(1) NOT NULL DEFAULT 0,
  `all_data` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_staffpermissions` */

/*Table structure for table `sys_tags` */

DROP TABLE IF EXISTS `sys_tags`;

CREATE TABLE `sys_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_tags` */

/*Table structure for table `sys_tasks` */

DROP TABLE IF EXISTS `sys_tasks`;

CREATE TABLE `sys_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `oid` int(11) NOT NULL DEFAULT 0,
  `iid` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL DEFAULT 0,
  `tid` int(11) NOT NULL DEFAULT 0,
  `eid` int(11) NOT NULL DEFAULT 0,
  `pid` int(11) NOT NULL DEFAULT 0,
  `did` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `subscribers` text DEFAULT NULL,
  `assigned_to` text DEFAULT NULL,
  `priority` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `vtoken` varchar(50) DEFAULT NULL,
  `ptoken` varchar(50) DEFAULT NULL,
  `started` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `stime` varchar(50) DEFAULT NULL,
  `dtime` varchar(50) DEFAULT NULL,
  `time_spent` varchar(50) DEFAULT NULL,
  `date_finished` date DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT 0,
  `finished` int(1) NOT NULL DEFAULT 0,
  `ratings` varchar(50) DEFAULT NULL,
  `rel_type` varchar(50) DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `is_public` int(1) NOT NULL DEFAULT 0,
  `billable` int(1) NOT NULL DEFAULT 0,
  `billed` int(1) NOT NULL DEFAULT 0,
  `hourly_rate` decimal(14,2) NOT NULL DEFAULT 0.00,
  `milestone` int(11) DEFAULT NULL,
  `progress` int(3) DEFAULT NULL,
  `visible_to_client` int(1) NOT NULL DEFAULT 0,
  `notification` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_tasks` */

/*Table structure for table `sys_tax` */

DROP TABLE IF EXISTS `sys_tax`;

CREATE TABLE `sys_tax` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `aid` int(11) NOT NULL,
  `bal` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `state_country` (`state`(32),`country`(2))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sys_tax` */

insert  into `sys_tax`(`id`,`name`,`state`,`country`,`rate`,`aid`,`bal`) values 
(1,'Sales Tax','','',1.50,0,0.00),
(2,'CGST','','',9.00,1,0.00);

/*Table structure for table `sys_transactions` */

DROP TABLE IF EXISTS `sys_transactions`;

CREATE TABLE `sys_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(200) NOT NULL,
  `type` enum('Income','Expense','Transfer') NOT NULL,
  `category` varchar(200) DEFAULT NULL,
  `amount` decimal(18,2) NOT NULL,
  `payer` varchar(200) DEFAULT NULL,
  `payee` varchar(200) DEFAULT NULL,
  `payerid` int(11) NOT NULL DEFAULT 0,
  `payeeid` int(11) NOT NULL DEFAULT 0,
  `method` varchar(200) DEFAULT NULL,
  `ref` varchar(200) DEFAULT NULL,
  `status` enum('Cleared','Uncleared','Reconciled','Void') NOT NULL DEFAULT 'Cleared',
  `description` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `tax` decimal(18,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `dr` decimal(18,2) NOT NULL DEFAULT 0.00,
  `cr` decimal(18,2) NOT NULL DEFAULT 0.00,
  `bal` decimal(18,2) NOT NULL DEFAULT 0.00,
  `iid` int(11) NOT NULL DEFAULT 0,
  `currency` int(11) NOT NULL DEFAULT 0,
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT 1.0000,
  `base_amount` decimal(16,4) NOT NULL DEFAULT 0.0000,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `vid` int(11) NOT NULL DEFAULT 0,
  `aid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `attachments` text DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `rid` int(11) NOT NULL DEFAULT 0,
  `pid` int(11) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0,
  `flag` int(1) NOT NULL DEFAULT 0,
  `c1` text DEFAULT NULL,
  `c2` text DEFAULT NULL,
  `c3` text DEFAULT NULL,
  `c4` text DEFAULT NULL,
  `c5` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `sys_transactions` */

insert  into `sys_transactions`(`id`,`account`,`type`,`category`,`amount`,`payer`,`payee`,`payerid`,`payeeid`,`method`,`ref`,`status`,`description`,`tags`,`tax`,`date`,`dr`,`cr`,`bal`,`iid`,`currency`,`currency_symbol`,`currency_prefix`,`currency_suffix`,`currency_rate`,`base_amount`,`company_id`,`vid`,`aid`,`created_at`,`updated_at`,`updated_by`,`attachments`,`source`,`rid`,`pid`,`archived`,`trash`,`flag`,`c1`,`c2`,`c3`,`c4`,`c5`) values 
(1,'ICICI Test','Income','Regular Income',100.00,'','',4,0,'Cash','','Cleared','Invoice 2 Payment','',0.00,'2019-08-05',0.00,100.00,100.00,2,0,NULL,NULL,NULL,1.0000,0.0000,0,0,0,NULL,'2019-08-05 03:22:36',0,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL),
(2,'ICICI Test','Income','Regular Income',109.00,'','',4,0,'Cash','','Cleared','Invoice 3 Payment','',0.00,'2019-08-07',0.00,109.00,209.00,3,0,NULL,NULL,NULL,1.0000,0.0000,0,0,0,NULL,'2019-08-07 01:45:14',0,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL),
(3,'ICICI Test','Income','Uncategorized',100.00,'','',0,0,'','','Cleared','nhkk','',0.00,'2019-08-07',0.00,100.00,309.00,0,0,NULL,NULL,NULL,1.0000,0.0000,0,0,0,NULL,'2019-08-07 01:55:12',0,'',NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL),
(4,'ICICI Test','Expense','Uncategorized',10.00,'','',0,0,'','','Cleared','nhkk','',0.00,'2019-08-07',10.00,0.00,299.00,0,0,NULL,NULL,NULL,1.0000,0.0000,0,0,0,NULL,'2019-08-07 01:55:27',0,'',NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL),
(5,'IDBI','Income','',200000.00,'','',0,0,'','','Cleared','Initial Balance','',0.00,'2019-08-16',0.00,200000.00,200000.00,0,0,NULL,NULL,NULL,1.0000,0.0000,0,0,0,NULL,'2019-08-16 09:10:49',0,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL),
(6,'IDBI','Transfer','',10000.00,'','',0,0,'Check','','Cleared','ol','',0.00,'2019-08-16',10000.00,0.00,190000.00,0,0,NULL,NULL,NULL,1.0000,0.0000,0,0,0,NULL,'2019-08-16 09:11:18',0,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL),
(7,'ICICI Test','Transfer','',10000.00,'','',0,0,'Check','','Cleared','ol','',0.00,'2019-08-16',0.00,10000.00,10299.00,0,0,NULL,NULL,NULL,1.0000,0.0000,0,0,0,NULL,'2019-08-16 09:11:19',0,NULL,NULL,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `sys_units` */

DROP TABLE IF EXISTS `sys_units`;

CREATE TABLE `sys_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `reference` varchar(200) DEFAULT NULL,
  `conversion_factor` decimal(16,2) NOT NULL DEFAULT 0.00,
  `sorder` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sys_units` */

/*Table structure for table `sys_users` */

DROP TABLE IF EXISTS `sys_users`;

CREATE TABLE `sys_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `fullname` varchar(45) NOT NULL DEFAULT '',
  `phonenumber` varchar(20) DEFAULT NULL,
  `password` mediumtext NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Full Access',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `last_login` datetime DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `creationdate` datetime NOT NULL,
  `otp` enum('Yes','No') NOT NULL DEFAULT 'No',
  `pin_enabled` enum('Yes','No') NOT NULL DEFAULT 'No',
  `pin` mediumtext NOT NULL,
  `img` text NOT NULL,
  `api` enum('Yes','No') DEFAULT 'No',
  `pwresetkey` varchar(100) NOT NULL,
  `keyexpire` varchar(100) NOT NULL,
  `roleid` int(11) NOT NULL DEFAULT 0,
  `role` varchar(200) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `autologin` varchar(200) DEFAULT NULL,
  `at` varchar(200) DEFAULT NULL,
  `landing_page` varchar(200) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `c1` text DEFAULT NULL,
  `c2` text DEFAULT NULL,
  `c3` text DEFAULT NULL,
  `c4` text DEFAULT NULL,
  `c5` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sys_users` */

insert  into `sys_users`(`id`,`username`,`fullname`,`phonenumber`,`password`,`user_type`,`status`,`last_login`,`email`,`creationdate`,`otp`,`pin_enabled`,`pin`,`img`,`api`,`pwresetkey`,`keyexpire`,`roleid`,`role`,`last_activity`,`autologin`,`at`,`landing_page`,`language`,`notes`,`c1`,`c2`,`c3`,`c4`,`c5`) values 
(1,'admin@admin.com','admin','','ibOFFLqnAjVwc','Admin','Active','2021-04-27 06:39:13','','2014-10-20 01:43:07','No','No','$1$ZW/.uF5.$.rwCeLiguoBzYzf3waOnY1','','No','','0',0,NULL,NULL,'pfx78vgkzves02z0vsph1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
