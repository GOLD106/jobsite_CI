/*Table structure for table `time_zone` */

DROP TABLE IF EXISTS `time_zone`;

CREATE TABLE `time_zone` (
  `code` varchar(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `time_zone` */

insert  into `time_zone`(`code`,`name`) values 
('-1','[UTC - 1] Azores Standard Time'),
('-10','[UTC - 10] Hawaii-Aleutian Sta'),
('-11','[UTC - 11] Niue Time, Samoa St'),
('-12','[UTC - 12] Baker Island Time'),
('-2','[UTC - 2] Fernando de Noronha '),
('-3','[UTC - 3] Amazon Standard Time'),
('-3.5','[UTC - 3:30] Newfoundland Stan'),
('-4','[UTC - 4] Atlantic Standard Ti'),
('-4.5','[UTC - 4:30] Venezuelan Standa'),
('-5','[UTC - 5] Eastern Standard Tim'),
('-6','[UTC - 6] Central Standard Tim'),
('-7','[UTC - 7] Mountain Standard Ti'),
('-8','[UTC - 8] Pacific Standard Tim'),
('-9','[UTC - 9] Alaska Standard Time'),
('-9.5','[UTC - 9:30] Marquesas Islands'),
('0','[UTC] Western European Time, G'),
('1','[UTC + 1] Central European Tim'),
('10','[UTC + 10] Australian Eastern '),
('10.5','[UTC + 10:30] Lord Howe Standa'),
('11','[UTC + 11] Solomon Island Time'),
('11.5','[UTC + 11:30] Norfolk Island T'),
('12','[UTC + 12] New Zealand Time, F'),
('12.75','[UTC + 12:45] Chatham Islands '),
('13','[UTC + 13] Tonga Time, Phoenix'),
('14','[UTC + 14] Line Island Time'),
('2','[UTC + 2] Eastern European Tim'),
('3','[UTC + 3] Moscow Standard Time'),
('3.5','[UTC + 3:30] Iran Standard Tim'),
('4','[UTC + 4] Gulf Standard Time, '),
('4.5','[UTC + 4:30] Afghanistan Time'),
('5','[UTC + 5] Pakistan Standard Ti'),
('5.5','[UTC + 5:30] Indian Standard T'),
('5.75','[UTC + 5:45] Nepal Time'),
('6','[UTC + 6] Bangladesh Time, Bhu'),
('6.5','[UTC + 6:30] Cocos Islands Tim'),
('7','[UTC + 7] Indochina Time, Kras'),
('8','[UTC + 8] Chinese Standard Tim'),
('8.75','[UTC + 8:45] Southeastern West'),
('9','[UTC + 9] Japan Standard Time,'),
('9.5','[UTC + 9:30] Australian Centra');