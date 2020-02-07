/*
SQLyog Ultimate v8.61 
MySQL - 5.5.5-10.4.11-MariaDB : Database - restaurant_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`restaurant_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `restaurant_system`;

/*Table structure for table `basic_info` */

DROP TABLE IF EXISTS `basic_info`;

CREATE TABLE `basic_info` (
  `id` int(1) NOT NULL,
  `name` varchar(40) NOT NULL,
  `title` varchar(80) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `footer_desc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `basic_info` */

insert  into `basic_info`(`id`,`name`,`title`,`twitter`,`facebook`,`instagram`,`footer_desc`,`image`) values (1,'Kusina','Kusina - Free Bootstrap 4 Template by Colorlib','tt2','fb2','insta2','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.','logo1.jpg');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categories` */

insert  into `categories`(`id`,`category_name`) values (1,'Snacks'),(2,'Veg + Non-Veg'),(3,'Rice'),(4,'Drinks'),(5,'Salad'),(6,'Desserts');

/*Table structure for table `chefs` */

DROP TABLE IF EXISTS `chefs`;

CREATE TABLE `chefs` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `title` varchar(32) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `google_plus` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `chefs` */

insert  into `chefs`(`id`,`name`,`title`,`twitter`,`facebook`,`google_plus`,`instagram`,`image`) values (1,'Chef1','Head','twitter','facebook','google_plus','insta','chef1.jpg'),(2,'Chef2','Co-Founder','twitter','facebook','google_plus','insta','chef2.jpg'),(3,'Chef3','Founder','twitter','facebook','google_plus','insta','chef3.jpg'),(4,'Chef4','Chef','twitter','facebook','google_plus','insta','chef4.jpg');

/*Table structure for table `contact_info` */

DROP TABLE IF EXISTS `contact_info`;

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact_info` */

insert  into `contact_info`(`id`,`email`,`website`,`phone`,`address`) values (1,'info@yoursite.com','yoursite.com','+ 1235 2355 98','198 West 21th Street, Suite 721 New York NY 10016');

/*Table structure for table `facts` */

DROP TABLE IF EXISTS `facts`;

CREATE TABLE `facts` (
  `years` int(4) NOT NULL,
  `customers` int(8) NOT NULL,
  `projects` int(8) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `facts` */

insert  into `facts`(`years`,`customers`,`projects`,`days`) values (189,20000,564,300);

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_date` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `invoices` */

insert  into `invoices`(`id`,`invoice_date`,`total`) values (1,'At 12:39:43 PM on Wednesday 15th of January 2020',88),(2,'At 10:18:47 AM on Thursday 16th of January 2020',110),(3,'At 10:33:06 AM on Thursday 16th of January 2020',132),(4,'At 10:43:04 AM on Thursday 16th of January 2020',66),(5,'At 10:52:39 AM on Thursday 16th of January 2020',33),(6,'At 04:03:07 PM on Monday 27th of January 2020',246),(7,'At 11:24:48 AM on Tuesday 28th of January 2020',132),(8,'At 11:17:36 AM on Friday 31st of January 2020',110),(9,'At 01:15:18 PM on Thursday 6th of February 2020',181);

/*Table structure for table `invoices_details` */

DROP TABLE IF EXISTS `invoices_details`;

CREATE TABLE `invoices_details` (
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `invoices_details` */

insert  into `invoices_details`(`invoice_id`,`item_id`,`item_name`,`item_price`,`item_quantity`) values (1,17,'Kashmiri Chai',8,5),(1,27,'Cake',40,1),(2,11,'Chicken Biryani',40,2),(2,7,'Aloo Mutter ',20,1),(3,11,'Chicken Biryani',40,3),(4,18,'Coffee',8,5),(4,22,'Green Salad',20,1),(5,15,'Green Tea',10,3),(6,11,'Chicken Biryani',40,4),(6,17,'Kashmiri Chai',8,3),(6,27,'Cake',40,1),(7,6,'Mix Vegetables',20,4),(7,15,'Green Tea',10,4),(8,4,'Chicken Roll',10,6),(8,15,'Green Tea',10,4),(9,15,'Green Tea',10,4),(9,23,'Russian Salad',25,5);

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(40) NOT NULL,
  `item_price` int(8) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `items` */

insert  into `items`(`id`,`item_name`,`item_price`,`item_desc`,`item_image`,`status`,`c_id`) values (1,'Chaat',10,'Savoury snacks, typically served','snack-1.jpg',1,1),(2,'Samosa',5,'Fried or baked pastry with a savoury filling','snack-2.jpg',1,1),(3,'Sandwiches',10,'Bread, meat, cheese, salad vegetables','snack-3.jpg',1,1),(4,'Chicken Roll',10,'Chicken Spring Roll','snack-4.jpg',1,1),(5,'Daal',20,'Dried, split pulses','veg-non-veg-1.jpg',1,2),(6,'Mix Vegetables',20,'All-time favorite mixed vegetable curry','veg-non-veg-2.jpg',1,2),(7,'Aloo Mutter ',20,'Potatoes and peas in a spiced creamy tomato based sauce','veg-non-veg-3.jpg',1,2),(8,'Chicken Handi',30,'Chicken in a special vessel','veg-non-veg-4.jpg',1,2),(9,'Chicken Karahi',35,'Notable for its spicy taste','veg-non-veg-5.jpg',1,2),(10,'Mutton Karahi',50,'Mutton in a wok-like pan','veg-non-veg-6.jpg',1,2),(11,'Chicken Biryani',40,'Crazy tender bites of chicken in a deliciously spiced and fragrant rice.','rice-1.jpg',1,3),(12,'Chinese Rice',30,'Chopped onion, egg, vegetables','rice-2.jpg',1,3),(13,'White Rice',20,'Simple White Rice','rice-3.jpg',1,3),(14,'Chicken Pulao',40,'Chicken, ginger-garlic paste, yogurt','rice-4.jpg',1,3),(15,'Green Tea',10,'A popular health trend','drink-1.jpg',1,4),(16,'Chai',5,'Flavoured tea beverage','drink-2.jpg',1,4),(17,'Kashmiri Chai',8,'Made with gunpowder tea, milk and baking soda.','drink-3.jpg',1,4),(18,'Coffee',8,'Cappuccino','drink-4.jpg',1,4),(19,'Banana Smoothie',15,'Deliciously thick and creamy!','drink-5.jpg',1,4),(20,'Lemonade',10,'Sugar, Water, Lemon juice','drink-6.jpg',1,4),(21,'Orange Juice',10,'Image of refreshment, packed with vitamins','drink-7.jpg',1,4),(22,'Green Salad',20,'Ready-to-eat food','salad-1.jpg',1,5),(23,'Russian Salad',25,'A Traditional salad dish in Russian cuisine','salad-2.jpg',1,5),(24,'Chopped Salad',25,'A delicious blend of flavors and textures','salad-3.jpg',1,5),(25,'Celery Salad',25,'Sliced celery, red onion & diced soppressata','salad-4.jpg',1,5),(26,'Greek Cucumber Salad',25,'Mix red onion slices, chopped cucumber','salad-5.jpg',1,5),(27,'Cake',40,'Flour, sugar, flavoring, baking powder','dessert-1.jpg',1,6),(28,'Chocolate Brownie',25,'Nuts, frosting, cream cheese, chocolate chips','dessert-2.jpg',1,6),(29,'Gajar Ka Halwa',30,'Carrot-based sweet dessert pudding','dessert-3.jpg',1,6),(30,'Ras Malai',30,'A rich cheese cake without a crust','dessert-4.jpg',1,6),(31,'Gulab Jamun',5,'A milk-solid-based sweet','dessert-5.jpg',1,6),(32,'Barfi',5,'A dense milk-based sweet','dessert-6.jpg',1,6),(33,'Jalebi',10,'Thin & Crispy Homemade Jalebi','dessert-7.jpg',1,6),(34,'Potato Chips',10,'Crispy, deep fried','5e0b69768a8d65.36677732.jpg',1,1),(35,'Cookies',10,'Flour, sugar and oil','5e0b69940ae695.38899405.jpg',1,1);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`id`,`username`,`password`) values (1,'admin','39ecfad9792351673ed62ca0037b0761');

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `is_read` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `messages` */

insert  into `messages`(`id`,`name`,`email`,`subject`,`message`,`date`,`is_read`) values (1,'First Message','fm@gmail.com','First Message Subject','ndlfkdnflsnoiwfndned\r\n','At 05:57:44 PM on Tuesday 31st of December 2019',1),(2,'Second Message','sm@gmail.com','Second Message Subject','ndlfkdnflsnoiwfndned\r\n','At 05:57:44 PM on Tuesday 31st of December 2019',1),(3,'Third Message','tm@gmail.com','Third Message Subject','asdnasdwqdnwkda','At 06:07:37 PM on Tuesday 31st of December 2019',1),(4,'Fourth Message','fm@gmail.com','Fourth Message Subject','asds dsdsasdas','At 06:18:39 PM on Tuesday 31st of December 2019',1),(5,'raja','zainalidev@gmail.com','hello ','hi\r\n','At 12:34:33 PM on Wednesday 15th of January 2020',1),(6,'Santosh','sansd@gmail.com','Just a try','asmdaskdnowqdnqwewmeqpweqweqw111111111111111111','At 08:14:52 AM on Thursday 16th of January 2020',1),(7,'ABS','asdas@dsda.cdd','asdsad','dwrq rwef rerbfdfv f fv','At 10:14:44 AM on Thursday 16th of January 2020',1),(8,'Yasir','adsashd2@asdas.csd','Testing','asdkasndm aslkdas','At 10:28:18 AM on Thursday 16th of January 2020',1),(9,'Yusra','sda@sdas.cdd','Testing Purpose','dsdwe s d','At 10:44:59 AM on Thursday 16th of January 2020',1),(10,'osama','adjaskld@ghj.nh','msg','hell world','At 11:05:10 AM on Thursday 16th of January 2020',1),(11,'Sujeet','sujeet@gmail.com','ssdnaksdnas dd wdqwd','qweelknqepne 3kem3pe 23lk32','At 04:02:06 PM on Monday 27th of January 2020',1),(12,'Mariam','mariam@gmail.com','wajeoiaw ','asdjasoidasiodsaiod','At 11:23:32 AM on Tuesday 28th of January 2020',1),(13,'Moiz','Moiz@sadas.com','Subject','asdasssss','At 08:37:26 AM on Wednesday 29th of January 2020',1),(14,'Moiz2z','moiz@sadasdada.cdom','Subject','asdasdasddas','At 08:38:19 AM on Wednesday 29th of January 2020',1),(15,'asdasdsadasd','asdasdasdasdsad@asdsa.csd','B','sadasdsadas','At 08:38:56 AM on Wednesday 29th of January 2020',1),(16,'Laiba','laiba@asdas.com','C','sdasmdlkasdas','At 11:19:06 AM on Friday 31st of January 2020',1),(17,'gjhb','bkjnkjn@jnkjn.nhn','B','uhhynun8yn8y hu g ','At 01:16:30 PM on Thursday 6th of February 2020',1);

/*Table structure for table `open_hours` */

DROP TABLE IF EXISTS `open_hours`;

CREATE TABLE `open_hours` (
  `mon_from` varchar(40) NOT NULL,
  `mon_to` varchar(40) NOT NULL,
  `tues_from` varchar(40) NOT NULL,
  `tues_to` varchar(40) NOT NULL,
  `wed_from` varchar(40) NOT NULL,
  `wed_to` varchar(40) NOT NULL,
  `thurs_from` varchar(40) NOT NULL,
  `thurs_to` varchar(40) NOT NULL,
  `fri_from` varchar(40) NOT NULL,
  `fri_to` varchar(40) NOT NULL,
  `sat_from` varchar(40) NOT NULL,
  `sat_to` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `open_hours` */

insert  into `open_hours`(`mon_from`,`mon_to`,`tues_from`,`tues_to`,`wed_from`,`wed_to`,`thurs_from`,`thurs_to`,`fri_from`,`fri_to`,`sat_from`,`sat_to`) values ('09:00','10:00','11:00','12:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00');

/*Table structure for table `reservations` */

DROP TABLE IF EXISTS `reservations`;

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `book_time_from` varchar(255) NOT NULL,
  `book_time_to` varchar(255) NOT NULL,
  `table_no` int(2) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reservations` */

insert  into `reservations`(`id`,`name`,`email`,`phone`,`book_time_from`,`book_time_to`,`table_no`,`date`) values (1,'Person1',NULL,NULL,'4:00pm','6:00pm',1,'05-01-2020'),(2,'Person2',NULL,NULL,'5:00pm','6:00pm',3,'05-01-2020');

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `review` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`name`,`position`,`review`,`image`) values (1,'First Person','Customer','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.','review-1.jpg'),(2,'Second Person','Customer2','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.','review-2.jpg'),(3,'Third Person','Customer3','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.','review-3.jpg'),(4,'Fourth Person','Customer4','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.','review-4.jpg'),(5,'Fifth Person','Customer5','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.','review-5.jpg');

/*Table structure for table `tables` */

DROP TABLE IF EXISTS `tables`;

CREATE TABLE `tables` (
  `table_no` int(3) NOT NULL,
  `table_capacity` int(3) NOT NULL,
  PRIMARY KEY (`table_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tables` */

insert  into `tables`(`table_no`,`table_capacity`) values (1,2),(2,2),(3,3),(4,3),(5,4),(6,4),(7,4),(8,5),(9,6),(10,8);

/*Table structure for table `transactions_cart` */

DROP TABLE IF EXISTS `transactions_cart`;

CREATE TABLE `transactions_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` text NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transactions_cart` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
