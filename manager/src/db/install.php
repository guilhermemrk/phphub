<?php

include_once './connect.php';

$hub_users = $db->prepare("CREATE TABLE IF NOT EXISTS `hub_users` (
 `userid` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(15) NOT NULL,
 `email` varchar(100) NOT NULL,
 `pass` varchar(255) NOT NULL,
 `isActivated` tinyint(1) NOT NULL DEFAULT '0',
 `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `theme` int(11) NOT NULL DEFAULT '1',
 `notes` text,
 PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4");

$man_manager = $db->prepare("CREATE TABLE IF NOT EXISTS `man_manager` (
 `entryid` int(11) NOT NULL AUTO_INCREMENT,
 `companyid` int(11) NOT NULL,
 `problem` varchar(500) NOT NULL,
 `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `status` varchar(2) NOT NULL DEFAULT '1',
 `addedBy` varchar(20) NOT NULL,
 `entryCategory` int(11) NOT NULL DEFAULT '0',
 `nfe_modelo` varchar(2) NOT NULL DEFAULT '0',
 `nfe_id` varchar(10) NOT NULL DEFAULT '0',
 `nfe_nv` varchar(10) NOT NULL DEFAULT '0',
 `nfe_nf` varchar(10) NOT NULL DEFAULT '0',
 `nfe_todo` int(1) DEFAULT NULL,
 `solution` text,
 PRIMARY KEY (`entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4");

$man_entity = $db->prepare("CREATE TABLE IF NOT EXISTS `man_entity` (
 `companyid` int(11) NOT NULL AUTO_INCREMENT,
 `companyName` varchar(100) NOT NULL,
 `phone` varchar(16) DEFAULT NULL,
 `emailPrimary` varchar(50) DEFAULT NULL,
 `isActive` tinyint(1) NOT NULL DEFAULT '1',
 `addedBy` varchar(20) NOT NULL,
 `emailAccountant` varchar(50) DEFAULT NULL,
 `city` int(11) DEFAULT '0',
 `phoneSec` varchar(16) DEFAULT NULL,
 `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `remoteLink` text,
 `sped` tinyint(1) NOT NULL DEFAULT '0',
 `sped_status` int(11) NOT NULL DEFAULT '0',
 `sped_user` text,
 PRIMARY KEY (`companyid`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4");

$man_cep = $db->prepare("CREATE TABLE IF NOT EXISTS `man_cep` (
 `cityid` int(11) NOT NULL,
 `cityName` varchar(30) NOT NULL,
 `cityState` varchar(30) NOT NULL,
 `cityCountry` varchar(30) NOT NULL,
 `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`cityid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$man_commonerrors = $db->prepare("CREATE TABLE IF NOT EXISTS `man_commonerrors` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(30) NOT NULL,
 `description` text,
 `errorMessage` text,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4");

$man_spedhistory = $db->prepare("CREATE TABLE IF NOT EXISTS `man_spedhistory` (
 `companyID` int(11) NOT NULL,
 `timePeriod` text NOT NULL,
 `spedStatus` int(11) NOT NULL,
 `spedUser` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$hub_users->execute();
$man_manager->execute();
$man_entity->execute();
$man_cep->execute();
$man_commonerrors->execute();
$man_spedhistory->execute();

header("Location: /manager/");

?>
