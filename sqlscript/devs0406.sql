-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2013 at 04:41 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `devs`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `description`, `status`, `date`) VALUES
(2, 'Class Room', 'This is Class Room', 1, '0000-00-00 00:00:00'),
(3, 'SpeedCentre', 'SpeedCentre', 1, '0000-00-00 00:00:00'),
(4, 'Sooty', 'Sooty', 1, '0000-00-00 00:00:00'),
(5, 'Events Centre', 'Events Centre', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_registration`
--

DROP TABLE IF EXISTS `company_registration`;
CREATE TABLE IF NOT EXISTS `company_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_feature` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `introduction_for_investors` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email1` varchar(200) NOT NULL,
  `email2` varchar(200) NOT NULL,
  `company_url` varchar(100) NOT NULL,
  `facebook_url_personal` varchar(250) NOT NULL,
  `facebook_url_company` varchar(250) NOT NULL,
  `vkontekte_address_personal` varchar(250) NOT NULL,
  `vkontekte_address_company` varchar(250) NOT NULL,
  `odnoklassniki_address_personal` varchar(250) NOT NULL,
  `odnoklassniki_address_company` varchar(250) NOT NULL,
  `linkedin_url` varchar(250) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `is_company_registered` tinyint(1) NOT NULL,
  `company_details` varchar(500) NOT NULL,
  `company_registration_doc` varchar(100) NOT NULL,
  `business_plans` varchar(100) NOT NULL,
  `financial_uploads` varchar(100) NOT NULL,
  `min_amount_requested` float(10,2) NOT NULL,
  `investment_towards` varchar(250) NOT NULL,
  `interested_in_incrowdsourcing` tinyint(1) NOT NULL,
  `interested_in_bd` tinyint(1) NOT NULL,
  `strategy_details` varchar(250) NOT NULL,
  `investor_preference` varchar(250) NOT NULL,
  `ideal_investor` varchar(250) NOT NULL,
  `bios_pics1` varchar(250) NOT NULL,
  `bios_pics2` varchar(250) NOT NULL,
  `bios_pics3` varchar(250) NOT NULL,
  `bios_pics4` varchar(250) NOT NULL,
  `bios_pics5` varchar(250) NOT NULL,
  `current_valuation` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `major_assets` varchar(250) NOT NULL,
  `marketing_material1` varchar(250) NOT NULL,
  `marketing_material2` varchar(250) NOT NULL,
  `marketing_material3` varchar(250) NOT NULL,
  `marketing_material4` varchar(250) NOT NULL,
  `marketing_material5` varchar(250) NOT NULL,
  `feedback_upload` varchar(250) NOT NULL,
  `feedback_text` varchar(250) NOT NULL,
  `short_term_goals` varchar(500) NOT NULL,
  `companies_you_emulate` varchar(500) NOT NULL,
  `competitors` varchar(500) NOT NULL,
  `market_research` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `company_registration`
--

INSERT INTO `company_registration` (`id`, `is_feature`, `user_id`, `first_name`, `last_name`, `title`, `company_name`, `introduction_for_investors`, `type`, `address`, `city`, `state`, `country`, `zipcode`, `phone`, `email1`, `email2`, `company_url`, `facebook_url_personal`, `facebook_url_company`, `vkontekte_address_personal`, `vkontekte_address_company`, `odnoklassniki_address_personal`, `odnoklassniki_address_company`, `linkedin_url`, `twitter`, `is_company_registered`, `company_details`, `company_registration_doc`, `business_plans`, `financial_uploads`, `min_amount_requested`, `investment_towards`, `interested_in_incrowdsourcing`, `interested_in_bd`, `strategy_details`, `investor_preference`, `ideal_investor`, `bios_pics1`, `bios_pics2`, `bios_pics3`, `bios_pics4`, `bios_pics5`, `current_valuation`, `image`, `major_assets`, `marketing_material1`, `marketing_material2`, `marketing_material3`, `marketing_material4`, `marketing_material5`, `feedback_upload`, `feedback_text`, `short_term_goals`, `companies_you_emulate`, `competitors`, `market_research`, `create_date`, `status`) VALUES
(1, 0, 11, 'test', 'tera', 'Mr', 'asdfasdf', '0', 'Design and Publishing Software', 'sdasdf', 'werwe', 'asdfs', '0', 44563786, '765878676', 'manojujn@gmail.com', '', '0', '', '', '', '', '', '', '', '', 0, 'sdfgdf', '', '', '', 0.00, '', 0, 0, '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-03-30 09:14:52', 0),
(2, 0, 12, 'Manoj', 'Agrawal', 'Mr', 'Matic Technology', '0', 'Design and Publishing Software', 'sdasdf', 'Indore', 'MP', '0', 452010, '44243545', 'manojujn@gmail.com', '', '0', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0.00, '', 0, 0, '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2013-03-30 09:18:07', 0),
(3, 0, 18, 'Manish', 'Gautam', 'Mr', 'admin', 'ths', 'Digital Advertising/Marketing Technology', '42-A Prime City', 'Indore', 'Madhya Pradesh', 'India', 452001, '9926476542', 'manish4377@gmail.com', 'manish_gautam@hotmail.com', 'http://www.manishzend.com', 'zendmanish', 'Company', 'Vkontekte', 'Company Vkontekte', 'Personal Odnoklassniki Address:', 'Company Odnoklassniki Address:', 'Company Odnoklassniki Address:', 'Company Odnoklassniki Address:', 0, 'Company Odnoklassniki Address:Company Odnoklassniki Address:', '', '', '', 123333.00, '111111111', 0, 0, 'Company Odnoklassniki Address:', 'Accelerator', 'Company Odnoklassniki Address: Company Odnoklassniki Address:', '', '', '', '', '', 'Company Odnoklassniki Address:', '', 'Company Odnoklassniki Address:', '', '', '', '', '', '', 'Company Odnoklassniki Address:', 'Company Odnoklassniki Address:', 'Company Odnoklassniki Address:', 'Company Odnoklassniki Address:', 'Company Odnoklassniki Address:', '2013-03-30 08:48:35', 1),
(6, 0, 24, 'Manish', 'Gautam', 'Mr', 'admin', 'This is ID 6', 'New Media', '506 Airen Heights', 'New Gercy', 'Madhya Pradesh', 'India', 452001, '9926476542', 'mgautam@solutionsofts.com', 'manish_gautam@hotmail.com', 'http://www.manishzend.com', 'zendmanish', 'Company', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 0, 'mgautam@solutionsofts.com', '', '', '', 0.00, '111111111', 0, 0, 'mgautam@solutionsofts.com', 'Accelerator', 'mgautam@solutionsofts.com', '', '', '', '', '', 'mgautam@solutionsofts.com', '', 'mgautam@solutionsofts.com', '', '', '', '', '', '', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', '2013-04-01 05:55:41', 1),
(7, 0, 0, 'test', 'Test', 'Mr', 'test', '0', 'Gaming', 'manish', 'manish', 'manish', '0', 452001, '9926476542', 'mgautam@solutionsofts.com', 'manish_gautam@hotmail.com', '0', 'zendmanish', 'Company', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 'mgautam@solutionsofts.com', 0, 'This is test', '', '', '', 0.00, 'This is test', 0, 0, 'This is test', 'Experienced in sector', 'This is test', '', '', '', '', '', 'This is test', '', 'This is test', '', '', '', '', '', '', 'This is test', 'This is test', 'This is test', 'This is test', 'This is test', '2013-04-02 07:10:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `csubject` varchar(255) NOT NULL,
  `cmail` varchar(255) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ipaddress` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `cname`, `csubject`, `cmail`, `contactno`, `description`, `date`, `ipaddress`) VALUES
(1, 'Satya', 'Very good', 'prosatya@gmail.com', '9926048442', 'Hello Satya', '2013-03-29 18:58:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `investor_registration`
--

DROP TABLE IF EXISTS `investor_registration`;
CREATE TABLE IF NOT EXISTS `investor_registration` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `title` varchar(25) NOT NULL,
  `company` varchar(100) NOT NULL,
  `photograph` varchar(100) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_number` varchar(25) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `company_url` varchar(100) NOT NULL,
  `facebook_url` varchar(100) NOT NULL,
  `linkedin_url` varchar(100) NOT NULL,
  `state_company_registered` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `company_type` varchar(50) NOT NULL,
  `current_capitalization` varchar(10) NOT NULL,
  `seeking_company` varchar(500) NOT NULL,
  `investment_size` varchar(10) NOT NULL,
  `min_amt` varchar(10) NOT NULL,
  `max_amt` varchar(10) NOT NULL,
  `ownership_share` varchar(100) NOT NULL,
  `control_percentage` tinyint(1) NOT NULL,
  `investor_details` varchar(250) NOT NULL,
  `companies_looking` varchar(250) NOT NULL,
  `experience_in_russia` varchar(25) NOT NULL,
  `experience_in_investment` varchar(25) NOT NULL,
  `portfolio` varchar(250) NOT NULL,
  `average_roi` varchar(25) NOT NULL,
  `time_for_returns` varchar(10) NOT NULL,
  `about_investment` varchar(25) NOT NULL,
  `investing_experience` varchar(500) NOT NULL,
  `ratings` varchar(2) NOT NULL,
  `interested_in_crowdsourcing` tinyint(1) NOT NULL,
  `project_consideration` tinyint(1) NOT NULL,
  `partners_consideration` tinyint(1) NOT NULL,
  `companies_intrested_in` varchar(250) NOT NULL,
  `investment_strategies` varchar(250) NOT NULL,
  `competitors` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `is_feature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investor_registration`
--

INSERT INTO `investor_registration` (`id`, `user_id`, `first_name`, `last_name`, `title`, `company`, `photograph`, `company_logo`, `project_type`, `address`, `contact_number`, `email1`, `email2`, `skype`, `company_url`, `facebook_url`, `linkedin_url`, `state_company_registered`, `country`, `company_type`, `current_capitalization`, `seeking_company`, `investment_size`, `min_amt`, `max_amt`, `ownership_share`, `control_percentage`, `investor_details`, `companies_looking`, `experience_in_russia`, `experience_in_investment`, `portfolio`, `average_roi`, `time_for_returns`, `about_investment`, `investing_experience`, `ratings`, `interested_in_crowdsourcing`, `project_consideration`, `partners_consideration`, `companies_intrested_in`, `investment_strategies`, `competitors`, `create_date`, `status`, `is_feature`) VALUES
(1, 24, 'manish', 'gautam', 'Mr', 'SolutionSofts1', 'a.jpg', 'logo.jpg', 'Test', '506 Airen Heights', '9926476542', 'manish@gmail.com', 'manish2@gmail.com', 'manish432', 'http://www.company.com', 'www.facebook.com', 'www.linkedin.com', 'Madhya Pradesh', 'India', 'test', '23.00', 'testing seeking', '15', '25.00', '32.00', 'test ownership', 1, 'Test details', 'Test looking', 'Yes', 'Yes', 'Portfolio', 'test', 'test', 'test', 'yesy', '1', 1, 1, 1, 'yesy', 'yes', 'yes', '2013-04-11 05:22:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manage_menu`
--

DROP TABLE IF EXISTS `manage_menu`;
CREATE TABLE IF NOT EXISTS `manage_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `menu_order` tinyint(4) NOT NULL,
  `menu_parent` tinyint(4) NOT NULL,
  `is_header` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 for header menu, 0 for no header menu ',
  `is_footer` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 for footer menu, 0 for no footer menu',
  `publish` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 for active menu, 0 for active menu',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `manage_menu`
--

INSERT INTO `manage_menu` (`menu_id`, `menu_name`, `menu_order`, `menu_parent`, `is_header`, `is_footer`, `publish`, `date_created`, `modified_date`) VALUES
(1, 'Home', 0, 1, 1, 1, 1, '2013-03-25 10:47:57', '0000-00-00 00:00:00'),
(2, 'Showcase', 1, 1, 1, 1, 1, '2013-03-25 06:51:00', '2013-03-27 06:22:00'),
(3, 'Featured Investors', 0, 2, 1, 1, 1, '2013-03-25 10:53:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_relation`
--

DROP TABLE IF EXISTS `meeting_relation`;
CREATE TABLE IF NOT EXISTS `meeting_relation` (
  `meeting_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meeting_time` datetime NOT NULL,
  PRIMARY KEY (`meeting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_room`
--

DROP TABLE IF EXISTS `meeting_room`;
CREATE TABLE IF NOT EXISTS `meeting_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `click_id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_pin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_url` text NOT NULL,
  `starts_at` varchar(255) NOT NULL,
  `ends_at` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `access_type` tinyint(1) NOT NULL,
  `lobby_enabled` tinyint(1) NOT NULL,
  `lobby_description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `permanent_room` varchar(255) NOT NULL,
  `ccc` varchar(100) NOT NULL,
  `listener` varchar(255) NOT NULL,
  `presenter` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `room_url` text NOT NULL,
  `phone_presenter_pin` int(11) NOT NULL,
  `phone_listener_pin` int(11) NOT NULL,
  `embed_room_url` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 for undelete, 1 deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `meeting_room`
--

INSERT INTO `meeting_room` (`id`, `click_id`, `room_type`, `room_pin`, `name`, `name_url`, `starts_at`, `ends_at`, `description`, `access_type`, `lobby_enabled`, `lobby_description`, `status`, `created_at`, `updated_at`, `permanent_room`, `ccc`, `listener`, `presenter`, `host`, `room_url`, `phone_presenter_pin`, `phone_listener_pin`, `embed_room_url`, `is_deleted`) VALUES
(1, 87936, 'meeting', '928973956', 'Crowd Funding  Russia Event', 'sajid', '2013-04-19T08:41:00-04:00', '2013-04-19T09:41:00-04:00', 'This is test', 1, 1, '', 'active', '2013-03-18T08:32:37-04:00', '2013-03-28T23:19:11-04:00', '', '2013-04-19 12:41:00', '6732e02747a322c6eb2e1b005155082f', 'dfd20a10a2861c5d8157bd005155082f', 'a6d6bf3ac9a137d6c5d75f005155082f', 'http://firebird35.clickmeeting.com/sajid', 624631, 642492, 'https://embed.clickmeeting.com/embed_conference.html?r=152861087936', 0),
(2, 87977, 'meeting', '521851445', 'ManishGautamsoft', 'ManishGautam', '2013-03-28T13:27:00-04:00', '2013-03-28T14:27:00-04:00', 'This is test2', 1, 1, '', 'active', '2013-03-18T10:13:03-04:00', '2013-03-19T07:03:13-04:00', '', '2013-03-28 17:27:00', '964fc5ce9a1ec5e3ca635500514845f1', '883509a0bfb642a6cec15500514845f1', 'b9ec994fe1dcdcb3c386ba00514845f1', 'http://firebird35.clickmeeting.com/ManishGautam', 962276, 618911, 'https://embed.clickmeeting.com/embed_conference.html?r=152861087977', 0),
(3, 87992, 'meeting', '494811683', 'UmaSharma', 'Uma12345', '2013-04-25T08:27:00-04:00', '2013-04-25T09:27:00-04:00', 'Thi is test', 1, 1, '', 'active', '2013-03-18T10:41:47-04:00', '2013-03-19T07:07:11-04:00', '', '2013-04-25 12:27:00', '534ed7e1656a88fc12578b00514846df', '286b6de9ef3897d071440b00514846df', '446d79e0d5722b61f8fd7100514846df', 'http://firebird35.clickmeeting.com/Uma12345', 418194, 274615, 'https://embed.clickmeeting.com/embed_conference.html?r=152861087992', 0),
(4, 87993, 'meeting', '461593399', 'Yogi', 'Yogi', '2013-03-30T11:27:00-04:00', '2013-03-30T12:27:00-04:00', 'Thi is test', 1, 1, '', 'active', '2013-03-18T10:42:02-04:00', '2013-03-18T10:42:02-04:00', '', '2013-03-30 15:27:00', 'c63a6854b2d3116f6bbbd800514727ba', 'e994651e84f5184076b77100514727ba', 'fc5b819ccf209d1c7e8bd800514727ba', 'http://firebird35.clickmeeting.com/Yogi', 152416, 765527, 'https://embed.clickmeeting.com/embed_conference.html?r=152861087993', 0),
(5, 88414, 'meeting', '597559531', 'manoj', 'manoj', '2013-03-28T10:28:00-04:00', '2013-03-28T11:28:00-04:00', 'This is test', 1, 1, '', 'active', '2013-03-19T11:57:35-04:00', '2013-03-19T11:57:35-04:00', '', '2013-03-28 14:28:00', 'b8e5c0cc2d8778e3301d6c0051488aef', 'ffedb8c328ecb45bdefb2e0051488aef', '182b73f27b5a360eb7e1dc0051488aef', 'http://firebird35.clickmeeting.com/manoj', 839268, 376716, 'https://embed.clickmeeting.com/embed_conference.html?r=152861088414', 0),
(6, 91080, 'meeting', '125278286', 'AbhijeetS', 'AbhijeetS', '', '', 'This is test for abhi', 1, 1, '', 'active', '2013-03-28T13:00:18-04:00', '2013-03-28T13:00:18-04:00', '1', '', 'b80f45bb1eca6f6049e3610051547722', 'a4a936b93bf19306c74d760051547722', '15082420df42b72a8685ff0051547722', 'http://firebird35.clickmeeting.com/AbhijeetS', 226951, 323335, 'https://embed.clickmeeting.com/embed_conference.html?r=152861091080', 0),
(7, 91081, 'meeting', '665264777', 'AbhijeetSh', 'AbhijeetSh', '', '', 'This is test for abhi', 1, 1, '', 'active', '2013-03-28T13:01:53-04:00', '2013-03-28T13:01:53-04:00', '1', '', 'd23ee1d50afaa05c1331af0051547781', 'b396133724d5db480d3b2a0051547781', 'c71996320637783e31bed60051547781', 'http://firebird35.clickmeeting.com/AbhijeetSh', 383549, 111957, 'https://embed.clickmeeting.com/embed_conference.html?r=152861091081', 0),
(8, 91190, 'meeting', '188338425', 'Crowd Funding Event', 'Crowd_Funding_Event', '2013-03-26T02:07:00-04:00', '2013-03-26T03:07:00-04:00', 'Here is the detail', 1, 1, '', 'active', '2013-03-28T23:17:39-04:00', '2013-03-28T23:17:39-04:00', '', '2013-03-26 06:07:00', 'b25292958449c0ff20eba800515507d3', 'a75a84f6fcff5f4bcf717000515507d3', 'c94d9ff7e366a91cfdd0f100515507d3', 'http://firebird35.clickmeeting.com/Crowd_Funding_Event', 678895, 247218, 'https://embed.clickmeeting.com/embed_conference.html?r=152861091190', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_user`
--

DROP TABLE IF EXISTS `meeting_user`;
CREATE TABLE IF NOT EXISTS `meeting_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` text NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_heading` varchar(255) NOT NULL,
  `page_keywords` text NOT NULL,
  `page_meta` text NOT NULL,
  `page_desc` text NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 for deactive,1 for active',
  `is_news` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_name`, `page_slug`, `page_heading`, `page_keywords`, `page_meta`, `page_desc`, `publish`, `status`, `is_news`) VALUES
(1, 'Home Page', 'Home', '', 'Home', 'Home page Keywords', 'Home Page Meta', 'THis is test page', 1, 1, 1),
(2, 'Showcase', 'Showcase', '', 'Showcase', 'Showcase', 'Showcase', 'Showcase', 1, 1, 1),
(4, 'Featured Investors1', 'Featured Investors1', '', 'Featured Investors1', 'Featured Investors1', 'Featured Investors1', '<p>Featured Investors1</p>', 1, 1, 1),
(5, 'New Featured InvestorsNew Featured Investors', 'New Featured Investors1', '', 'New Featured Investors1', 'New Featured InvestorsNew Featured Investors1', 'New Featured InvestorsNew Featured Investors1', '<p><strong>New Featured Investors1&nbsp;</strong><strong>New Featured Investors1</strong></p>\n<p>\n<div style="padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; ">\n<p><strong>New Featured Investors1</strong></p>\n<p>\n<div style="padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; ">\n<p><strong>New Featured Investors1</strong><strong>New Featured Investors1</strong></p>\n</div>\n</p>\n</div>\n</p>', 1, 1, 1),
(7, 'Test1', 'Test11', '', 'Test1', 'Test1', 'Test1', '<p>Test1</p>', 3, 1, 1),
(8, 'My PageMy PageMy PageMy PageMy Page', 'My Page', '', 'My Page', 'My PageMy PageMy PageMy PageMy Page', 'My PageMy PageMy PageMy PageMy PageMy Page', '<p>&nbsp;My PageMy PageMy PageMy PageMy PageMy PageMy Page</p>', 2, 1, 1),
(9, 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', '<p>About Us</p>', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_source` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `payment_date` datetime NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `payername` varchar(255) NOT NULL,
  `payerlastname` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(255) NOT NULL,
  `plan_desc` text NOT NULL,
  `plan_amt` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 for deactive, 1 for active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan_name`, `plan_desc`, `plan_amt`, `status`) VALUES
(1, '3-Month Membership Fee', '3-Month Membership Fee, allowing you to participate in speed-funding and other investment forums:', '50', 1),
(2, 'Development of marketing materials', 'Development of marketing materials for company/project', '300', 1),
(3, 'Development of business plan/financials', 'Development of business plan/financials for company project', '300', 1),
(4, 'Featured Listing of Company', 'Featured Listing of Company on Site and in press/social media', '150', 1),
(5, 'Hire Firebird to recruit investment ', 'Hire Firebird to recruit investment  for your company on a full-time basis based on your instructions described below', '500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `slug` varchar(512) NOT NULL,
  `description` longtext NOT NULL,
  `author` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(2) NOT NULL,
  `docFile` varchar(255) NOT NULL,
  `imgFile` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `description`, `author`, `date`, `status`, `docFile`, `imgFile`) VALUES
(12, 'Outsourcing service', 'outsourcing-service', 'Outsourcing service', 18, '2013-03-24 09:56:18', 0, '', ''),
(11, 'My secont Project', 'my-secont-project', 'My secont Project1', 12, '2013-03-19 10:12:34', 1, '', '113742birth.jpg'),
(4, 'My secont Project', 'my-secont-project', 'My secont Project My secont Project\nMy secont Project\nMy secont Project', 11, '2013-03-19 10:13:22', 0, '', ''),
(5, 'My secont Project', 'my-secont-project', 'My secont Project', 12, '2013-03-19 10:21:14', 1, '', ''),
(13, 'Testing Project', 'Testing Project', 'Testing Project', 12, '2013-03-25 11:03:15', 1, '110315Children-are-like-wet-cement.-Whatever-falls-on-them-makes-an-impression.-Early-Childhood-Education-Quotes.jpg', '110315Daily_Inspirational_Quotes.jpg'),
(15, 'This os test', 'this is test', 'This test by manish', 20, '2013-03-25 11:37:43', 1, '113743BAJA_14_Schedule.pptx', '113742birth.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects_data`
--

DROP TABLE IF EXISTS `projects_data`;
CREATE TABLE IF NOT EXISTS `projects_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) NOT NULL,
  `data_field` varchar(512) NOT NULL,
  `data_value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projects_data`
--

INSERT INTO `projects_data` (`id`, `project_id`, `data_field`, `data_value`) VALUES
(4, 12, 'minimum_investment', '2000-5000'),
(3, 7, 'minimum_investment', '2000-5000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(256) CHARACTER SET latin1 NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 NOT NULL,
  `status` int(10) NOT NULL,
  `joining_date` datetime NOT NULL,
  `user_type` varchar(128) CHARACTER SET latin1 NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 for normal user, 1 for admin',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `password`, `status`, `joining_date`, `user_type`, `is_admin`) VALUES
(22, 'Manoj Agrawal', 'manojujn@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2013-03-27 08:13:06', 'investor', 0),
(23, 'Samir', 'samir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2013-03-29 08:31:53', 'investor', 0),
(21, 'Satya', 'technicalsupport@firebirdspeed.com', 'b56e0b4ea4962283bee762525c2d490f', 1, '2013-03-25 03:54:12', 'company', 0),
(11, 'Sanjay jain', 'spatidar@matictechnology.com', '133987b0b6ad0c01fc0ccbdae1b95449', 1, '2013-03-18 10:26:18', 'company', 0),
(12, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2013-03-21 00:00:00', 'admin', 1),
(18, 'Satya', 'prosatya@gmail.com', '02c75fb22c75b23dc963c7eb91a062cc', 1, '2013-03-22 12:29:41', 'company', 0),
(24, 'Manish', 'mgautam@solutionsofts.com', '84a865f5c2bd0b7f6f8d21b42bade175', 1, '2013-03-30 08:49:21', 'company', 0),
(25, 'Sanjay jain', 'mgautam1@solutionsofts.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2013-04-02 12:11:26', 'investor', 0),
(26, 'Sanjay jain', 'mgautam11@solutionsofts.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2013-04-02 12:11:46', 'investor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `data_field` varchar(256) CHARACTER SET latin1 NOT NULL,
  `data_value` text CHARACTER SET latin1 NOT NULL,
  `display_public` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `data_field`, `data_value`, `display_public`) VALUES
(13, 20, 'email_varification_code', 'yveS0SBO8TNWaSFb', 0),
(2, 8, 'email_varification_code', '1rZTBcX1vumc88wR', 0),
(11, 18, 'email_varification_code', 'EF7OHNpgofElpmIH', 0),
(12, 19, 'email_varification_code', 'lYN3mKL7Kegb1hX8', 0),
(5, 11, 'email_varification_code', 'oMoBi9qZewHoa1V7', 0),
(6, 12, 'email_varification_code', 'c2754fPLYHKJZYMh', 0),
(14, 21, 'email_varification_code', 'TpzMDujhebATidln', 0),
(15, 22, 'email_varification_code', 'VAE2vMqGHMmRzteP', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
