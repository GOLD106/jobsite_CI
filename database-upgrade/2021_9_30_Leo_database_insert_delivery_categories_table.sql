
DROP TABLE IF EXISTS `delivery_categories`;

CREATE TABLE `delivery_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `card_image` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `mobile_icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

insert  into `delivery_categories`(`id`,`unique_id`,`category_name`,`description`,`card_image`,`icon`,`image`,`thumb_image`,`mobile_icon`,`status`,`created_at`) values 
(1,'1712320226522706','Food Delivery','Food Delivery From Restaurant','uploads/delivery_category_images/1632996013banner-img1.png','uploads/delivery_category_images/1632996013banner-img3.png','uploads/delivery_category_images/1632996013banner-img.png','uploads/delivery_category_images/thu_1632996013banner-img_50_50.png','uploads/delivery_category_images/1632996013banner-img2.png',1,'2021-09-30 15:30:15'),
(2,'1712320435929642','Pharmacy Delivery','Pharmacy Delivery','uploads/delivery_category_images/1632996097young-woman-pharmacist-pharmacy1.png','uploads/delivery_category_images/1632996097young-woman-pharmacist-pharmacy3.png','uploads/delivery_category_images/1632996097young-woman-pharmacist-pharmacy.png','uploads/delivery_category_images/thu_1632996097young-woman-pharmacist-pharmacy_50_50.png','uploads/delivery_category_images/1632996097young-woman-pharmacist-pharmacy2.png',1,'2021-09-30 15:31:37'),
(3,'1712320520431441','Grocery Delivery','Grocery Delivery','uploads/delivery_category_images/1632996424banner-21.png','uploads/delivery_category_images/1632996424banner-23.png','uploads/delivery_category_images/1632996424banner-2.png','uploads/delivery_category_images/thu_1632996424banner-2_50_50.png','uploads/delivery_category_images/1632996424banner-22.png',1,'2021-09-30 15:37:05'),
(4,'1712320876843229','Transportation','Delivery Truck, Taxi, etc.','uploads/delivery_category_images/1632996564Logistics-1.png','uploads/delivery_category_images/1632996564Logistics-3.png','uploads/delivery_category_images/1632996564Logistics-.png','uploads/delivery_category_images/thu_1632996564Logistics-_50_50.png','uploads/delivery_category_images/1632996564Logistics-2.png',1,'2021-09-30 15:39:24');
