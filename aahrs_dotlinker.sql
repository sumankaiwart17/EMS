-- phpMyAdmin SQL Dump

-- version 5.1.1

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1

-- Generation Time: Jul 17, 2021 at 04:35 PM

-- Server version: 10.4.19-MariaDB

-- PHP Version: 8.0.7



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";





/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;



--

-- Database: `aahrs_dotlinker`

--



-- --------------------------------------------------------



--

-- Table structure for table `chatbot`

--



CREATE TABLE `chatbot` (

  `id` int(11) NOT NULL,

  `queries` varchar(255) NOT NULL,

  `replies` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `chatbot`

--



INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES

(1, 'Where are you from?', 'Kolkata'),

(2, 'What is your name?', 'AAHRS Bot'),

(5, 'Are you bot?', 'Yes, Bot without AI'),

(8, 'Who Developed You?', 'Arpan');



-- --------------------------------------------------------



--

-- Table structure for table `chatbot_extra_queries`

--



CREATE TABLE `chatbot_extra_queries` (

  `id` int(11) NOT NULL,

  `queries` varchar(255) NOT NULL,

  `email` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `chatbot_extra_queries`

--



INSERT INTO `chatbot_extra_queries` (`id`, `queries`, `email`) VALUES

(1, 'hello noob', 'example@gm.com'),

(2, 'hola', 'example@gm.com');



-- --------------------------------------------------------



--

-- Table structure for table `contact_me`

--



CREATE TABLE `contact_me` (

  `id` int(11) NOT NULL,

  `name` varchar(255) NOT NULL,

  `email` varchar(255) NOT NULL,

  `phone` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `contact_me`

--



INSERT INTO `contact_me` (`id`, `name`, `email`, `phone`) VALUES

(1, 'B chowdhury', 'mailtoprithul@gmail.com', '8981822725');



-- --------------------------------------------------------



--

-- Table structure for table `departments`

--



CREATE TABLE `departments` (

  `id` int(11) NOT NULL,

  `dept_id` varchar(100) NOT NULL,

  `dept_name` varchar(100) NOT NULL,

  `dept_description` varchar(1000) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `departments`

--



INSERT INTO `departments` (`id`, `dept_id`, `dept_name`, `dept_description`) VALUES

(1, 'dept001', 'Dental', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(2, 'dept002', 'Orthopedics', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(3, 'dept003', 'Opthalmology', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(4, 'dept004', 'Neurology', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(5, 'dept005', 'ENT', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(6, 'dept006', 'Cancer', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(7, 'dept007', 'Radiology', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(8, 'dept008', 'Dietary', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(9, 'dept009', 'Pathology', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(10, 'dept010', 'Paramedical', 'Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices'),

(14, 'dept000Urology', 'Urology', 'Urology also known as genitourinary surgery, is the branch of medicine that focuses on surgical and medical diseases of the male and female urinary-tract system and the male reproductive organs. '),

(15, 'dept000X-Ray', 'X-Ray', 'Urology also known as genitourinary surgery, is the branch of medicine that focuses on surgical and medical diseases of the male and female urinary-tract system and the male reproductive organs. ');



-- --------------------------------------------------------



--

-- Table structure for table `department_review_user`

--



CREATE TABLE `department_review_user` (

  `review_id` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `dept_id` varchar(100) NOT NULL,

  `review_title` varchar(255) NOT NULL,

  `review_content` varchar(1000) NOT NULL,

  `star_rating` varchar(11) NOT NULL,

  `star_rating_dept_doctors_availability` varchar(255) NOT NULL,

  `star_rating_department_facilities` varchar(255) NOT NULL,

  `star_rating_medicine_availability` varchar(255) NOT NULL,

  `datetime` datetime NOT NULL,

  `treat_id` varchar(100) NOT NULL,

  `dis_id` varchar(100) NOT NULL,

  `document` varchar(500) NOT NULL,

  `id_proof` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `department_review_user`

--



INSERT INTO `department_review_user` (`review_id`, `hos_id`, `email_id`, `dept_id`, `review_title`, `review_content`, `star_rating`, `star_rating_dept_doctors_availability`, `star_rating_department_facilities`, `star_rating_medicine_availability`, `datetime`, `treat_id`, `dis_id`, `document`, `id_proof`) VALUES

(1, 'amri1', 'example@gm.com', 'dept001', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-16 00:00:00', '', '', '', ''),

(2, 'amri1', 'mailto@gmail.com', 'dept001', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '3', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(3, 'amri1', 'example@gm.com', 'dept004', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-16 00:00:00', '', '', '', ''),

(4, 'amri1', 'mailto@gmail.com', 'dept004', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(5, 'amri1', 'example@gm.com', 'dept006', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-16 00:00:00', '', '', '', ''),

(6, 'amri1', 'mailto@gmail.com', 'dept006', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '3', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(7, 'amri1', 'example@gm.com', 'dept007', 'Very nice place for treatment', 'very well service', '4', '', '', '', '2021-02-16 00:00:00', '', '', '', ''),

(8, 'amri1', 'mailto@gmail.com', 'dept007', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '3', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(9, 'amri1', 'example@gm.com', 'dept000X-Ray', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-16 00:00:00', '', '', '', ''),

(10, 'amri1', 'mailto@gmail.com', 'dept000X-Ray', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '4', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(12, 'apl1', 'example@gm.com', 'dept001', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-24 00:00:00', '', '', '', ''),

(13, 'apl1', 'mailto@gmail.com', 'dept001', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '2', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(14, 'apl1', 'example@gm.com', 'dept002', 'very nice', 'keep it up', '4', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(15, 'apl1', 'mailto@gmail.com', 'dept002', 'now up to the mark', 'would like to see better performance later', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(16, 'apl1', 'example@gm.com', 'dept003', 'very good', 'splendid service', '5', '', '', '', '2021-02-04 00:00:00', '', '', '', ''),

(17, 'apl1', 'mailto@gmail.com', 'dept003', 'So SO', 'not so bad not so good', '3', '', '', '', '2021-02-26 00:00:00', '', '', '', ''),

(18, 'apl1', 'example@gmail.com', 'dept004', 'just wow', 'awesome awesome', '5', '', '', '', '2021-02-12 00:00:00', '', '', '', ''),

(19, 'apl1', 'mailto@gmail.com', 'dept004', 'Very Rude', 'didnt expected such service', '1', '', '', '', '2021-02-11 00:00:00', '', '', '', ''),

(20, 'apl1', 'example@gmail.com', 'dept005', 'good', 'had a good experience', '4', '', '', '', '2021-02-21 00:00:00', '', '', '', ''),

(21, 'apl1', 'mailto@gmail.com', 'dept005', 'okay', 'got an overpriced bill', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(22, 'frts1', 'example@gm.com', 'dept001', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-24 00:00:00', '', '', '', ''),

(23, 'frts1', 'mailto@gmail.com', 'dept001', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '2', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(24, 'frts1', 'example@gm.com', 'dept002', 'very nice', 'keep it up', '4', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(25, 'frts1', 'mailto@gmail.com', 'dept002', 'now up to the mark', 'would like to see better performance later', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(26, 'frts1', 'example@gm.com', 'dept003', 'very good', 'splendid service', '5', '', '', '', '2021-02-04 00:00:00', '', '', '', ''),

(27, 'frts1', 'mailto@gmail.com', 'dept003', 'So SO', 'not so bad not so good', '3', '', '', '', '2021-02-26 00:00:00', '', '', '', ''),

(28, 'frts1', 'example@gmail.com', 'dept004', 'just wow', 'awesome awesome', '5', '', '', '', '2021-02-12 00:00:00', '', '', '', ''),

(29, 'frts1', 'mailto@gmail.com', 'dept004', 'Very Rude', 'didnt expected such service', '1', '', '', '', '2021-02-11 00:00:00', '', '', '', ''),

(30, 'frts1', 'example@gmail.com', 'dept005', 'good', 'had a good experience', '4', '', '', '', '2021-02-21 00:00:00', '', '', '', ''),

(31, 'frts1', 'mailto@gmail.com', 'dept005', 'okay', 'got an overpriced bill', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(32, 'kh1', 'example@gm.com', 'dept001', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-24 00:00:00', '', '', '', ''),

(33, 'kh1', 'mailto@gmail.com', 'dept001', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '2', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(34, 'kh1', 'example@gm.com', 'dept002', 'very nice', 'keep it up', '4', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(35, 'kh1', 'mailto@gmail.com', 'dept002', 'now up to the mark', 'would like to see better performance later', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(36, 'kh1', 'example@gm.com', 'dept003', 'very good', 'splendid service', '5', '', '', '', '2021-02-04 00:00:00', '', '', '', ''),

(37, 'kh1', 'mailto@gmail.com', 'dept003', 'So SO', 'not so bad not so good', '3', '', '', '', '2021-02-26 00:00:00', '', '', '', ''),

(38, 'kh1', 'example@gmail.com', 'dept004', 'just wow', 'awesome awesome', '5', '', '', '', '2021-02-12 00:00:00', '', '', '', ''),

(39, 'kh1', 'mailto@gmail.com', 'dept004', 'Very Rude', 'didnt expected such service', '1', '', '', '', '2021-02-11 00:00:00', '', '', '', ''),

(40, 'kh1', 'example@gmail.com', 'dept005', 'good', 'had a good experience', '4', '', '', '', '2021-02-21 00:00:00', '', '', '', ''),

(41, 'kh1', 'mailto@gmail.com', 'dept005', 'okay', 'got an overpriced bill', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(42, 'wd1', 'example@gm.com', 'dept001', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-24 00:00:00', '', '', '', ''),

(43, 'wd1', 'mailto@gmail.com', 'dept001', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '2', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(44, 'wd1', 'example@gm.com', 'dept002', 'very nice', 'keep it up', '4', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(45, 'wd1', 'mailto@gmail.com', 'dept002', 'now up to the mark', 'would like to see better performance later', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(46, 'wd1', 'example@gm.com', 'dept003', 'very good', 'splendid service', '5', '', '', '', '2021-02-04 00:00:00', '', '', '', ''),

(47, 'wd1', 'mailto@gmail.com', 'dept003', 'So SO', 'not so bad not so good', '3', '', '', '', '2021-02-26 00:00:00', '', '', '', ''),

(48, 'wd1', 'example@gmail.com', 'dept004', 'just wow', 'awesome awesome', '5', '', '', '', '2021-02-12 00:00:00', '', '', '', ''),

(49, 'wd1', 'mailto@gmail.com', 'dept004', 'Very Rude', 'didnt expected such service', '1', '', '', '', '2021-02-11 00:00:00', '', '', '', ''),

(50, 'wd1', 'example@gmail.com', 'dept005', 'good', 'had a good experience', '4', '', '', '', '2021-02-21 00:00:00', '', '', '', ''),

(51, 'wd1', 'mailto@gmail.com', 'dept005', 'okay', 'got an overpriced bill', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(52, 'ckbh1', 'example@gm.com', 'dept001', 'Very nice place for treatment', 'very well service', '5', '', '', '', '2021-02-24 00:00:00', '', '', '', ''),

(53, 'ckbh1', 'mailto@gmail.com', 'dept001', 'Astonishingly rude behavior by the staff nurse', 'very bad behaviour', '2', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(54, 'ckbh1', 'example@gm.com', 'dept002', 'very nice', 'keep it up', '4', '', '', '', '2021-02-17 00:00:00', '', '', '', ''),

(55, 'ckbh1', 'mailto@gmail.com', 'dept002', 'now up to the mark', 'would like to see better performance later', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(56, 'ckbh1', 'example@gm.com', 'dept008', 'very good', 'splendid service', '5', '', '', '', '2021-02-04 00:00:00', '', '', '', ''),

(57, 'ckbh1', 'mailto@gmail.com', 'dept008', 'So SO', 'not so bad not so good', '3', '', '', '', '2021-02-26 00:00:00', '', '', '', ''),

(58, 'ckbh1', 'example@gmail.com', 'dept004', 'just wow', 'awesome awesome', '5', '', '', '', '2021-02-12 00:00:00', '', '', '', ''),

(59, 'ckbh1', 'mailto@gmail.com', 'dept004', 'Very Rude', 'didnt expected such service', '1', '', '', '', '2021-02-11 00:00:00', '', '', '', ''),

(60, 'ckbh1', 'example@gmail.com', 'dept006', 'good', 'had a good experience', '4', '', '', '', '2021-02-21 00:00:00', '', '', '', ''),

(61, 'ckbh1', 'mailto@gmail.com', 'dept006', 'okay', 'got an overpriced bill', '2', '', '', '', '2021-02-18 00:00:00', '', '', '', ''),

(64, 'kh1', 'example@gm.com', 'dept003', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '0', '', '', '', '2021-02-23 13:11:49', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_511.png', '5651237127368'),

(65, 'kh1', 'example@gm.com', 'dept002', 'New 12', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2', '', '', '', '2021-02-23 13:26:21', '', '', '', ''),

(66, 'frts1', 'example@gm.com', 'dept003', 'New Department', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2.5', '', '', '', '2021-02-23 14:00:33', '', '', '', ''),

(67, 'amri1', 'example@gm.com', 'dept006', 'New Department 123', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '4.5', '', '', '', '2021-02-23 14:44:12', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_5110.png', '5651237127368'),

(77, 'msh1', 'example@gm.com', 'dept003', 'This is a test', 'this is a test', '3', '', '', '', '2021-04-02 17:20:10', '', '', '', ''),

(78, 'amri1', '', 'dept005', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', ''),

(79, 'apl1', 'example@gm.com', 'dept003', 'xxxxx', 'msbmd bsmhbg', '3.9', '4.5', '2.4', '4.8', '2021-06-10 18:20:56', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_1335587.png', '1561'),

(80, 'frts1', 'example@gm.com', 'dept002', 'nxchjgsjh', 'j,a,mcccccccccccccccccccccccdv,mkbajkjk', '3.5', '3.7', '2.2', '4.5', '2021-06-10 18:23:05', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_1335588.png', '1565'),

(81, 'frts1', 'example@gm.com', 'dept002', 'test5', 'JHVKuvmhvkjblskvjknv', '2.8', '2.7', '4.5', '1.3', '2021-06-10 18:48:19', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355813.png', '1565');



-- --------------------------------------------------------



--

-- Table structure for table `diseases`

--



CREATE TABLE `diseases` (

  `id` int(11) NOT NULL,

  `dis_id` varchar(100) NOT NULL,

  `dis_name` varchar(100) NOT NULL,

  `picture` varchar(255) NOT NULL,

  `dis_sym_caus` varchar(500) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `diseases`

--



INSERT INTO `diseases` (`id`, `dis_id`, `dis_name`, `picture`, `dis_sym_caus`) VALUES

(1, 'dv1', 'Dengue Virus', 'dv.png', 'Nausea, vomiting, rash, aches and pains. Dengue fever is caused by any one of four types of dengue viruses. You can\'t get dengue fever from being around an infected person. Instead, dengue fever is spread through mosquito'),

(2, 'as1', 'Artis Speaker', 'h1n1.jpg', 'The symptoms of 2009 H1N1 flu virus in people include fever, cough, sore throat, runny or stuffy nose, body aches, headache, chills and fatigue. Some people may have vomiting and diarrhea. People may be infected with the flu, including 2009 H1N1 and have respiratory symptoms without a fever'),

(3, 'ps1', 'Rabies', 'rabies.jpg', 'the person may experience delirium, abnormal behavior, hallucinations, hydrophobia (fear of water), and insomnia. The acute period of disease typically ends after 2 to 10 days. Once clinical signs of rabies appear, the disease is nearly always fatal, and treatment is typically supportive.');



-- --------------------------------------------------------



--

-- Table structure for table `disease_articles`

--



CREATE TABLE `disease_articles` (

  `article_id` int(11) NOT NULL,

  `dis_id` varchar(100) NOT NULL,

  `article_title` varchar(200) NOT NULL,

  `article_content` longtext NOT NULL,

  `article_contributer` varchar(100) NOT NULL,

  `article_time` date NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `disease_articles`

--



INSERT INTO `disease_articles` (`article_id`, `dis_id`, `article_title`, `article_content`, `article_contributer`, `article_time`) VALUES

(1, 'dv1', 'Breakbone fever', 'Dengue is an acute viral illness caused by RNA virus of the family Flaviviridae and spread by Aedes mosquitoes. Presenting features may range from asymptomatic fever to dreaded complications such as hemorrhagic fever and shock. A cute-onset high fever, muscle and joint pain, myalgia, cutaneous rash, hemorrhagic episodes, and circulatory shock are the commonly seen symptoms. Oral manifestations are rare in dengue infection; however, some cases may have oral features as the only presenting manifestation. Early and accurate diagnosis is critical to reduce mortality. ', 'Sanjay Verma', '2021-01-21'),

(2, 'dv1', 'Dengue virus', 'Dengue virus gains entry into the host organism through the skin following an infected mosquito bite. Humoral, cellular, and innate host immune responses are implicated in the progression of the illness and the more severe clinical signs occur following the rapid clearance of the virus from the host organism. Hence, the most severe clinical presentation during the infection course does not correlate with a high viral load', 'Randip Hooda', '2021-01-20'),

(3, 'as1', 'Swine Flu', 'acute viral illness caused by RNA virus of the family Flaviviridae and spread by Aedes mosquitoes. Presenting features may range from asymptomatic fever to dreaded complications such as hemorrhagic fever and shock. A cute-onset high fever, muscle and joint pain, myalgia, cutaneous rash, hemorrhagic episodes, and circulatory shock are the commonly seen symptoms. Oral manifestations are rare in dengue infection; however, some cases may have oral features as the only presenting manifestation. Early and accurate diagnosis is critical to reduce mortality. ', 'Sanjay Verma', '2021-01-21'),

(4, 'as1', 'H1N1 Virus', 'gains entry into the host organism through the skin following an infected mosquito bite. Humoral, cellular, and innate host immune responses are implicated in the progression of the illness and the more severe clinical signs occur following the rapid clearance of the virus from the host organism. Hence, the most severe clinical presentation during the infection course does not correlate with a high viral load', 'Randip Hooda', '2021-01-20'),

(5, 'ps1', 'Breakbone fever', 'Dengue is an acute viral illness caused by RNA virus of the family Flaviviridae and spread by Aedes mosquitoes. Presenting features may range from asymptomatic fever to dreaded complications such as hemorrhagic fever and shock. A cute-onset high fever, muscle and joint pain, myalgia, cutaneous rash, hemorrhagic episodes, and circulatory shock are the commonly seen symptoms. Oral manifestations are rare in dengue infection; however, some cases may have oral features as the only presenting manifestation. Early and accurate diagnosis is critical to reduce mortality. ', 'Sanjay Verma', '2021-01-21'),

(6, 'ps1', 'Dengue virus', 'Dengue virus gains entry into the host organism through the skin following an infected mosquito bite. Humoral, cellular, and innate host immune responses are implicated in the progression of the illness and the more severe clinical signs occur following the rapid clearance of the virus from the host organism. Hence, the most severe clinical presentation during the infection course does not correlate with a high viral load', 'Randip Hooda', '2021-01-20');



-- --------------------------------------------------------



--

-- Table structure for table `doctors_appointment`

--



CREATE TABLE `doctors_appointment` (

  `id` int(11) NOT NULL,

  `appt_id` varchar(100) NOT NULL,

  `appt_status` varchar(1) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `appt_slot_time` varchar(50) NOT NULL,

  `appt_datetime` date NOT NULL,

  `booking_datetime` datetime NOT NULL DEFAULT current_timestamp(),

  `user_id` varchar(100) NOT NULL,

  `email_status` int(11) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctors_appointment`

--



INSERT INTO `doctors_appointment` (`id`, `appt_id`, `appt_status`, `doc_id`, `appt_slot_time`, `appt_datetime`, `booking_datetime`, `user_id`, `email_status`) VALUES

(35, 'APPT605cb126b766c', '0', 'dpp1', '12:0', '2021-03-25', '2021-03-25 21:19:58', 'example@gm.com', 0),

(31, 'APPT60574f55c1402', '2', 'dpp1', '13:10', '2021-03-29', '2021-03-21 19:21:17', 'example@gm.com', 0),

(13, 'APPT60d03adf162b4', '2', 'dpp1', '13:50', '2021-03-16', '2021-03-16 14:59:13', 'example@gm.com', 0),

(14, 'APPT60d03b2635798', '2', 'dsb1', '14:30', '2021-03-17', '2021-03-16 15:09:45', 'example@gm.com', 0),

(16, 'APPT60d03b3b2b876', '2', 'dpp1', '11:30', '2021-03-16', '2021-03-16 16:37:31', 'example@gm.com', 0),

(20, 'APPT60d03b54edb0e', '0', 'dpp1', '15:30', '2021-03-18', '2021-03-17 20:51:40', 'example@gm.com', 0),

(19, 'APPT60d03b685532f', '0', 'dab1', '15:20', '2021-03-17', '2021-03-17 20:43:19', 'example@gm.com', 0),

(25, 'APPT6054fa54b0fbf', '0', 'dag12', '16:20', '2021-03-22', '2021-03-20 00:54:04', 'example@gm.com', 0),

(22, 'APPT6054c638a053d', '0', 'dpp1', '17:30', '2021-03-19', '2021-03-19 21:12:15', 'example@gm.com', 0),

(23, 'APPT6054c67317c2d', '2', 'dpp1', '18:10', '2021-03-19', '2021-03-19 21:13:10', 'souvik@sm.com', 0),

(26, 'APPT605585bfcd9be', '0', 'dag12', '18:50', '2021-03-22', '2021-03-20 10:48:55', 'example@gm.com', 0),

(39, 'APPT60d45a5fb08d1', '0', 'dsb1', '16:30', '2021-06-28', '2021-06-24 15:46:13', 'shreyandey5@gmail.com', 0),

(40, 'APPT60d45ec6732a2', '2', 'dsb1', '23:50', '2021-06-29', '2021-06-24 16:17:39', 'shreyandey6@gmail.com', 0);



-- --------------------------------------------------------



--

-- Table structure for table `doctors_experience`

--



CREATE TABLE `doctors_experience` (

  `exp_id` int(11) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `exp_title` varchar(100) NOT NULL,

  `hos_name` varchar(255) NOT NULL,

  `exp_duration` varchar(10) NOT NULL,

  `exp_message` varchar(1000) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctors_experience`

--



INSERT INTO `doctors_experience` (`exp_id`, `doc_id`, `exp_title`, `hos_name`, `exp_duration`, `exp_message`) VALUES

(1, 'dpp1', 'Liver Transplant Surgeon', 'Medica Superspecialty Hospital', '2010-2015', 'Dr. Pandey is a Liver Transplant Surgeon at Medica Superspecialty, Kolkata and has an experience of 20 years in this fields.'),

(2, 'dpp1', 'General Surgeon and HOD of GI Surgery department', 'AMRI Hospital - Dhakuria', '2007-2015', 'Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.'),

(3, 'dsb1', 'Liver Transplant Surgeon', 'Medica Superspecialty Hospital', '2010-2015', 'Dr. Pandey is a Liver Transplant Surgeon at Medica Superspecialty, Kolkata and has an experience of 20 years in this fields.'),

(4, 'dsb1', 'General Surgeon and HOD of GI Surgery department', 'AMRI Hospital - Dhakuria', '2007-2015', 'Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.'),

(5, 'dab1', 'Liver Transplant Surgeon', 'Medica Superspecialty Hospital', '2010-2015', 'Dr. Pandey is a Liver Transplant Surgeon at Medica Superspecialty, Kolkata and has an experience of 20 years in this fields.'),

(6, 'dab1', 'General Surgeon and HOD of GI Surgery department', 'AMRI Hospital - Dhakuria', '2007-2015', 'Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.'),

(7, 'dvp1', 'Liver Transplant Surgeon', 'Medica Superspecialty Hospital', '2010-2015', 'Dr. Pandey is a Liver Transplant Surgeon at Medica Superspecialty, Kolkata and has an experience of 20 years in this fields.'),

(8, 'dvp1', 'General Surgeon and HOD of GI Surgery department', 'AMRI Hospital - Dhakuria', '2007-2015', 'Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.'),

(9, 'ddr1', 'Liver Transplant Surgeon', 'Medica Superspecialty Hospital', '2010-2015', 'Dr. Pandey is a Liver Transplant Surgeon at Medica Superspecialty, Kolkata and has an experience of 20 years in this fields.'),

(10, 'ddr1', 'General Surgeon and HOD of GI Surgery department', 'AMRI Hospital - Dhakuria', '2007-2015', 'Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.'),

(11, 'dad1', 'Liver Transplant Surgeon', 'Medica Superspecialty Hospital', '2010-2015', 'Dr. Pandey is a Liver Transplant Surgeon at Medica Superspecialty, Kolkata and has an experience of 20 years in this fields.'),

(12, 'dad1', 'General Surgeon and HOD of GI Surgery department', 'AMRI Hospital - Dhakuria', '2007-2015', 'Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.'),

(13, 'dad2', 'Liver Transplant Surgeon', 'Medica Superspecialty Hospital', '2010-2015', 'Dr. Pandey is a Liver Transplant Surgeon at Medica Superspecialty, Kolkata and has an experience of 20 years in this fields.'),

(14, 'dad2', 'General Surgeon and HOD of GI Surgery department', 'AMRI Hospital - Dhakuria', '2007-2015', 'Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.');



-- --------------------------------------------------------



--

-- Table structure for table `doctors_schedule`

--



CREATE TABLE `doctors_schedule` (

  `id` int(11) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `weekdays` varchar(20) NOT NULL,

  `strt_time` time NOT NULL,

  `end_time` time NOT NULL,

  `brk_time` time NOT NULL,

  `brk_dur` int(10) NOT NULL,

  `consult_duration` int(11) NOT NULL,

  `status` tinyint(1) NOT NULL,

  `slots` varchar(255) NOT NULL,

  `consult_fee` decimal(10,2) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctors_schedule`

--



INSERT INTO `doctors_schedule` (`id`, `doc_id`, `weekdays`, `strt_time`, `end_time`, `brk_time`, `brk_dur`, `consult_duration`, `status`, `slots`, `consult_fee`) VALUES

(1, 'dpp1', 'Mon,Sat,Sun', '10:00:00', '18:00:00', '14:00:00', 2, 30, 1, '10:00 AM,10:30 AM,11:00 AM,11:30 AM,12:00 PM,12:30 PM,1:00 PM,1:30 PM,4:00 PM,4:30 PM,5:00 PM,5:30 PM', '500.00'),

(2, 'dsb1', 'Sat,Sun,Mon', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '799.00'),

(4, 'dvp1', 'Sat,Sun,Mon', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '1499.00'),

(5, 'ddr1', 'Fri,Sat', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '699.00'),

(6, 'dad2', 'Mon,Sun,Thur,Tue', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '400.00'),

(7, 'dam1', 'Tue,Thur', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '700.00'),

(8, 'ddm1', 'Mon,Wed', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '600.00'),

(9, 'dmm1', 'Sat,Sun', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '499.00'),

(10, 'dom1', 'Wed,Sat,Sun', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '1400.00'),

(11, 'dad1', 'Mon,Tue,Wed', '10:00:00', '18:00:00', '14:00:00', 2, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '599.00'),

(22, 'dag12', 'Fri,Mon,Sun', '10:00:00', '18:00:00', '14:00:00', 1, 60, 1, '10:00 AM,11:00 AM,12:00 PM,1:00 PM,3:00 PM,4:00 PM,5:00 PM', '399.00');



-- --------------------------------------------------------



--

-- Table structure for table `doctor_consults`

--



CREATE TABLE `doctor_consults` (

  `id` int(11) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `token_id` varchar(100) NOT NULL,

  `post_time` date NOT NULL,

  `consult_title` varchar(255) NOT NULL,

  `consult_query` varchar(1000) NOT NULL,

  `answer` text DEFAULT NULL,

  `treat_id` varchar(155) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctor_consults`

--



INSERT INTO `doctor_consults` (`id`, `email_id`, `doc_id`, `token_id`, `post_time`, `consult_title`, `consult_query`, `answer`, `treat_id`) VALUES

(1, 'example@gm.com', 'dpp1', 'dpp1_example@gm.com', '2021-01-13', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.', 'Besh hoyche. Beshi fast food khele erokom e hobe. Ami kichu korte parbona. Giye mor.', 'trt001'),

(2, 'mailto@gmail.com', 'dpp1', 'dpp1_mailto@gmail.com', '2021-01-28', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem', 'blah blagh', 'trt004'),

(3, 'example@gm.com', 'dsb1', 'dsb1_example@gm.com', '2021-01-13', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.', NULL, 'trt009'),

(4, 'mailto@gmail.com', 'dsb1', 'dsb1_mailto@gmail.com', '2021-01-28', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem', NULL, 'trt003'),

(5, 'example@gm.com', 'dab1', 'dab1_example@gm.com', '2021-01-13', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.', 'Besh hoyche. Beshi fast food khele erokom e hobe. Ami kichu korte parbona. Giye mor.', 'trt004'),

(6, 'mailto@gmail.com', 'dab1', 'dab1_mailto@gmail.com', '2021-01-28', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem', NULL, 'trt001'),

(7, 'example@gm.com', 'dvp1', 'dvp1_example@gm.com', '2021-01-13', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.', NULL, 'trt009'),

(8, 'mailto@gmail.com', 'dvp1', 'dvp1_mailto@gmail.com', '2021-01-28', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem', NULL, 'trt005'),

(10, 'mailto@gmail.com', 'ddr1', 'ddr1_mailto@gmail.com', '2021-01-28', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem', NULL, 'trt007'),

(11, 'example@gm.com', 'dad1', 'dad1_example@gm.com', '2021-01-13', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.', NULL, 'trt001'),

(13, 'example@gm.com', 'dad2', 'dad2_example@gm.com', '2021-01-13', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.', NULL, 'trt005'),

(14, 'mailto@gmail.com', 'dad2', 'dad2_mailto@gmail.com', '2021-01-28', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem', NULL, 'trt003');



-- --------------------------------------------------------



--

-- Table structure for table `doctor_details`

--



CREATE TABLE `doctor_details` (

  `id` int(11) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `doc_name` varchar(100) NOT NULL,

  `specialization` varchar(100) NOT NULL,

  `experience` longtext NOT NULL,

  `country` varchar(50) NOT NULL,

  `state` varchar(50) NOT NULL,

  `city` varchar(50) NOT NULL,

  `zip` varchar(10) NOT NULL,

  `email_id` varchar(50) NOT NULL,

  `phone` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `picture` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctor_details`

--



INSERT INTO `doctor_details` (`id`, `doc_id`, `doc_name`, `specialization`, `experience`, `country`, `state`, `city`, `zip`, `email_id`, `phone`, `hos_id`, `picture`) VALUES

(1, 'dpp1', 'Promodh Parekh', 'dept001 ', 'Dr. Parekh is a GastroIntestinal Surgeon, General Surgeon and HOD of GI Surgery department in Dhakuria, Kolkata and has an experience of 20 years in these fields. Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.', 'india', 'west bengal', 'kolkata', '700001', 'promodh@doctor.com', 25425423, 'apl1', 'http://localhost/AAHRS/userUploadsdoctor1.jpg'),

(2, 'dsb1', 'Sajib Bansal', 'dept002', 'Dr. Bansal is a GastroIntestinal Surgeon, General Surgeon and HOD of GI Surgery department in Dhakuria, Kolkata and has an experience of 20 years in these fields. Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.', 'india', 'west bengal', 'kolkata', '700001', 'sajib@doctor.com', 25425424, 'apl1', 'http://localhost/AAHRS/userUploadsdoctor2.png'),

(3, 'dab1', 'Abhijeet Bose', 'dept003', 'Dr. Bose is a GastroIntestinal Surgeon, General Surgeon and HOD of GI Surgery department in Dhakuria, Kolkata and has an experience of 20 years in these fields. Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.', 'india', 'West Bengal', 'kolkata', '700123', 'abhijit@doctor.com', 25421701, 'apl1', 'http://localhost/AAHRS/userUploadsdoctor.jpg'),

(4, 'dvp1', 'Venker Pandey', 'dept001', 'Dr. Pandey is a GastroIntestinal Surgeon, General Surgeon and HOD of GI Surgery department in Dhakuria, Kolkata and has an experience of 20 years in these fields. Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.', 'india', 'west bengal', 'kolkata', '700001', 'venker@doctor.com', 25425423, 'frts1', 'http://localhost/AAHRS/userUploadsdoctor1.jpg'),

(5, 'ddr1', 'Debdutta Rathore', 'dept002', 'Dr. Rathore is a GastroIntestinal Surgeon, General Surgeon and HOD of GI Surgery department in Dhakuria, Kolkata and has an experience of 20 years in these fields. Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.', 'india', 'West Bengal', 'kolkata', '700123', 'debdutta@doctor.com', 25421701, 'frts1', 'http://localhost/AAHRS/userUploadsdoctor.jpg'),

(6, 'dad2', 'Amal Devraj', 'dept004', 'Dr. Devraj is a GastroIntestinal Surgeon, General Surgeon and HOD of GI Surgery department in Dhakuria, Kolkata and has an experience of 20 years in these fields. Dr. Pandey practices at AMRI Hospitals in Dhakuria, Kolkata. He completed MBBS from Calcutta University in 2000,MNAMS - General Surgery from National Academy of Medical Science in 2007 and DNB - General Surgery from National Board of Examination, India in 2007.', 'india', 'West Bengal', 'kolkata', '700123', 'amal@doctor.com', 25421701, 'amri1', 'http://localhost/AAHRS/userUploadsdoctor.jpg'),

(7, 'dam1', 'Arnob Mondal', 'dept002', 'Medical students rotate through various specialties such as surgery, pediatrics, or neurology to learn about each field so they can decide which is of most interest to them. You’ll see them in hospitals, but they haven’t finished their training, and they are not licensed, doctors.', 'india', 'west bengal', 'kolkata', '700001', 'arnob@doctor.com', 25425423, 'msh1', 'http://localhost/AAHRS/userUploadsdoctor2.png'),

(8, 'ddm1', 'Deepshikha Mitra', 'dept003', 'Medical students rotate through various specialties such as surgery, pediatrics, or neurology to learn about each field so they can decide which is of most interest to them. You’ll see them in hospitals, but they haven’t finished their training, and they are not licensed, doctors.', 'india', 'West Bengal', 'kolkata', '700123', 'deepshikha@doctor.com', 25421701, 'wd1', 'http://localhost/AAHRS/userUploadsdoctor.jpg'),

(9, 'dmm1', 'Arnob Mondal', 'dept008', 'Medical students rotate through various specialties such as surgery, pediatrics, or neurology to learn about each field so they can decide which is of most interest to them. You’ll see them in hospitals, but they haven’t finished their training, and they are not licensed, doctors.', 'india', 'west bengal', 'kolkata', '700001', 'arnob1@doctor.com', 25425423, 'ckbh1', 'http://localhost/AAHRS/userUploadsdoctor2.png'),

(10, 'dom1', 'Deepshikha Mitra', 'dept003', 'Medical students rotate through various specialties such as surgery, pediatrics, or neurology to learn about each field so they can decide which is of most interest to them. You’ll see them in hospitals, but they haven’t finished their training, and they are not licensed, doctors.', 'india', 'West Bengal', 'kolkata', '700123', 'deepshikha1@doctor.com', 25421701, 'kh1', 'http://localhost/AAHRS/userUploadsdoctor.jpg'),

(11, 'dad1', 'Anirban Dey', 'dept006', 'Medical students rotate through various specialties such as surgery, pediatrics, or neurology to learn about each field so they can decide which is of most interest to them. You’ll see them in hospitals, but they haven’t finished their training, and they are not licensed, doctors.', 'india', 'west bengal', 'kolkata', '700132', 'anirban@doctor.com', 25421701, 'amri1', 'http://localhost/AAHRS/userUploads/doctor11.jpg'),

(22, 'dag12', 'Ashis Ghosh', 'dept004', 'lasdnfliundsviusdlcuskdcjndskufskdlunlkdsjcndv', 'India', 'West Bengal', 'Kolkata', '700001', 'ashis@doctor.com', 25425423, 'amri1', ''),

(23, 'DOC6064b1cbd11b2', 'Sankhadeep Sarkar', '', '', '', '', '', '', 'sankha@gmail.com', 0, '', ''),

(24, 'DOC6065d6fb02e19', 'Sankhadeep Sarkar', '', '', '', '', '', '', 'aryannsarkar74@gmail.com', 0, '', ''),

(25, 'DOC6065dc33b507e', 'bibek', '', '', '', '', '', '', 'ar74@gmail.com', 0, '', ''),

(26, 'DOC6065dc7aa03ef', 'bibek', '', '', '', '', '', '', 'ar@gmail.com', 0, '', ''),

(27, 'DOC6065dd5c926dd', 'arpa', '', '', '', '', '', '', 'arpa@arpa.com', 0, '', ''),

(28, 'DOC6065ddd5e6fdf', 'arpa souvik', '', '', '', '', '', '', 'super@admin.com', 0, '', ''),

(29, 'DOC6065de2ecef61', 'Sankhadeep Sarkar', '', '', '', '', '', '', 'some@gmail.com', 0, '', ''),

(30, 'DOC6065debac4db3', 'Bibek Kakuf', '	 dept004', 'Experienced in Oncology', 'India', 'West Bengal', 'Kolkata', '700125', 'souvik@gmail.com', 98521414, 'amri1', 'http://localhost/AAHRS/userUploads/doctor11.jpg');



-- --------------------------------------------------------



--

-- Table structure for table `doctor_followers_users`

--



CREATE TABLE `doctor_followers_users` (

  `id` int(11) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `doctor_posts`

--



CREATE TABLE `doctor_posts` (

  `id` int(11) NOT NULL,

  `post_id` varchar(10) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `post_title` varchar(255) NOT NULL,

  `post_content` varchar(1000) NOT NULL,

  `image` varchar(100) NOT NULL,

  `post_time` date NOT NULL,

  `like_count` int(4) NOT NULL,

  `comment_count` int(4) NOT NULL,

  `share_count` int(4) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctor_posts`

--



INSERT INTO `doctor_posts` (`id`, `post_id`, `doc_id`, `post_title`, `post_content`, `image`, `post_time`, `like_count`, `comment_count`, `share_count`) VALUES

(1, 'asdw15', 'DOC6065debac4db3', 'My First Day At Amri', 'Today s my first day at Amri Hospital. Feeling Nervous.', 'medica_covid.jpg', '2021-04-12', 0, 0, 0);



-- --------------------------------------------------------



--

-- Table structure for table `doctor_registration`

--



CREATE TABLE `doctor_registration` (

  `id` int(11) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `doc_name` varchar(100) NOT NULL,

  `password` varchar(20) NOT NULL,

  `adhar` varchar(100) NOT NULL,

  `license` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctor_registration`

--



INSERT INTO `doctor_registration` (`id`, `doc_id`, `email_id`, `doc_name`, `password`, `adhar`, `license`) VALUES

(1, 'dpp1', 'pramodh@doctor.com', 'Promodh Parekh', '123', '874587230945', 'abcd1234'),

(2, 'dsb1', 'sajib@doctor.com', 'Sajib Bansal', '123', '762387456534', 'bcda1234'),

(3, 'dab1', 'abhijeet@doctor.com', 'Abhijeet Bose', '123', '983476127634', 'dbca1234'),

(14, 'dvp1', 'venker@doctor.com', 'Venker Pandey', '123456', '763456239845', 'abcd1254'),

(15, 'ddr1', 'dedutta@doctor.com', 'Debdutta Rathore', '123456', '762387456538', 'bcda1254'),

(22, 'dad1', 'anirban@doctor.com', 'Anirban Dey', '123456', '873476346523', 'sdfe1234'),

(17, 'dad2', 'amal@doctor.com', 'Amal Devraj', '123456', '983476347634', 'asdf1234'),

(18, 'dam1', 'arnob@doctor.com', 'Arnob Mondal', '123456', '122334455667', 'qwer1234'),

(19, 'ddm1', 'deeps@doctor.com', 'Deepshikha Mitra', '123456', '142325343645', 'zaqw1234'),

(20, 'dmm1', 'arnb@doctor.com', 'Arnob Mondal', '123456', '873476456534', 'fghj1234'),

(21, 'dom1', 'deepsss@doctor.com', 'Deepshikha Mitra', '123456', '873465230912', 'wert1234'),

(23, 'DOC6064b18767ea1', 'sankha@doctor.com', 'Sankhadeep Sarkar', '123456789', '', ''),

(24, 'DOC6064b1cbd11b2', 'skh@doctor.com', 'Sankhadeep Sarkar', '123456789', '', ''),

(25, 'DOC6065d6fb02e19', 'sankhan@doctor.com', 'Sankhadeep Sarkar', '123456789', '', ''),

(26, 'DOC6065dc33b507e', 'bb@doctor.com', 'bibek', '123456789', '', ''),

(27, 'DOC6065dc7aa03ef', 'bbb@doctor.com', 'bibek', '123456789', '', ''),

(28, 'DOC6065dd5c926dd', 'arpa@doctor.com', 'arpa', '123123123', '', ''),

(29, 'DOC6065ddd5e6fdf', 'arpasouvik@doctor.com', 'arpa souvik', '123456789', '', ''),

(30, 'DOC6065de2ecef61', 'sankhadeep@doctor.com', 'Sankhadeep Sarkar', '123456789', '', ''),

(31, 'DOC6065debac4db3', 'souvik@gmail.com', 'Bibek Kakuf', '123456789', '', '');



-- --------------------------------------------------------



--

-- Table structure for table `doctor_review_user`

--



CREATE TABLE `doctor_review_user` (

  `review_id` int(11) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `review_title` varchar(255) NOT NULL,

  `review_content` longtext NOT NULL,

  `star_rating` varchar(11) NOT NULL,

  `star_rating_promptness` varchar(255) NOT NULL,

  `star_rating_bedside_manner` varchar(255) NOT NULL,

  `star_rating_ontime` varchar(255) NOT NULL,

  `star_rating_follow_up` varchar(255) NOT NULL,

  `datetime` datetime NOT NULL,

  `treat_id` varchar(100) NOT NULL,

  `dis_id` varchar(100) NOT NULL,

  `document` varchar(500) NOT NULL,

  `id_proof` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `doctor_review_user`

--



INSERT INTO `doctor_review_user` (`review_id`, `doc_id`, `email_id`, `review_title`, `review_content`, `star_rating`, `star_rating_promptness`, `star_rating_bedside_manner`, `star_rating_ontime`, `star_rating_follow_up`, `datetime`, `treat_id`, `dis_id`, `document`, `id_proof`) VALUES

(1, 'dpp1', 'example@gm.com', 'Very nice behaviour', 'My friend Rohan Chatterjee had 4th Grade piles. This doctor treated my friend as his own son. Very nice doctor. Kudos to Pristyn Care and kudos to the doctor', '4', '5', '5', '3', '3', '2021-01-14 00:00:00', '', '', '', ''),

(2, 'dab1', 'mailto@gmail.com', 'Good doctor', 'I had umbilical hernia and looking for consultation with an experienced doctor. I got the contact from pristyn care and visited the doctor. He is so friendly and now even after surgery the doctor himself take the follow ups. And also thanks to Anupam from pristyn care.', '3.5', '3', '3.5', '3.5', '4', '2021-01-21 00:00:00', '', '', '', ''),

(3, 'dsb1', 'example@gm.com', 'Very nice behaviour', 'My friend Rohan Chatterjee had 4th Grade piles. This doctor treated my friend as his own son. Very nice doctor. Kudos to Pristyn Care and kudos to the doctor', '5', '5', '5', '5', '5', '2021-01-14 00:00:00', '', '', '', ''),

(4, 'dvp1', 'mailto@gmail.com', 'Good doctor', 'I had umbilical hernia and looking for consultation with an experienced doctor. I got the contact from pristyn care and visited the doctor. He is so friendly and now even after surgery the doctor himself take the follow ups. And also thanks to Anupam from pristyn care.', '2.4', '3.2', '1.2', '2.2', '3', '2021-01-21 00:00:00', '', '', '', ''),

(5, 'ddr1', 'example@gm.com', 'Very nice behaviour', 'My friend Rohan Chatterjee had 4th Grade piles. This doctor treated my friend as his own son. Very nice doctor. Kudos to Pristyn Care and kudos to the doctor', '4.1', '4', '4', '4.2', '4.2', '2021-01-14 00:00:00', '', '', '', ''),

(6, 'dad1', 'mailto@gmail.com', 'Good doctor', 'I had umbilical hernia and looking for consultation with an experienced doctor. I got the contact from pristyn care and visited the doctor. He is so friendly and now even after surgery the doctor himself take the follow ups. And also thanks to Anupam from pristyn care.', '3', '3', '3', '3', '3', '2021-01-21 00:00:00', '', '', '', ''),

(7, 'dad2', 'example@gm.com', 'Very nice behaviour', 'My friend Rohan Chatterjee had 4th Grade piles. This doctor treated my friend as his own son. Very nice doctor. Kudos to Pristyn Care and kudos to the doctor', '5', '5', '5', '5', '5', '2021-01-14 00:00:00', '', '', '', ''),

(8, 'dvp1', 'example@gm.com', 'Very nice place for treatment', 'very well behaved doctor.. ', '4', '4', '4', '4', '4', '2021-03-09 18:20:51', '', '', '', ''),

(9, 'dsb1', 'example@gm.com', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '0', '0', '0', '0', '0', '2021-02-23 13:05:19', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_51.png', '5651237127368'),

(10, 'dam1', 'example@gm.com', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3', '3', '3', '3', '3', '2021-02-23 13:13:37', '', '', '', '5651237127368'),

(11, 'dpp1', 'example@gm.com', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3', '3', '3', '3', '3', '2021-02-23 13:15:36', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_512.png', '5651237127368'),

(12, 'dam1', 'example@gm.com', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3', '3', '3', '3', '3', '2021-02-23 13:15:54', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_513.png', '5651237127368'),

(13, 'dpp1', 'example@gm.com', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3', '3', '4', '2', '3', '2021-02-23 13:21:53', '', '', '', ''),

(14, 'dpp1', 'example@gm.com', 'New 12', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2', '1', '2', '4', '1', '2021-02-23 13:24:20', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_514.png', '5651237127368'),

(15, 'dsb1', 'example@gm.com', 'New 12', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2', '1', '3', '1', '3', '2021-02-23 13:28:49', '', '', '', ''),

(16, 'ddr1', 'example@gm.com', 'New 12', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3', '2', '2', '4', '4', '2021-02-23 13:36:19', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-mainController-temp-2021-02-17-14_52_48.png', '5651237127368'),

(17, 'ddr1', 'example@gm.com', 'New disease', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2.6', '2.6', '2.6', '2.6', '2.6', '2021-02-23 13:43:01', '', 'as1', '', ''),

(18, 'ddr1', 'example@gm.com', 'New Doctor', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '4.5', '4.5', '4.5', '5', '4', '2021-02-23 13:59:51', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_517.png', ''),

(19, 'dvp1', 'example@gm.com', 'New disease', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3.6', '3.6', '3.6', '3.6', '3.6', '2021-02-23 14:02:02', '', 'as1', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_518.png', '5651237127368'),

(20, 'dpp1', 'example@gm.com', 'abc', 'axcvbnhyuif', '3.3', '3.7', '4.5', '1.4', '3.6', '2021-06-10 17:43:53', '', '', 'http://localhost/AAHRS/userUploads/linux-lab4.PNG', '1565'),

(21, '', 'example@gm.com', 'abc', 'msdnhchjnxvmjha,hfx,hcv,zyfcs', '3.6', '2.9', '4.5', '2.6', '4.5', '2021-06-10 17:46:38', '', '', 'http://localhost/AAHRS/userUploads/linux-lab5.PNG', '18612'),

(22, 'DOC6064b1cbd11b2', 'example@gm.com', 'test 7', '<mhvbj,vhcjvhgghxfhghgcjkhcgvkjjjkvh', '3.4', '2.6', '3.9', '2.3', '4.7', '2021-06-10 18:54:20', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355814.png', '18612'),

(23, 'dpp1', 'example@gm.com', 'aaaaaaaaaaaaa', 'ddddddddddddddddddhdddddddddvvvvvvvvvvvvvvv', '3.8', '3.6', '2.4', '4.6', '4.5', '2021-06-10 18:55:41', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355815.png', '77777777');



-- --------------------------------------------------------



--

-- Table structure for table `doctor_treatments`

--



CREATE TABLE `doctor_treatments` (

  `id` int(11) NOT NULL,

  `p_id` varchar(255) NOT NULL,

  `hos_id` varchar(50) NOT NULL,

  `dept_id` varchar(50) NOT NULL,

  `treat_id` varchar(50) NOT NULL,

  `doc_id` varchar(50) NOT NULL,

  `from_date` date NOT NULL,

  `to_date` date NOT NULL,

  `details` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `doctor_treatments`

--



INSERT INTO `doctor_treatments` (`id`, `p_id`, `hos_id`, `dept_id`, `treat_id`, `doc_id`, `from_date`, `to_date`, `details`) VALUES

(1, 'amri1-1616141440', 'amri1', 'dept004', 'trt006', 'DOC6065debac4db3', '2021-03-04', '2021-04-01', 'He was in serious '),

(2, 'amri1-1616141440', 'amri1', 'dept004', 'trt006', 'DOC6065debac4db3', '2021-04-04', '2021-04-18', 'Now he is better now.');



-- --------------------------------------------------------



--

-- Table structure for table `emergency`

--



CREATE TABLE `emergency` (

  `emr_id` int(11) NOT NULL,

  `name` varchar(20) NOT NULL,

  `age` int(11) NOT NULL,

  `contact` int(11) NOT NULL,

  `address` varchar(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--

-- Dumping data for table `emergency`

--



INSERT INTO `emergency` (`emr_id`, `name`, `age`, `contact`, `address`) VALUES

(1, 'sambad', 14, 123456, 'kolkata,uttarbaluchar'),

(2, 'bibek', 24, 23456, 'kolkata,barasat');



-- --------------------------------------------------------



--

-- Table structure for table `employee_details`

--



CREATE TABLE `employee_details` (

  `id` int(11) NOT NULL,

  `emp_id` varchar(255) NOT NULL,

  `emp_name` varchar(255) NOT NULL,

  `email` varchar(255) NOT NULL,

  `mobile` varchar(11) NOT NULL,

  `join_date` date NOT NULL,

  `role` varchar(50) NOT NULL,

  `stat` tinyint(1) NOT NULL,

  `hos_id` varchar(255) NOT NULL,

  `rem_leaves` int(11) NOT NULL DEFAULT 36

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `employee_details`

--



INSERT INTO `employee_details` (`id`, `emp_id`, `emp_name`, `email`, `mobile`, `join_date`, `role`, `stat`, `hos_id`, `rem_leaves`) VALUES

(1, 'apl160b77799a1f66', 'noob65', 'noob65@email.com', '1234567890', '2021-06-02', 'Laboratorist', 0, 'apl1', 26),

(2, 'apl160b777a018dcf', 'noob68', 'noob68@emil.com', '1234425890', '2021-06-02', 'Admin', 1, 'apl1', 36),

(3, 'apl160b777dc6995c', 'demo58', 'demo58@email.com', '2563140847', '2021-06-02', 'Doctor', 0, 'apl1', 36),

(4, 'apl160b778f3bca91', 'demo99', 'demo99@email.com', '4215963481', '2021-06-02', 'Pharmacist', 0, 'apl1', 36),

(5, 'apl160b77976af9cd', 'demo100', 'demo100@gmail.com', '01254897632', '2021-06-02', 'Receptionist', 0, 'apl1', 36),

(6, 'apl060b77976af9cd', 'demo110', 'demo110@gmail.com', '01254589632', '2021-06-02', 'Receptionist', 1, 'apl1', 36),

(7, 'apl160b790cd8f39a', 'Arpan Nag', 'dsatvtgsdv@gmail.com', '8564215010', '2021-06-03', 'Laboratorist', 1, 'apl1', 30),

(8, 'apl160b790fc4f31f', 'Demo120', 'dremo120@gmail.com', '9835000022', '2021-06-03', 'Nurse', 1, 'apl1', 36);



-- --------------------------------------------------------



--

-- Table structure for table `faqs`

--



CREATE TABLE `faqs` (

  `id` int(11) NOT NULL,

  `question` mediumtext NOT NULL,

  `answer` longtext NOT NULL,

  `created_at` date NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `faqs`

--



INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`) VALUES

(1, 'What is AAHRS?', 'AAHRS is an application that recommends you best Medical Services available near you. ', '2021-06-22'),

(2, 'Which is the best Doctor for Gastroenterology?', 'You will find the best doctors on Gastroenterology from our recommend me section. Or please follow the link.', '2021-06-22');



-- --------------------------------------------------------



--

-- Table structure for table `holiday_list`

--



CREATE TABLE `holiday_list` (

  `id` int(11) NOT NULL,

  `holiday_name` varchar(20) NOT NULL,

  `holiday_date` date NOT NULL,

  `hos_id` varchar(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--

-- Dumping data for table `holiday_list`

--



INSERT INTO `holiday_list` (`id`, `holiday_name`, `holiday_date`, `hos_id`) VALUES

(4, 'janmastami', '2021-06-07', 'apl1'),

(5, 'demo holiday', '2021-06-06', 'apl1'),

(7, 'demo holiday', '2020-11-03', 'apl1'),

(8, 'christmas', '2021-12-07', 'amri1');



-- --------------------------------------------------------



--

-- Table structure for table `hoscompare_search`

--



CREATE TABLE `hoscompare_search` (

  `id` int(11) NOT NULL,

  `hos_id` varchar(255) NOT NULL,

  `count` int(11) NOT NULL DEFAULT 1

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `hoscompare_search`

--



INSERT INTO `hoscompare_search` (`id`, `hos_id`, `count`) VALUES

(1, 'amri1', 11),

(2, 'msh1', 14),

(3, 'frts1', 11),

(4, 'apl1', 9),

(5, 'ckbh1', 1),

(6, 'wd1', 1),

(7, 'kh1', 2);



-- --------------------------------------------------------



--

-- Table structure for table `hospital_advertisement`

--



CREATE TABLE `hospital_advertisement` (

  `ad_id` int(11) NOT NULL,

  `hos_id` varchar(255) NOT NULL,

  `ad_title` varchar(1000) NOT NULL,

  `ad_desc` longtext NOT NULL,

  `status` tinyint(1) NOT NULL,

  `datetime` datetime NOT NULL DEFAULT current_timestamp()

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `hospital_advertisement`

--



INSERT INTO `hospital_advertisement` (`ad_id`, `hos_id`, `ad_title`, `ad_desc`, `status`, `datetime`) VALUES

(1, 'amri1', 'Get 50% OFF ', 'this is for testing purpose', 0, '2021-03-26 19:09:23');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_consults`

--



CREATE TABLE `hospital_consults` (

  `id` int(11) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `token_id` varchar(100) NOT NULL,

  `post_time` date NOT NULL,

  `consult_title` varchar(255) NOT NULL,

  `consult_query` varchar(1000) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hospital_consults`

--



INSERT INTO `hospital_consults` (`id`, `email_id`, `hos_id`, `token_id`, `post_time`, `consult_title`, `consult_query`) VALUES

(1, 'example@gm.com', 'apl1', 'apl1_example@gm.com', '2021-01-20', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.'),

(2, 'mailto@gmail.com', 'apl1', 'apl1_mailto@gmail.com', '2021-01-13', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem'),

(3, 'example@gm.com', 'frts1', 'frts1_example@gm.com', '2021-01-20', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.'),

(4, 'mailto@gmail.com', 'frts1', 'frts1_mailto@gmail.com', '2021-01-13', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem'),

(5, 'example@gm.com', 'amri1', 'amri1_example@gm.com', '2021-01-20', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.'),

(6, 'mailto@gmail.com', 'amri1', 'amri1_mailto@gmail.com', '2021-01-13', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem'),

(7, 'example@gm.com', 'msh1', 'msh1_example@gm.com', '2021-01-15', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.'),

(8, 'mailto@gmail.com', 'msh1', 'msh1_mailto@gmail.com', '2021-01-05', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem'),

(9, 'example@gm.com', 'kh1', 'kh1_example@gm.com', '2021-01-15', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.'),

(10, 'mailto@gmail.com', 'kh1', 'kh1_mailto@gmail.com', '2021-01-05', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem'),

(11, 'example@gm.com', 'wd1', 'wd1_example@gm.com', '2021-01-15', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.'),

(12, 'mailto@gmail.com', 'wd1', 'wd1_mailto@gmail.com', '2021-01-05', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem'),

(13, 'example@gm.com', 'ckbh1', 'ckbh1_example@gm.com', '2021-01-15', 'Gastro Problem', 'there is some problem in my stomach. it\'s been few days.'),

(14, 'mailto@gmail.com', 'ckbh1', 'ckbh1_mailto@gmail.com', '2021-01-05', 'Heart Ache', 'i\'ve been wondering for how many days i\'m gonna suffer with problem'),

(15, 'example@gmail.com', 'apl1', '', '0000-00-00', 'Problem', 'I have a problem.');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_departments`

--



CREATE TABLE `hospital_departments` (

  `id` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `dept_id` varchar(100) NOT NULL,

  `status` tinyint(1) NOT NULL,

  `facilities` varchar(1000) NOT NULL,

  `open_at` time NOT NULL,

  `close_at` time NOT NULL,

  `spoc` varchar(100) NOT NULL,

  `block_no` varchar(50) NOT NULL,

  `floor_no` varchar(50) NOT NULL,

  `services` varchar(255) NOT NULL,

  `addon_services` varchar(255) NOT NULL,

  `spoc_no` varchar(20) NOT NULL,

  `spoc_email` varchar(255) NOT NULL,

  `total_beds` mediumint(9) NOT NULL,

  `available_beds` mediumint(9) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hospital_departments`

--



INSERT INTO `hospital_departments` (`id`, `hos_id`, `dept_id`, `status`, `facilities`, `open_at`, `close_at`, `spoc`, `block_no`, `floor_no`, `services`, `addon_services`, `spoc_no`, `spoc_email`, `total_beds`, `available_beds`) VALUES

(1, 'apl1', 'dept001', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '23', '3', '', '', '0', '', 100, 100),

(2, 'apl1', 'dept002', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '34', '1', '', '', '0', '', 100, 100),

(3, 'apl1', 'dept003', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\npulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. \r\nDonec scelerisque sollicitudin enim eu venenatis. ', '14:00:00', '23:00:00', 'Bhawesh Multani', 'aa/45', '2nd', 'Display ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\npulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. \r\nDonec scelerisque sollicitudin enim eu venenatis. ', '8765345123', 'bhwaesh@example.com', 100, 100),

(4, 'apl1', 'dept004', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '22/a', 'G', '', '', '0', '', 100, 100),

(5, 'apl1', 'dept005', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(6, 'frts1', 'dept001', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(7, 'frts1', 'dept002', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(8, 'frts1', 'dept003', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(9, 'frts1', 'dept004', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(10, 'frts1', 'dept005', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(11, 'kh1', 'dept001', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(12, 'kh1', 'dept002', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(13, 'kh1', 'dept003', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(14, 'kh1', 'dept004', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(15, 'kh1', 'dept005', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(16, 'wd1', 'dept001', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(17, 'wd1', 'dept002', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(18, 'wd1', 'dept003', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(19, 'wd1', 'dept004', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(20, 'wd1', 'dept005', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(54, 'amri1', 'dept004', 1, 'kuwcrmyerud,i', '18:34:00', '19:34:00', '', '5A', '3A', 'i, unglcnsfuaxunl', 'l, ncf,lscnhfmf', '', '', 100, 100),

(26, 'ckbh1', 'dept001', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(27, 'ckbh1', 'dept002', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(28, 'ckbh1', 'dept008', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(29, 'ckbh1', 'dept004', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(30, 'ckbh1', 'dept006', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(31, 'msh1', 'dept001', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(32, 'msh1', 'dept002', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(33, 'msh1', 'dept008', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(34, 'msh1', 'dept004', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(35, 'msh1', 'dept006', 0, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(42, 'amri1', 'dept001', 1, 'Replacement of missing teeth, Cavity Filling, Teeth Whitening / Bleaching', '00:00:00', '00:00:00', '', '223/ea', '4', '', '', '0', '', 100, 100),

(44, 'amri1', 'dept006', 1, 'Office- and Clinic-Based Ambulatory Care. \r\nMedical Imaging (Diagnostic Radiology) \r\nPathology and Laboratory Medicine.\r\nSurgery.\r\nRadiation Therapy.\r\nSystemic Cancer Therapy or Chemotherapy.\r\nPalliative Care and Supportive Care.\r\nSurvivorship', '00:00:00', '00:00:00', '', '12/aa', '2', '', '', '0', '', 100, 100),

(40, 'amri1', 'dept007', 1, 'radiology are physicians which have specialized in the field after completing their general degree in medicine. Upon successful completion of a residency program, many urologists choose to undergo further advanced training in a subspecialty area of expertise through a fellowship lasting an additional 12 to 36 months', '00:00:00', '00:00:00', '', '4', '5', '', '', '0', '', 100, 100),

(41, 'amri1', 'dept000X-Ray', 1, 'Xrays are physicians which have specialized in the field after completing their general degree in medicine. Upon successful completion of a residency program, many urologists choose to undergo further advanced training in a subspecialty area of expertise through a fellowship lasting an additional 12 to 36 months', '10:00:00', '20:00:00', 'Sanju Biswas', '5A', '3A', 'all type on X-Rays', 'report home delivery', '8981822725', 'mailtoprithul@gmail.com', 100, 98),

(39, 'apl1', 'dept000Urology', 0, 'Urologists are physicians which have specialized in the field after completing their general degree in medicine. Upon successful completion of a residency program, many urologists choose to undergo further advanced training in a subspecialty area of expertise through a fellowship lasting an additional 12 to 36 months', '00:00:00', '00:00:00', '', '', '', '', '', '0', '', 100, 100),

(61, 'apl1', 'dept006', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\npulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. \r\nDonec scelerisque sollicitudin enim eu venenatis. ', '14:16:00', '16:16:00', 'kunal khemu', '5A', '3A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\npulvinar facilisis justo mollis, auctor consequat urna.', 'Morbi a bibendum metus. \r\nDonec scelerisque sollicitudin enim eu venenatis. ', '8762347651', 'kunal@khemu.com', 100, 100),

(65, 'amri1', 'dept003', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\npulvinar facilisis justo mollis, auctor consequat urna.', '09:32:00', '12:32:00', 'Sanju Biswas', 'aa/45', '3A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\npulvinar facilisis justo mollis, auctor consequat urna.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\npulvinar facilisis justo mollis, auctor consequat urna.', '8765765443', 'bhwaesh@example.com', 100, 100),

(66, 'msh1', 'dept005', 1, 'Ear Nose Throat', '02:34:00', '05:34:00', '', 'aa/45', '2nd', 'orem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', '', '', '', 100, 100),

(67, 'msh1', 'dept007', 1, 'orem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', '02:43:00', '04:43:00', '', '5A', '2nd', 'orem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'orem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', '', '', 100, 100),

(68, 'msh1', 'dept000Urology', 1, 'orem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', '01:44:00', '04:44:00', '', '5A', '3A', 'orem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', '', '', '', 100, 100),

(72, 'apl1', 'dept008', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\n', '00:12:00', '12:12:00', '', 'aa/45', '3A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\n', '', '', 300, 295),

(74, 'apl1', 'dept009', 1, 'loremipsum', '00:19:00', '12:19:00', '', '5A', '2nd', 'loremipsum', 'loremipsum', '', '', 400, 209),

(75, 'amri1', 'dept005', 1, 'jasdgfkabskdjvbskudvnkasunvdkajsdnckdackuhasf', '19:42:00', '19:43:00', 'Arpan Nag', '5A', '3A', 'asm,dfbjawk.f chiaslihckih ahil;isahli ckieh kliherkihsdlkfh he kihf lisdlfknsd', 'sadf .,jhekflh cidh isadnfkjnfkvn ksdj fnk ;ahdf', '8765345123', 'sarpan@email.com', 100, 56);



-- --------------------------------------------------------



--

-- Table structure for table `hospital_details`

--



CREATE TABLE `hospital_details` (

  `id` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `hos_name` varchar(100) NOT NULL,

  `country` varchar(50) NOT NULL,

  `state` varchar(50) NOT NULL,

  `city` varchar(50) NOT NULL,

  `zip` varchar(10) NOT NULL,

  `email_id` varchar(80) NOT NULL,

  `phone` int(20) NOT NULL,

  `logo` varchar(100) NOT NULL,

  `about` longtext NOT NULL,

  `cover_pic` varchar(100) NOT NULL,

  `address` varchar(1000) NOT NULL,

  `emc` tinyint(1) NOT NULL DEFAULT 1

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hospital_details`

--



INSERT INTO `hospital_details` (`id`, `hos_id`, `hos_name`, `country`, `state`, `city`, `zip`, `email_id`, `phone`, `logo`, `about`, `cover_pic`, `address`, `emc`) VALUES

(1, 'apl1', 'Apollo', 'india', 'west bengal', 'kolkata', '700001', 'apollo@apl.com', 25425423, 'apollo.png', 'Apollo Hospitals Enterprise Limited is an Indian hospital chain based in Chennai, India. It was founded by Prathap C. Reddy in 1983 as the first corporate healthcare provider in India.', 'apollo_hospital.jpg', 'Kolkata,WB,IN', 0),

(2, 'frts1', 'Fortis', 'india', 'west bengal', 'kolkata', '700001', 'fortis@frst.com', 25425423, 'fortislogo.png', 'Fortis Healthcare Limited is a chain of private hospitals headquartered in India. Fortis started its health care operations from Mohali where first Fortis hospital was started. Later on, the hospital chain purchased the healthcare branch of Escorts group and increased its strength in various parts of the country.', 'fortis_hospital.jpeg', '', 1),

(6, 'kh1', 'Kothari Hospital', 'india', 'west bengal', 'kolkata', '700001', 'kothari@kh.com', 25425423, 'kothari.png', 'kothari Medical Centre Eastern India\'s premier ultramodern, tertiary care hospital situated in Kolkata, is recognized nationally and internationally for its tradition of excellence in care. A mission to assimilate the finest medical & surgical talents with excellent diagnostic and surgical facilities.', 'kothari_cover.jpg', '', 0),

(7, 'wd1', 'Woodland Hospital', 'india', 'West Bengal', 'kolkata', '700123', 'woodland@wd.com', 25421701, 'woodlands.jpg', 'Established in 1946, Woodlands Hospital, the flagship of Eastern India started as a secondary care unit and gradually developed as a Tertiary Care Unit over the years. In our 70 years of journey, we have touched the lives of millions of patients of Kolkata, Eastern India and other neighbouring countries.', 'woodland_cover.jpeg', '', 1),

(3, 'amri1', 'AMRI', 'india', 'West Bengal', 'kolkata', '700123', 'amri@am.com', 25421701, 'download.png', 'AMRI Hospitals Ltd is the premier private healthcare provider of Eastern India, with three super specialty hospitals at Dhakuria, Mukundapur, and Salt Lake, in Kolkata, a state-of-the-art daycare centre on Southern Avenue in Kolkata, and another super specialty hospital at Bhubaneswar, Odisha.', 'AMRI_Hospital.jpeg', '', 0),

(5, 'ckbh1', 'C.K. Birla Hospital', 'india', 'West Bengal', 'kolkata', '700123', 'ckbirla@ckb.com', 25421701, 'ckbirla.jpg', 'The CK Birla Hospital is a NABH accredited, multi-speciality hospital located in Gurugram. It is part of the $2.4 billion diversified CK Birla Group. The hospital based on international standards and protocols has a strong focus on clinical quality and care.', 'ck_cover.jpeg', '', 1),

(4, 'msh1', 'Medica Hospital', 'india', 'west bengal', 'kolkata', '700001', 'medica@msh.com', 25425423, 'medical.png', 'Medica Superspecialty Hospital is a multi-speciality hospital on EM Bypass in Mukundapur, Kolkata. It is headed by Dr. Alok Roy of Medica Group of Hospitals. It is one of the largest hospitals in eastern India and is part of the Medica Hospital chain.', 'Medica_ach.jpg', '', 0);



-- --------------------------------------------------------



--

-- Table structure for table `hospital_diagnostics`

--



CREATE TABLE `hospital_diagnostics` (

  `id` int(11) NOT NULL,

  `diag_id` varchar(100) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `p_name` varchar(150) NOT NULL,

  `p_details` varchar(255) NOT NULL,

  `pre_testinfo` text NOT NULL,

  `loc_type` varchar(100) NOT NULL,

  `avail_hrs` text NOT NULL,

  `report_delivary` varchar(150) NOT NULL,

  `price` decimal(10,2) NOT NULL,

  `stat` tinyint(4) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `hospital_diagnostics`

--



INSERT INTO `hospital_diagnostics` (`id`, `diag_id`, `hos_id`, `p_name`, `p_details`, `pre_testinfo`, `loc_type`, `avail_hrs`, `report_delivary`, `price`, `stat`) VALUES

(2, 'apl160c3665d412ac', 'apl1', 'Demo2', 'Details', 'First sample to be provided, with overnight fasting. Second sample after 2 hours of having meal.', 'Home', 'mon-wed, 10am-5pm', 'in 2 days', '950.00', 1),

(3, 'apl160c36a920d75f', 'apl1', 'Test', 'Test details', 'no pretest require', 'Clinic', 'mon-wed: 11am-4pm', 'in 2 days', '1200.00', 1);



-- --------------------------------------------------------



--

-- Table structure for table `hospital_followers_doctor`

--



CREATE TABLE `hospital_followers_doctor` (

  `id` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `doc_id` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `hospital_followers_users`

--



CREATE TABLE `hospital_followers_users` (

  `id` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `hospital_offers`

--



CREATE TABLE `hospital_offers` (

  `coupon_id` int(11) NOT NULL,

  `offer_on` varchar(100) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `doc_id` varchar(100) NOT NULL,

  `treat_id` varchar(100) NOT NULL,

  `coupon_title` varchar(255) NOT NULL,

  `coupon_desc` mediumtext NOT NULL,

  `coupon_code` varchar(20) NOT NULL,

  `discount` decimal(10,0) NOT NULL,

  `status` tinyint(1) NOT NULL,

  `valid_till` date NOT NULL,

  `avail_count` int(11) NOT NULL,

  `creat_on` date NOT NULL DEFAULT current_timestamp()

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `hospital_offers`

--



INSERT INTO `hospital_offers` (`coupon_id`, `offer_on`, `hos_id`, `doc_id`, `treat_id`, `coupon_title`, `coupon_desc`, `coupon_code`, `discount`, `status`, `valid_till`, `avail_count`, `creat_on`) VALUES

(2, 'Doctor', 'apl1', 'dsb1', '', 'Cardio CheckUP', 'this is a test', 'APLOFFER25', '25', 1, '2021-03-27', 20, '2021-06-21'),

(4, 'Doctor', 'frts1', 'dvb1', '', 'Special Offer', 'this ia test.jfhbkhjsbfadk', 'FORTISSPL20', '20', 1, '2021-03-30', 50, '2021-06-21'),

(5, 'Doctor', 'apl1', 'dpp1', '', 'Full-Body Check Up', 'This is a test.', 'APLOFFER40', '40', 1, '2021-03-24', 2, '2021-06-21'),

(6, 'Doctor', 'apl1', 'dsb1', '', 'Gastro CheckUp', 'jhjyhfmhvnvtd', 'APOLLO56REF', '60', 1, '2022-02-23', 100, '2021-06-21'),

(7, 'Doctor', 'apl1', 'dsb1', '', 'Combo Offer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', 'APOLLOWHT321', '70', 1, '2022-07-20', 4, '2021-06-21'),

(10, 'Doctor', 'apl1', 'dpp1', '', 'ECG test', 'this is for testing purpose', 'APOLLODPP321', '40', 1, '2022-02-16', 5, '2021-06-21'),

(11, 'Doctor', 'amri1', 'dad1', '', 'Cardio Check', 'this is a test.', 'AMRIAAH123', '20', 0, '2021-05-01', 1, '2021-06-21'),

(14, 'Doctor', 'apl1', 'dsb1', '', 'Full-Body Check Up', 'This is a test.', 'APLOFFER40', '40', 1, '2021-03-24', 2, '2021-06-21'),

(15, 'Doctor', 'apl1', 'dsb1', '', 'DOC', 'this is test', 'APOLLOAAHRS123', '30', 1, '2021-12-15', 5, '2021-06-21'),

(16, 'Doctor', 'apl1', 'dsb1', '', 'DAXCADE10', 'GVSGVCSG', 'DFXZFCZ', '10', 1, '2021-07-02', 500, '2021-06-21'),

(18, 'Treatment', 'apl1', '', 'trt004', '15% Off', '15% off on Cosmetic Surgery', 'CS16RFYTRDR', '15', 1, '2021-07-10', 123, '2021-06-21'),

(19, 'Doctor', 'amri1', 'dad1', '', 'TEETH CHECKUP', 'ABCD', 'AMRI1234', '30', 1, '2021-06-30', 456, '2021-06-21'),

(20, 'Treatment', 'amri1', '', 'trt007', 'NOSE CHECKUP', 'ABCDEFG', 'AMRI1235', '30', 1, '2021-06-23', 231, '2021-06-21'),

(21, 'Doctor', 'amri1', 'dag12', '', 'NOSE CHECKUP', 'DSR', 'AMRI1234', '30', 1, '2021-06-29', 232, '2021-06-21'),

(22, 'Treatment', 'amri1', '', 'trt003', 'PEN CHECKUP', 'adedfG', 'AMRI1238', '90', 1, '2021-06-30', 524, '2021-06-21'),

(23, 'Doctor', 'amri1', 'DOC6065debac4db3', '', 'PEN CHECKUP', 'GH,JHKGUK', 'AMRI1238', '90', 1, '2021-06-23', 742, '2021-06-21'),

(24, 'Treatment', 'amri1', '', 'trt001', '6767687', 'CANCER CHECKUP', 'AMRI1234', '20', 1, '2021-06-29', 99, '2021-06-21'),

(25, 'Doctor', 'amri1', 'dag12', '', 'PEN CHECKUP', 'AWRW4E46', 'AMRI123455', '12', 1, '2021-06-30', 6969, '2021-06-21'),

(26, 'Treatment', 'amri1', '', 'trt005', 'PEN CHECKUP', 'grggrgg', 'AMRI12346', '40', 1, '2021-06-30', 0, '2021-06-21'),

(27, 'Doctor', 'apl1', '', '', 'PEN CHECKUP', 'ghyfyy', 'AMRI1234', '100', 1, '2021-06-26', 0, '2021-06-21'),

(28, 'Treatment', 'apl1', '', 'trt003', '10% Discount on Gastroenterology', '10% Discount on Gastroenterology', 'APOLLOGS10', '10', 1, '2021-07-31', 0, '2021-07-13');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_patients`

--



CREATE TABLE `hospital_patients` (

  `p_id` varchar(255) NOT NULL,

  `p_name` varchar(255) NOT NULL,

  `dob` date NOT NULL,

  `address` longtext NOT NULL,

  `gender` varchar(100) NOT NULL,

  `phone` varchar(100) NOT NULL,

  `whatsapp` varchar(255) NOT NULL,

  `email_id` varchar(255) NOT NULL,

  `hos_id` varchar(255) NOT NULL,

  `doc_id` varchar(255) NOT NULL,

  `createdOn` date NOT NULL DEFAULT current_timestamp()

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `hospital_patients`

--



INSERT INTO `hospital_patients` (`p_id`, `p_name`, `dob`, `address`, `gender`, `phone`, `whatsapp`, `email_id`, `hos_id`, `doc_id`, `createdOn`) VALUES

('amri1-1616141440', 'Bibek chowdhury', '1996-03-09', 'Aam Bagan, Madhyabaluria, Nabapally, Alo Bhawan', 'male', '+918981822725', '+918981822725', 'mailtoprithul@gmail.com', 'amri1', 'DOC6065debac4db3', '2021-06-21'),

('apl1-1616141746', 'Bibek chowdhury', '1995-01-01', 'Aam Bagan, Madhyabaluria, Nabapally, Alo Bhawan', 'male', '+918981822725', '918981822725', 'mailtoprithul@gmail.com', 'apl1', 'dsb1', '2021-06-21'),

('apl1-1616216103', 'Bibek chowdhury', '1996-07-30', 'Aam Bagan, Madhyabaluria, Nabapally, Alo Bhawan', 'male', '+918981822725', '918981822725', 'mailtoprithul@gmail.com', 'apl1', 'dpp1', '2021-06-21'),

('apl160bed02f73444', 'test', '2001-02-05', 'kol', 'male', '7596964186', '7596964186', 'shreyandey5@gmail.com', 'apl1', 'dab1', '2021-06-21'),

('P606c70d6381c8', 'Arpan Nag', '1996-12-06', '91/4/1 Bose Pukur Road', 'male', '08017008190', '918981822725', 'nag.arpan13@gmail.com', '', 'DOC6065debac4db3', '2021-06-21');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_patients_medication`

--



CREATE TABLE `hospital_patients_medication` (

  `id` int(100) NOT NULL,

  `hos_id` varchar(255) NOT NULL,

  `doc_id` varchar(255) NOT NULL,

  `p_id` varchar(255) NOT NULL,

  `treat_id` varchar(255) NOT NULL,

  `medicine` varchar(255) NOT NULL,

  `dosage` varchar(255) NOT NULL,

  `duration` int(100) DEFAULT NULL,

  `created_at` datetime NOT NULL DEFAULT current_timestamp()

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `hospital_patients_medication`

--



INSERT INTO `hospital_patients_medication` (`id`, `hos_id`, `doc_id`, `p_id`, `treat_id`, `medicine`, `dosage`, `duration`, `created_at`) VALUES

(1, 'apl1', 'dpp1', 'apl1-1616216103', 'trt004', 'xyz', '5', 5, '2021-06-26 17:22:40'),

(2, 'amri1', 'DOC6065debac4db3', 'amri1-1616141440', 'trt006', 'Paracetamol 200mg', '1 x 1 x 4', 30, '2021-04-21 18:32:13'),

(5, 'apl1', 'dpp1', 'apl1-1616216103', 'trt004', 'abc', '2 per day', 5, '2021-07-08 16:50:09'),

(6, 'apl1', 'dab1', 'apl160bed02f73444', 'trt004', 'qwerty', '3 per day', 5, '2021-07-10 19:10:09'),

(7, 'apl1', 'dsb1', 'apl1-1616141746', 'trt004', 'test', '10', 14, '2021-07-12 10:41:20');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_posts`

--



CREATE TABLE `hospital_posts` (

  `id` int(11) NOT NULL,

  `post_id` varchar(20) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `post_title` varchar(255) NOT NULL,

  `post_content` varchar(1000) NOT NULL,

  `image` varchar(100) NOT NULL,

  `post_time` date NOT NULL,

  `like_count` int(4) NOT NULL,

  `comment_count` int(4) NOT NULL,

  `share_count` int(4) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hospital_posts`

--



INSERT INTO `hospital_posts` (`id`, `post_id`, `hos_id`, `post_title`, `post_content`, `image`, `post_time`, `like_count`, `comment_count`, `share_count`) VALUES

(1, 'aplPst1', 'apl1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'Medica_ach.jpg', '2021-01-22', 50, 20, 8),

(2, 'aplPst2', 'apl1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'medica_covid.jpg', '2021-01-12', 200, 86, 20),

(3, 'frtsPst1', 'frts1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'Medica_ach.jpg', '2021-01-22', 50, 20, 8),

(4, 'frtsPst2', 'frts1', 'achievement', 'Fortis Healthcare is committed to clinical excellence through nurturing talent and providing world class infrastructure and medical technology. We believe that a content employee is high in commitment, motivation and can provide best patient care. We provide an environment that encourages the professional and personal growth', '', '2021-01-12', 200, 86, 20),

(5, 'amriPst1', 'amri1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'Medica_ach.jpg', '2021-01-22', 50, 20, 8),

(6, 'amriPst2', 'amri1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'medica_covid.jpg', '2021-01-12', 200, 86, 20),

(7, 'mshPst1', 'msh1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'Medica_ach.jpg', '2021-01-22', 50, 20, 8),

(8, 'mshPst2', 'msh1', 'achievement', 'But do you know the best ways to showcase and amplify this content? To help your content reach its potential, Ahava Leibtag, our founder and president, hosted a healthcare marketing webinar: “Cure Social Media Fatigue: 2019 Trends in Healthcare.”', '', '2021-01-28', 200, 86, 20),

(9, 'wdPst1', 'wd1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'Medica_ach.jpg', '2021-01-22', 50, 20, 8),

(10, 'wdPst2', 'wd1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'medica_covid.jpg', '2021-01-28', 200, 86, 20),

(11, 'ckbhPst1', 'ckbh1', 'achievement', 'Visible all day: Don’t worry about the ideal time to post. Stories are shown for 24 hours. Downloadable: You can download your Stories to use on other platforms or in other pieces of content. Discoverable: You know how you see Stories from people or brands you don’t follow? That means potential patients may see yours', '', '2021-01-22', 50, 20, 8),

(12, 'ckbhPst2', 'ckbh1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'medica_covid.jpg', '2021-01-28', 200, 86, 20),

(13, 'khPst1', 'kh1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'Medica_ach.jpg', '2021-01-22', 50, 20, 8),

(14, 'khPst2', 'kh1', 'achievement', 'Medica Hospital, Kolkata extends free health check-up for SCCWC 2020', 'medica_covid.jpg', '2021-01-28', 200, 86, 20);



-- --------------------------------------------------------



--

-- Table structure for table `hospital_registration`

--



CREATE TABLE `hospital_registration` (

  `id` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `hos_name` varchar(100) NOT NULL,

  `password` varchar(20) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hospital_registration`

--



INSERT INTO `hospital_registration` (`id`, `hos_id`, `hos_name`, `password`) VALUES

(6, 'msh1', 'Medica Hospital', 'medica'),

(3, 'apl1', 'Apollo', 'apollo'),

(4, 'frts1', 'Fortis', 'fortis'),

(5, 'amri1', 'AMRI', 'amri'),

(7, 'ckbh1', 'C.K. Birla Hospital', 'birla'),

(8, 'kh1', 'Kothari Hospital', 'kothari'),

(9, 'wd1', 'Woodland Hospital', 'woodland');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_review_user`

--



CREATE TABLE `hospital_review_user` (

  `review_id` int(11) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `review_title` varchar(100) NOT NULL,

  `review_content` longtext NOT NULL,

  `star_rating` varchar(11) NOT NULL,

  `star_rating_cleanliness` varchar(255) NOT NULL,

  `star_rating_accomodation` varchar(255) NOT NULL,

  `star_rating_availability` varchar(255) NOT NULL,

  `star_rating_facilities` varchar(255) NOT NULL,

  `datetime` datetime NOT NULL,

  `treat_id` varchar(100) NOT NULL,

  `dis_id` varchar(100) NOT NULL,

  `document` varchar(500) NOT NULL,

  `id_proof` varchar(100) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hospital_review_user`

--



INSERT INTO `hospital_review_user` (`review_id`, `hos_id`, `email_id`, `review_title`, `review_content`, `star_rating`, `star_rating_cleanliness`, `star_rating_accomodation`, `star_rating_availability`, `star_rating_facilities`, `datetime`, `treat_id`, `dis_id`, `document`, `id_proof`) VALUES

(1, 'apl1', 'example@gm.com', 'Very nice place for treatment', 'I visited this place in October.\r\n\r\nI was sick throughout the year and whatever multi-vitamins and tablets I had taken had no effect on me. I decided to try Ayurveda even though I was sceptical of the result.\r\n\r\nThe doctor recommended few kasayas and that I try this for 2 weeks and visit him back once every two weeks - for a total of 6 week period. After 2 months of this treatment, I am pleasantly surprised with the result. I am perfectly healthy and I\'m not very susceptible to cold and flu - my immunity has gone up considerably (at least it looks like it)', '5', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(2, 'apl1', 'mailto@gmail.com', 'Good hospital', 'It\'s a very good hospital with very good and experienced doctor . Their way of checking a patient is unique and calm', '4', '', '', '', '', '2021-01-22 00:00:00', '', '', '', ''),

(3, 'apl1', 'mail@gm.com', 'Very nice place for treatment', 'I visited this place in October.\r\n\r\nI was sick throughout the year and whatever multi-vitamins and tablets I had taken had no effect on me. I decided to try Ayurveda even though I was sceptical of the result.\r\n\r\nThe doctor recommended few kasayas and that I try this for 2 weeks and visit him back once every two weeks - for a total of 6 week period. After 2 months of this treatment, I am pleasantly surprised with the result. I am perfectly healthy and I\'m not very susceptible to cold and flu - my immunity has gone up considerably (at least it looks like it)', '5', '', '', '', '', '2021-01-26 00:00:00', '', '', '', ''),

(4, 'apl1', 'matl@gmail.com', 'Good hospital', 'It\'s a very good hospital with very good and experienced doctor . Their way of checking a patient is unique and calm', '4', '', '', '', '', '2021-02-15 00:00:00', '', '', '', ''),

(5, 'apl1', 'xyz@gm.com', 'Very nice place for treatment', 'I visited this place in October.\r\n\r\nI was sick throughout the year and whatever multi-vitamins and tablets I had taken had no effect on me. I decided to try Ayurveda even though I was sceptical of the result.\r\n\r\nThe doctor recommended few kasayas and that I try this for 2 weeks and visit him back once every two weeks - for a total of 6 week period. After 2 months of this treatment, I am pleasantly surprised with the result. I am perfectly healthy and I\'m not very susceptible to cold and flu - my immunity has gone up considerably (at least it looks like it)', '3', '', '', '', '', '2021-01-26 00:00:00', '', '', '', ''),

(6, 'apl1', 'prul@gmail.com', 'Good hospital', 'It\'s a very good hospital with very good and experienced doctor . Their way of checking a patient is unique and calm', '4', '', '', '', '', '2021-02-15 00:00:00', '', '', '', ''),

(7, 'frts1', 'example@gm.com', 'Very nice place for treatment', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '5', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(8, 'frts1', 'mailto@gmail.com', 'Good hospital', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '4', '', '', '', '', '2021-01-22 00:00:00', '', '', '', ''),

(9, 'frts1', 'mail@gm.com', 'Very nice place for treatment', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '2', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(10, 'frts1', 'm123@gmail.com', 'Good hospital', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '3', '', '', '', '', '2021-01-22 00:00:00', '', '', '', ''),

(11, 'frts1', 'mmb123@gmail.com', 'Very nice place for treatment', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '5', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(12, 'frts1', 'xyz@gm.com', 'Good hospital', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '5', '', '', '', '', '2021-01-22 00:00:00', '', '', '', ''),

(13, 'amri1', 'mmb123@gmail.com', 'Very nice place for treatment', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '5', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(14, 'amri1', 'xyz@gm.com', 'Good hospital', 'I had my shoulder replaced by Dr. Aibinder in the summer of 2020. Technically, it was a revision; I had previously had my shoulder replaced (a hemi) at a different hospital back in November of 2018 due to AVN from when I had chemotherapy. I\'m 43/6\'6\"/male. I appreciated that Dr. Aibinder seemed to be familiar with cases like mine and had ideas as to why my previous replacement may have failed. He was very attentive both pre- & post-surgery, checking in to make sure I understood what was going on and what to expect. He always took time to answer my questions and was very supportive and thorough throughout the whole process. I’m quite happy with my new shoulder, a reverse replacement. Despite still having some pain, it’s significantly less than before. Dr. Aibinder was able to suggest a modified, effective approach to a therapy regimen to do safely/remotely at home. Best of all, my range of motion is incredible… just weeks after surgery, I was able to once again touch the ceiling!', '5', '', '', '', '', '2021-01-22 00:00:00', '', '', '', ''),

(15, 'amri1', 'example@gm.com', 'Very nice place for treatment', 'Dr. Thampi is an outstanding doctor, as well as his office staff. I’ve been a patient of his for over 6 years. I’m living in chronic pain throughout my entire spine. I have spinal injury and cervical deformities. Dr. Thampi takes his time to get to know you and listens to you when you’re explaining where the pain is. He works very hard to relieve as much pain as possible. I’m very picky with doctors and who I choose to trust. Dr. Thampi is kind, caring and very intelligent! I wouldn’t recommend going anywhere else because Dr. Thampi is special. Thank you for your our time.', '3', '', '', '', '', '2021-01-13 00:00:00', '', '', '', ''),

(16, 'amri1', 'mailto@gmail.com', 'Good hospital', 'Dr. Thampi is an outstanding doctor, as well as his office staff. I’ve been a patient of his for over 6 years. I’m living in chronic pain throughout my entire spine. I have spinal injury and cervical deformities. Dr. Thampi takes his time to get to know you and listens to you when you’re explaining where the pain is. He works very hard to relieve as much pain as possible. I’m very picky with doctors and who I choose to trust. Dr. Thampi is kind, caring and very intelligent! I wouldn’t recommend going anywhere else because Dr. Thampi is special. Thank you for your our time.', '5', '', '', '', '', '2021-01-28 00:00:00', '', '', '', ''),

(17, 'amri1', 'raf@ml.com', 'Very nice place for treatment', 'Dr. Thampi is an outstanding doctor, as well as his office staff. I’ve been a patient of his for over 6 years. I’m living in chronic pain throughout my entire spine. I have spinal injury and cervical deformities. Dr. Thampi takes his time to get to know you and listens to you when you’re explaining where the pain is. He works very hard to relieve as much pain as possible. I’m very picky with doctors and who I choose to trust. Dr. Thampi is kind, caring and very intelligent! I wouldn’t recommend going anywhere else because Dr. Thampi is special. Thank you for your our time.', '3', '', '', '', '', '2021-01-13 00:00:00', '', '', '', ''),

(18, 'amri1', 'new1@gmail.com', 'Good hospital', 'Dr. Thampi is an outstanding doctor, as well as his office staff. I’ve been a patient of his for over 6 years. I’m living in chronic pain throughout my entire spine. I have spinal injury and cervical deformities. Dr. Thampi takes his time to get to know you and listens to you when you’re explaining where the pain is. He works very hard to relieve as much pain as possible. I’m very picky with doctors and who I choose to trust. Dr. Thampi is kind, caring and very intelligent! I wouldn’t recommend going anywhere else because Dr. Thampi is special. Thank you for your our time.', '5', '', '', '', '', '2021-01-28 00:00:00', '', '', '', ''),

(19, 'msh1', 'example@gm.com', 'Very nice behaviour', 'Best of all. Got best treatment time to time.', '5', '', '', '', '', '2021-01-20 00:00:00', '', '', '', ''),

(20, 'msh1', 'mailto@gmail.com', 'Astonishingly rude behavior by the staff nurse', 'We apparently were new into the premises of the hospital and were visiting the pulmonology department for my sister lung care, where everything was quite smooth except a little bit long waiting for all the procedures,But one sister Digvijaya in IR d', '2', '', '', '', '', '2021-01-13 00:00:00', '', '', '', ''),

(21, 'msh1', 'xyz@gm.com', 'Extremely professional, adaptativ & gentle doctor.', 'I had delivery of my wife done by Dr Ganguly. She is an expert gyano, very gentle, humorous & adaptative. We asked change of delivery dates couple of times & she was very accommodating. Plus everytime, my wife consulted her, she kindly assist', '4', '', '', '', '', '2021-01-28 00:00:00', '', '', '', ''),

(23, 'kh1', 'example@gm.com', 'Very nice behaviour', 'I had delivery of my wife done by Dr Ganguly. She is an expert gyano, very gentle, humorous & adaptative. We asked change of delivery dates couple of times & she was very accommodating. Plus everytime, my wife consulted her, she kindly assist', '5', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(24, 'kh1', 'mailto@gmail.com', 'Astonishingly rude behavior by the staff nurse', 'Very rude staff, arrogant doctors, no respect for patient\'s time . You waste hoursand after unnecessary wait you have to get the refund and come back without any treatment or examination. Total waste of time', '2', '', '', '', '', '2021-01-23 00:00:00', '', '', '', ''),

(25, 'wd1', 'example@gm.com', 'Very nice behaviour', 'I had delivery of my wife done by Dr Ganguly. She is an expert gyano, very gentle, humorous & adaptative. We asked change of delivery dates couple of times & she was very accommodating. Plus everytime, my wife consulted her, she kindly assist', '5', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(26, 'wd1', 'mailto@gmail.com', 'Astonishingly rude behavior by the staff nurse', 'Very rude staff, arrogant doctors, no respect for patient\'s time . You waste hoursand after unnecessary wait you have to get the refund and come back without any treatment or examination. Total waste of time', '2', '', '', '', '', '2021-01-23 00:00:00', '', '', '', ''),

(27, 'ckbh1', 'example@gm.com', 'Very nice place for treatment', 'Good hospitality . I like the hospital very much. The nurse staff and others will take care of us good. Thnk all . God bless you', '5', '', '', '', '', '2021-01-21 00:00:00', '', '', '', ''),

(28, 'ckbh1', 'mailto@gmail.com', 'Astonishingly rude behavior by the staff nurse', 'Money minded people..They never take government insurance cards..work and services are very slow.. Management is very worst..If you have lot of money only you can visit. They make attenders to run for all.Delayed services', '3', '', '', '', '', '2021-01-20 00:00:00', '', '', '', ''),

(29, 'apl1', 'example@gm.com', 'Very nice place for treatment', 'Very good behaviour.. well maintained. Also has 1-2 good place to eat inside the premises.', '4', '', '', '', '', '2021-02-19 15:55:13', '', '', '', ''),

(30, 'amri1', 'example@gm.com', 'Very nice place for treatment', 'Very good behaviour.. well maintained. Also has 1-2 good place to eat inside the premises.', '4', '', '', '', '', '2021-02-28 15:55:13', '', '', '', ''),

(31, 'kh1', 'example@gm.com', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3', '', '', '', '', '2021-02-23 13:04:32', '', '', 'http://localhost/AAHRS/userUploads/admit%thsem.pdf', '5651237127368'),

(32, 'apl1', 'example@gm.com', 'New 1 ', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3', '', '', '', '', '2021-02-23 13:18:59', '', 'as1', '', ''),

(33, 'apl1', 'example@gm.com', 'New 12', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2', '', '', '', '', '2021-02-23 13:27:55', '', 'as1', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_515.png', '5651237127368'),

(34, 'kh1', 'example@gm.com', 'New 321', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2', '', '', '', '', '2021-02-23 13:32:38', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_516.png', '5651237127368'),

(35, 'frts1', 'example@gm.com', 'New 321', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2.6', '', '', '', '', '2021-02-23 13:38:57', '', '', '', ''),

(36, 'apl1', 'example@gm.com', 'New disease', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3.6', '', '', '', '', '2021-02-23 13:39:42', '', 'as1', '', ''),

(37, 'ckbh1', 'example@gm.com', 'New Hospital', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '2.6', '', '', '', '', '2021-02-23 13:59:06', '', '', '', ''),

(38, 'amri1', 'example@gm.com', 'New Treatment', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '1.6', '', '', '', '', '2021-02-23 14:01:16', 'trt005', '', '', ''),

(39, 'wd1', 'example@gm.com', 'New Hospital 12', 'A hospital is a health care institution providing patient treatment with specialized medical and nursing staff and medical equipment. ', '3.5', '', '', '', '', '2021-02-23 14:43:20', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-userProfile-Controller-postReview-2021-02-21-20_22_519.png', '5651237127368'),

(40, 'frts1', 'example@gm.com', 'New 24/2 hospital', 'very good hospital...', '3.3', '', '', '', '', '2021-02-24 12:16:44', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-01-25_18_36_25(2).png', '5651237127368'),

(41, 'apl1', 'example@gm.com', 'new apollo', 'very good hospital', '3.4', '', '', '', '', '2021-02-24 12:19:59', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-01-25_18_36_25(2)1.png', '5651237127368'),

(42, 'apl1', 'example@gm.com', 'New 12', 'Very good hospital', '3.6', '', '', '', '', '2021-02-24 12:22:42', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-01-25_18_36_25(2)2.png', '5651237127368'),

(43, 'msh1', 'example@gm.com', 'Very nice place for treatment', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', '4', '', '', '', '', '2021-03-17 12:08:38', 'trt001', '', '', ''),

(44, 'amri1', 'example@gm.com', 'New Remark', 'this is a new review to chk whether its working or not.', '3.5', '', '', '', '', '2021-03-10 08:05:12', '', '', 'http://localhost/AAHRS/userUploads/doctorProfileView.png', '5651237127368'),

(45, 'kh1', 'example@gm.com', 'New disease', 'this is for testing', '3.3', '', '', '', '', '2021-03-21 19:08:05', '', '', 'http://localhost/AAHRS/userUploads/screencapture-localhost-AAHRS-index-php-hospital-Controller-departments-2021-03-21-17_50_20.png', '5651237127368'),

(46, 'apl1', 'example@gm.com', 'asvb', 'asdfghjkl', '3.6', '2.8', '3.8', '3.3', '4.7', '2021-06-10 17:36:29', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_1335582.png', '18612'),

(47, 'apl1', 'example@gm.com', 'abc', 'adfghjklmnbvcxz', '3.5', '2.6', '4.4', '2.4', '4.7', '2021-06-10 17:38:55', '', '', 'http://localhost/AAHRS/userUploads/linux-lab3.PNG', '18612'),

(48, 'apl1', 'example@gm.com', 'test 1', 'Shreyabkubjdbjbkxzjbdm dajbdkudvkxzn ku akudkjviavkdjyvksjggdkjbkydhvjchvd', '3.4', '3.5', '4.6', '1.6', '3.8', '2021-06-10 18:32:53', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_1335589.png', '18612'),

(49, 'kh1', 'example@gm.com', 'test2', 'Syamhvdjchvbak agkdjvyvh aydhcvhkuvcc', '3.5', '3.2', '4.8', '1.7', '4.2', '2021-06-10 18:35:01', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355810.png', '18612'),

(50, 'frts1', 'example@gm.com', 'test3', 'Sjg,dfmh v,j ulsjugs,hvye nve', '4.0', '3.6', '3.7', '5', '3.9', '2021-06-10 18:38:09', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355811.png', '1565'),

(51, 'apl1', 'example@gm.com', 'abc', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '3.7', '2.9', '4.5', '2.6', '4.8', '2021-06-10 18:45:39', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355812.png', '1565'),

(52, 'frts1', 'example@gm.com', 'avb', 'asdfghj', '3.9', '4', '4.7', '3.6', '3.5', '2021-06-10 19:01:45', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355816.png', '1565'),

(53, 'kh1', 'example@gm.com', 'test 20', 'test 20 content', '3.0', '3.4', '1.4', '4.8', '2.6', '2021-06-10 19:03:31', '', '', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355817.png', '77777777');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_treatments`

--



CREATE TABLE `hospital_treatments` (

  `id` int(11) NOT NULL,

  `treat_id` varchar(100) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `duration` varchar(100) NOT NULL,

  `budget` varchar(100) NOT NULL,

  `dept_id` varchar(255) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `hospital_treatments`

--



INSERT INTO `hospital_treatments` (`id`, `treat_id`, `hos_id`, `duration`, `budget`, `dept_id`) VALUES

(1, 'trt001', 'amri1', '20', '15000', 'dept006'),

(2, 'trt002', 'amri1', '5', '10000', 'dept005'),

(3, 'trt003', 'amri1', '21', '18000', 'dept001'),

(4, 'trt004', 'amri1', '3', '40000', 'dept002'),

(5, 'trt005', 'amri1', '2', '7000', 'dept003'),

(6, 'trt006', 'amri1', '4', '20000', 'dept004'),

(8, 'trt00Otoplasty ', 'amri1', '5', '25000', 'dept005'),

(11, 'trt004', 'apl1', '40', '10000', 'dept002'),

(10, 'trt007', 'amri1', '40', '10000', 'dept007'),

(12, 'trt003', 'apl1', '20', '40000', 'dept001'),

(13, 'trt001', 'msh1', '7 ', '15000', 'dept006'),

(14, 'trt002', 'msh1', '50', '34000', 'dept005'),

(15, 'trt005', 'msh1', '21', '18000', 'dept003'),

(16, 'trt003', 'msh1', '40', '40000', 'dept001'),

(17, 'trt004', 'msh1', '40', '34000', 'dept002'),

(18, 'trt005', 'apl1', '40', '40000', 'dept003'),

(19, 'trt003', 'kh1', '60', '35000', 'dept001');



-- --------------------------------------------------------



--

-- Table structure for table `hospital_treatments_appointment`

--



CREATE TABLE `hospital_treatments_appointment` (

  `id` int(11) NOT NULL,

  `appt_id` varchar(100) NOT NULL,

  `appt_status` varchar(1) NOT NULL,

  `hos_id` varchar(100) NOT NULL,

  `treat_id` varchar(100) NOT NULL,

  `appt_datetime` date NOT NULL,

  `booking_datetime` datetime NOT NULL DEFAULT current_timestamp(),

  `user_id` varchar(100) NOT NULL,

  `email_status` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `hospital_treatments_appointment`

--



INSERT INTO `hospital_treatments_appointment` (`id`, `appt_id`, `appt_status`, `hos_id`, `treat_id`, `appt_datetime`, `booking_datetime`, `user_id`, `email_status`) VALUES

(1, 'APPT60eebd7fc18f5', '1', 'apl1', 'trt003', '2021-07-21', '2021-07-14 16:03:35', 'example@gm.com', 0);



-- --------------------------------------------------------



--

-- Table structure for table `leaves_details`

--



CREATE TABLE `leaves_details` (

  `id` int(11) NOT NULL,

  `emp_id` varchar(255) NOT NULL,

  `emp_name` varchar(255) NOT NULL,

  `leave_type` varchar(255) NOT NULL,

  `from_date` date NOT NULL,

  `to_date` date NOT NULL,

  `no_days` int(11) NOT NULL,

  `reason` varchar(255) NOT NULL,

  `stat` tinyint(1) NOT NULL DEFAULT 0,

  `hos_id` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `leaves_details`

--



INSERT INTO `leaves_details` (`id`, `emp_id`, `emp_name`, `leave_type`, `from_date`, `to_date`, `no_days`, `reason`, `stat`, `hos_id`) VALUES

(1, 'apl160b790cd8f39a', 'Arpan Nag', 'Medical Leave', '2021-06-09', '2021-06-10', 2, 'Vaccination', 0, 'apl1'),

(5, 'apl160b790cd8f39a', 'Arpan Nag', 'Other', '2021-06-09', '2021-06-09', 1, 'University Exam', 0, 'apl1'),

(10, 'apl160b77799a1f66', 'noob65', 'Medical Leave', '2021-06-10', '2021-06-20', 6, 'Bike accident', 0, 'apl1'),

(21, 'apl160b790cd8f39a', 'Arpan Nag', 'Other', '2021-06-24', '2021-06-25', 2, 'demo', 0, 'apl1'),

(22, 'apl160b790cd8f39a', 'Arpan Nag', 'Casual Leave', '2021-06-30', '2021-06-30', 1, 'test', 0, 'apl1'),

(23, 'apl160b77799a1f66', 'noob65', 'Medical Leave', '2021-06-23', '2021-06-28', 4, 'test test', 0, 'apl1');



-- --------------------------------------------------------



--

-- Table structure for table `post_likes_comment_share`

--



CREATE TABLE `post_likes_comment_share` (

  `id` int(11) NOT NULL,

  `email_id` varchar(255) NOT NULL,

  `post_id` varchar(255) NOT NULL,

  `likes` tinyint(1) NOT NULL DEFAULT 0,

  `comment` longtext DEFAULT NULL,

  `share` tinyint(1) NOT NULL DEFAULT 0,

  `comment_time` date DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `post_likes_comment_share`

--



INSERT INTO `post_likes_comment_share` (`id`, `email_id`, `post_id`, `likes`, `comment`, `share`, `comment_time`) VALUES

(0, 'example@gm.com', 'mshPst2', 1, 'hi', 0, '2021-06-22'),

(0, 'example@gm.com', 'mshPst2', 1, '', 0, '2021-06-22'),

(0, 'example@gm.com', 'mshPst2', 0, '', 0, '2021-06-22'),

(0, 'example@gm.com', 'mshPst2', 0, '', 0, '2021-06-22'),

(0, 'example@gm.com', 'wdPst2', 0, 'Hi', 0, '2021-06-25'),

(0, 'example@gm.com', 'wdPst2', 0, '', 0, '2021-06-25'),

(0, 'example@gm.com', 'wdPst2', 0, '', 0, '2021-06-25'),

(0, 'example@gm.com', 'wdPst2', 0, '', 0, '2021-06-25');



-- --------------------------------------------------------



--

-- Table structure for table `recommendme_search`

--



CREATE TABLE `recommendme_search` (

  `id` int(11) NOT NULL,

  `treat_id` varchar(255) NOT NULL,

  `user_id` varchar(255) NOT NULL,

  `search_time` datetime NOT NULL DEFAULT current_timestamp(),

  `budget` varchar(255) NOT NULL,

  `count` int(11) NOT NULL DEFAULT 1

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `recommendme_search`

--



INSERT INTO `recommendme_search` (`id`, `treat_id`, `user_id`, `search_time`, `budget`, `count`) VALUES

(4, 'trt003', 'example@gm.com', '2021-04-28 12:33:40', '50000', 14),

(5, 'trt003', '::1', '2021-04-28 12:34:31', '50000', 25),

(6, 'trt004', '::1', '2021-04-28 12:35:07', '50000', 7),

(7, 'trt004', 'example@gm.com', '2021-04-28 12:54:07', '50000', 1),

(8, 'trt005', 'example@gm.com', '2021-04-28 12:54:19', '50000', 2),

(9, 'trt006', 'example@gm.com', '2021-04-28 13:53:48', '50000', 4),

(10, 'trt001', 'example@gm.com', '2021-05-31 17:10:05', '50000', 5),

(11, 'trt001', 'example@gm.com', '2021-05-31 17:38:24', '25000', 1),

(12, 'trt001', 'example@gm.com', '2021-05-31 17:38:27', '10000', 1),

(13, 'trt001', 'example@gm.com', '2021-05-31 17:38:30', '', 2),

(14, 'trt003', 'noob@email.com', '2021-05-31 18:00:47', '50000', 1),

(15, 'trt003', 'noob101@email.com', '2021-05-31 18:50:11', '50000', 1),

(16, 'trt003', 'saha.akash.as@gmail.com', '2021-06-01 12:19:26', '50000', 1),

(0, '', 'example@gm.com', '2021-06-18 10:09:34', '', 1),

(0, 'trt003', 'example@gm.com', '2021-06-18 10:09:46', '', 1),

(0, 'trt00Otoplasty ', '::1', '2021-06-21 13:26:47', '50000', 1);



-- --------------------------------------------------------



--

-- Table structure for table `treatments`

--



CREATE TABLE `treatments` (

  `id` int(11) NOT NULL,

  `treat_id` varchar(100) NOT NULL,

  `dept_id` varchar(100) NOT NULL,

  `treat_name` varchar(255) NOT NULL,

  `treat_desc` varchar(500) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `treatments`

--



INSERT INTO `treatments` (`id`, `treat_id`, `dept_id`, `treat_name`, `treat_desc`) VALUES

(1, 'trt001', 'dept006', 'Cancer', 'Cancer is a medical term used to indicate any one of a large number of diseases, characterized by the development of abnormal cells. Diseased cells grow and divide uncontrollably. They have the capability to infiltrate and damage normal body tissue. '),

(2, 'trt002', 'dept005', 'ENT', 'ENT is a medical abbreviation for ears, nose and throat. A doctor who specializes in treating disorders related to these organs, is called an “ENT,” or in technical terms is an otolaryngologist. ENT Treatment in India is an important branch of medicine.'),

(3, 'trt003', 'dept001', 'Gastroenterology', 'Gastroenterology is primarily anxious with the digestive diseases. It target on the treatment of diseases that involve the gastrointestinal tract involving stomach, pancreas, gallbladder, esophagus, large intestine and small intestine. A Gastroenterologist perfectly diagnoses and treats the diseases of the digestive system'),

(4, 'trt004', 'dept002', 'Cosmetic Surgery', 'Cosmetic surgery is a medical regulation concentrate on appreciate beauty and arrival through surgical and medical capability. It is an extraordinarily broad field and can be implement on all areas of the bod; face, breates, thigh, stomach, etc. Cosmetic surgery is a part of plastic surgery but concentrated on appreciate beauty of a person.'),

(5, 'trt005', 'dept003', 'Urology', 'The surgical specialty that mainly concentrates on the diseases of the female and male urinary tracts along with male reproductive organs is known as urology. An urologist is required to study gynecology, pediatrics, internal medicine and other specialties as there could be many clinical problems associated.'),

(6, 'trt006', 'dept004', 'Oncology', 'Oncology is an exclusive branch of medicine that deals with the study and treatment of cancer. The term oncology derives from the Greek word onkos meaning bulk or tumor. Oncology mainly deals with the diagnosis of cancer, therapy which combines surgery, chemotherapy, radiotherapy and others.'),

(7, 'trt007', 'dept007', 'Nephrology', 'Nephrology is primarily concerned with the diagnosis and treatment of kidney diseases. Nephrology also includes hypertension, electrolyte disturbances and also those people who require renal placement therapy that also includes renal transplant patients'),

(8, 'trt008', 'dept008', 'Stomach Surgery', 'Cancer is a medical term used to indicate any one of a large number of diseases, characterized by the development of abnormal cells. Diseased cells grow and divide uncontrollably. They have the capability to infiltrate and damage normal body tissue. '),

(9, 'trt009', 'dept009', 'pathlogical surgery', 'ENT is a medical abbreviation for ears, nose and throat. A doctor who specializes in treating disorders related to these organs, is called an “ENT,” or in technical terms is an otolaryngologist. ENT Treatment in India is an important branch of medicine.'),

(10, 'trt010', 'dept006', 'Chemo therapy', 'Cancer is a medical term used to indicate any one of a large number of diseases, characterized by the development of abnormal cells. Diseased cells grow and divide uncontrollably. They have the capability to infiltrate and damage normal body tissue. '),

(11, 'trt00Otoplasty ', 'dept005', 'Otoplasty ', 'known as cosmetic ear surgery — is a procedure to change the shape, position or size of the ears. You might choose to have otoplasty if you\'re bothered by how far your ears stick out from your head. You might also consider otoplasty if your ear or ears are misshapen due to an injury or birth defect');



-- --------------------------------------------------------



--

-- Table structure for table `treatment_review_user`

--



CREATE TABLE `treatment_review_user` (

  `review_id` int(11) NOT NULL,

  `hos_id` varchar(255) NOT NULL,

  `treat_id` varchar(255) NOT NULL,

  `review_content` longtext NOT NULL,

  `review_title` varchar(255) NOT NULL,

  `star_rating` varchar(255) NOT NULL,

  `star_rating_treatment_promptness` varchar(255) NOT NULL,

  `star_rating_treatment_methodology` varchar(255) NOT NULL,

  `star_rating_treatment_services` varchar(255) NOT NULL,

  `star_rating_treatment_clinical_support` varchar(255) NOT NULL,

  `email_id` varchar(255) NOT NULL,

  `datetime` datetime NOT NULL,

  `document` varchar(550) NOT NULL,

  `id_proof` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `treatment_review_user`

--



INSERT INTO `treatment_review_user` (`review_id`, `hos_id`, `treat_id`, `review_content`, `review_title`, `star_rating`, `star_rating_treatment_promptness`, `star_rating_treatment_methodology`, `star_rating_treatment_services`, `star_rating_treatment_clinical_support`, `email_id`, `datetime`, `document`, `id_proof`) VALUES

(1, 'apl1', 'trt003', 'aaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssvvvvvvvvvvvvvvvvvvvvvvvvv', 'aaaaaaaaaaaaa', '3.8', '', '0', '0', '0', 'example@gm.com', '2021-06-10 18:11:52', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_1335584.png', '1256'),

(2, 'apl1', 'trt004', 'xfbgsdfbg', 'aaaaaaa', '3.3', '', '0', '0', '0', 'example@gm.com', '2021-06-10 18:12:51', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_1335585.png', '77777777'),

(3, 'apl1', 'trt004', ' nzhbsjdhmvgasmhnhdbxjstxfmsdhy', 'avb', '3.2', '3.2', '3.7', '4.3', '1.6', 'example@gm.com', '2021-06-10 18:15:35', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_1335586.png', '1565'),

(4, 'msh1', 'trt002', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut molestie lorem. Etiam id nisl in ligula ultricies dapibus sed eget tellus. Curabitur ultricies sem nec massa porttitor elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam velit mi, condimentum a lacinia quis, cursus non enim. Nam eu lobortis ligula. Duis eget tincidunt orci. Morbi viverra efficitur lectus sed egestas. Etiam mattis ligula vel eros tempus pretium. Donec et leo justo. In feugiat pellentesque justo, non vulputate elit condimentum id. Curabitur vel diam vel ligula efficitur fermentum. Mauris molestie sodales urna. Integer faucibus diam et nibh vulputate facilisis. Morbi gravida quis nibh ut bibendum.\r\n\r\nCras vestibulum lectus quam, ac vestibulum tortor viverra vitae. Donec et tellus ut ante facilisis tempus eget ut leo. Maecenas sodales pulvinar quam, a pharetra nunc euismod nec. Aenean at ex at lorem convallis vulputate nec quis metus. Morbi id ornare lorem. Suspendisse potenti. Aenean pharetra nisl enim, id interdum erat egestas nec. Mauris varius faucibus orci, at dapibus urna accumsan sed. Proin id pharetra erat. Sed non sem ac turpis auctor egestas. Donec lobortis eros a orci suscipit suscipit. Pellentesque accumsan ante ut lectus malesuada posuere. Etiam maximus, nisl eget posuere condimentum, ligula neque luctus diam, ut ornare ipsum arcu quis justo. Etiam congue velit ligula, a dictum arcu tincidunt a. Sed ut dolor in tellus tempor laoreet. Cras vitae ante libero.\r\n\r\nSed fermentum mi eu turpis varius, vitae imperdiet orci feugiat. Mauris tortor erat, laoreet id volutpat sed, suscipit cursus mi. Nam eu gravida mauris. Suspendisse commodo ex sit amet purus lobortis, molestie mollis dui volutpat. Curabitur consequat arcu ut tristique dictum. Vivamus tincidunt, dolor vitae dictum gravida, augue ante auctor sapien, consectetur rhoncus libero magna et ipsum. Donec id felis et ipsum dapibus sollicitudin.\r\n\r\nNunc eu feugiat metus. Vivamus dignissim ut eros ut mollis. Vestibulum sit amet accumsan tellus, a iaculis enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque aliquet pulvinar nunc, ut blandit neque interdum feugiat. Phasellus quis turpis lacus. Suspendisse rhoncus elementum erat, ac convallis ipsum blandit nec. Maecenas consectetur arcu in mauris laoreet blandit. Sed sodales aliquet tristique. Aliquam elementum, metus in viverra maximus, dui est tincidunt ex, sed sagittis libero ante a velit. Ut enim mi, commodo varius orci in, varius blandit ante. Etiam eu tortor nunc. Cras bibendum auctor dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n\r\nFusce eget magna et purus venenatis varius quis quis orci. Integer iaculis purus leo, nec mollis quam facilisis et. Vestibulum ultrices, lacus quis accumsan molestie, orci orci tempus mi, in cursus mi lacus vehicula neque. Pellentesque tempus, orci vitae auctor congue, est massa ultricies neque, quis posuere turpis ante in enim. Nunc feugiat diam lobortis augue venenatis, non ultrices urna tempus. Proin sollicitudin tellus quis semper molestie. Aliquam viverra sapien justo, ac posuere eros euismod id. Aliquam ac sagittis orci, in maximus nulla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut molestie lorem', '3.9', '3.7', '4.8', '2.4', '4.5', 'example@gm.com', '2021-06-16 11:46:11', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355826.png', '1256'),

(5, 'amri1', 'trt006', 'nsgggggggggggggggggggxcvk,jhggresdfcuyfhdtnxcmgvhjjhnytrsedcfghumjgfdvczxfcghbjgfjjhvfumdfhgfhnhgytrtdfhytsgfcgfxbvxfxgfxhhhgdhgdhtdhtdhdrrdrddyd', 'asvb', '2.3', '2.2', '4.8', '0.5', '1.5', 'example@gm.com', '2021-06-22 18:29:20', 'http://localhost/AAHRS/userUploads/Screenshot_2021-05-11_13355827.png', '18696');



-- --------------------------------------------------------



--

-- Table structure for table `user_details`

--



CREATE TABLE `user_details` (

  `id` int(11) NOT NULL,

  `picture` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `name` varchar(100) NOT NULL,

  `country` varchar(50) NOT NULL,

  `state` varchar(50) NOT NULL,

  `city` varchar(50) NOT NULL,

  `zip` varchar(10) NOT NULL,

  `phone` int(11) NOT NULL,

  `dob` date NOT NULL,

  `gender` varchar(7) NOT NULL,

  `blood_group` varchar(12) NOT NULL,

  `about` text NOT NULL,

  `treatment` varchar(255) NOT NULL,

  `disease` varchar(255) NOT NULL,

  `department` varchar(255) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `user_details`

--



INSERT INTO `user_details` (`id`, `picture`, `email_id`, `name`, `country`, `state`, `city`, `zip`, `phone`, `dob`, `gender`, `blood_group`, `about`, `treatment`, `disease`, `department`) VALUES

(1, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'mail@gm.com', 'bibek chy', 'xcvbxcvb', 'xcvbcb', 'xcvbcvb', 'fsdgsdg', 123435, '1996-03-17', '', '', '', '', '', ''),

(2, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'mailtl@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(3, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'maitl@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(4, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'matl@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(5, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'm123@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(6, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'mmb123@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(7, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'xyz@gm.com', 'xyz', 'india', 'wb', 'kolkata', '12345', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(8, 'http://localhost/AAHRS/userUploads/unnamed11.jpg', 'example@gm.com', 'Bibek Chowdhury', 'India', 'West Bengal', 'Kolkata', '700049', 2147483647, '1996-03-17', 'Male', 'AB+', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Cancer', '', 'Cancer'),

(9, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'mailto@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(10, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'prithul@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(11, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'prul@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(12, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'mailt@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(13, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'new1@gmail.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(14, 'http://localhost/AAHRS/userUploads/1602180071566-71ea819c-4af7-4831-bdef-1452072167f0_17.jpg', 'raf@ml.com', 'Bibek chowdhury', 'India', 'West Bengal', 'Kolkata', '700126', 2147483647, '1996-03-17', '', '', '', '', '', ''),

(15, '', 'arpan@gmail.com', 'arpan', 'India', 'West Bengal', 'Kolkata', '700042', 1234567890, '1996-03-17', '', '', '', '', '', ''),

(16, '', 'souvik@sm.com', 'souvik', '', '', '', '', 2147483647, '0000-00-00', '', '', '', '', '', ''),

(17, '', 'arpan@dd.com', 'arpan', '', '', '', '', 2147483647, '0000-00-00', '', '', '', '', '', ''),

(22, '', 'bibek123@g.cpm', 'Bibek chowdhury', 'india', 'westbengal', 'Kolkata', '700126', 898182272, '0000-00-00', '', '', '', '', '', ''),

(21, '', 'pushpesh@htk.com', 'pushpesh pujan', 'india', 'west bengal', 'kolkata', '700124', 2147483647, '0000-00-00', '', '', '', '', '', ''),

(23, '', 'souvik1396@gmail.com', 'Souvik Sarkar', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', ''),

(24, '', 'nagarpan@gmail.com', 'Arpan Naga', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', ''),

(25, '', 'bibek@gm.cgmail.com', 'Bibek Kaku', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', ''),

(26, '', 'bibek1@gm.cgmail.com', 'Bibek Kaku', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', ''),

(27, '', 'arpan@gm.coM', 'Arpan Nag', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', ''),

(28, '', 'souviksarkar1396@gmail.com', 'Souvik Sarkar', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', ''),

(30, '', 'noob101@email.com', 'Noob 101', '', '', '', '', 0, '0000-00-00', '', '', '', 'Gastroenterology', 'Dengue Virus', 'Dietary'),

(29, '', 'noob@email.com', 'Noob', '', '', '', '', 0, '0000-00-00', '', '', '', 'Gastroenterology', 'Dengue Virus', 'Dietary');



-- --------------------------------------------------------



--

-- Table structure for table `user_medical_history`

--



CREATE TABLE `user_medical_history` (

  `id` int(11) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `type` varchar(255) NOT NULL,

  `Name` varchar(255) NOT NULL,

  `report_prescription` varchar(255) NOT NULL,

  `date` date NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `user_medical_history`

--



INSERT INTO `user_medical_history` (`id`, `email_id`, `type`, `Name`, `report_prescription`, `date`) VALUES

(1, 'example@gm.com', 'Report', 'Admit_Card_4th_Sem', 'userUploads/Admit_Card_4th_Sem.pdf', '2021-07-11'),

(4, 'example@gm.com', 'Prescription', 'HospitalControllerdepartments-2021-03-21', 'userUploads/screencapture-localhost-AAHRS-index-php-hospital-Controller-departments-2021-03-21-17_50_20.png', '2021-07-10');



-- --------------------------------------------------------



--

-- Table structure for table `user_posts`

--



CREATE TABLE `user_posts` (

  `id` int(11) NOT NULL,

  `post_id` varchar(100) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `post_title` varchar(255) NOT NULL DEFAULT 'post',

  `post_content` varchar(1000) NOT NULL,

  `image` varchar(100) NOT NULL,

  `post_time` date NOT NULL,

  `like_count` int(4) NOT NULL,

  `comment_count` int(4) NOT NULL,

  `share_count` int(4) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--

-- Table structure for table `user_registration`

--



CREATE TABLE `user_registration` (

  `id` int(11) NOT NULL,

  `email_id` varchar(100) NOT NULL,

  `password` varchar(20) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--

-- Dumping data for table `user_registration`

--



INSERT INTO `user_registration` (`id`, `email_id`, `password`) VALUES

(1, 'mailtoprithul@gmail.com', '12345'),

(2, 'mail@gm.com', '234'),

(3, 'mailtl@gmail.com', '12345'),

(4, 'maitl@gmail.com', '12345'),

(5, 'matl@gmail.com', '12345'),

(6, 'm123@gmail.com', '1234'),

(7, 'mmb123@gmail.com', '1234'),

(8, 'xyz@gm.com', '1234'),

(9, 'example@gm.com', '1234'),

(10, 'mailto@gmail.com', '123'),

(11, 'prithul@gmail.com', '123'),

(12, 'prul@gmail.com', '123'),

(13, 'mailt@gmail.com', '123'),

(14, 'new1@gmail.com', '123'),

(15, 'raf@ml.com', '234'),

(16, 'arpan@gmail.com', 'arpan'),

(18, 'pushpesh@htk.com', 'asdasd'),

(19, 'bibek123@g.cpm', 'asdasd'),

(20, 'souvik@gmail.com', '123456789'),

(21, 'souvik13@gm.com', '123456789'),

(22, 'souvik1396@gmail.com', '123456789'),

(23, 'nagarpan@gmail.com', '123456789'),

(24, 'bibek@gm.cgmail.com', '123456789'),

(25, 'bibek1@gm.cgmail.com', '123456789'),

(26, 'arpan@gm.coM', 'rohansarkar'),

(27, 'souviksarkar1396@gmail.com', '123456789'),

(28, 'noob@email.com', '123456'),

(29, 'noob101@email.com', '123456'),

(46, 'saha.akash.as3@gmail.com', NULL),

(47, 'shreyandey5@gmail.com', NULL),

(48, 'shreyandey6@gmail.com', NULL),

(49, 'ecomproject2021mca@gmail.com', NULL);



-- --------------------------------------------------------



--

-- Table structure for table `user_report_issues`

--



CREATE TABLE `user_report_issues` (

  `id` int(11) NOT NULL,

  `name` varchar(255) NOT NULL,

  `email` varchar(255) NOT NULL,

  `phone_no` varchar(255) NOT NULL,

  `message` longtext NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--

-- Dumping data for table `user_report_issues`

--



INSERT INTO `user_report_issues` (`id`, `name`, `email`, `phone_no`, `message`) VALUES

(1, 'Bibek chowdhury', 'mailtoprithul@gmail.com', '+918981822725', 'hello');



--

-- Indexes for dumped tables

--



--

-- Indexes for table `chatbot`

--

ALTER TABLE `chatbot`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `chatbot_extra_queries`

--

ALTER TABLE `chatbot_extra_queries`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `contact_me`

--

ALTER TABLE `contact_me`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `departments`

--

ALTER TABLE `departments`

  ADD PRIMARY KEY (`dept_id`),

  ADD UNIQUE KEY `id` (`id`);



--

-- Indexes for table `department_review_user`

--

ALTER TABLE `department_review_user`

  ADD PRIMARY KEY (`review_id`),

  ADD KEY `dept_id` (`dept_id`),

  ADD KEY `hos_id` (`hos_id`),

  ADD KEY `email_id` (`email_id`);



--

-- Indexes for table `diseases`

--

ALTER TABLE `diseases`

  ADD PRIMARY KEY (`dis_id`),

  ADD UNIQUE KEY `id` (`id`);



--

-- Indexes for table `disease_articles`

--

ALTER TABLE `disease_articles`

  ADD PRIMARY KEY (`article_id`),

  ADD KEY `dis_id` (`dis_id`);



--

-- Indexes for table `doctors_appointment`

--

ALTER TABLE `doctors_appointment`

  ADD PRIMARY KEY (`appt_id`),

  ADD UNIQUE KEY `id` (`id`),

  ADD KEY `doc_id` (`doc_id`),

  ADD KEY `user_id` (`user_id`);



--

-- Indexes for table `doctors_experience`

--

ALTER TABLE `doctors_experience`

  ADD PRIMARY KEY (`exp_id`),

  ADD KEY `doc_id` (`doc_id`);



--

-- Indexes for table `doctors_schedule`

--

ALTER TABLE `doctors_schedule`

  ADD PRIMARY KEY (`id`),

  ADD KEY `doc_id` (`doc_id`);



--

-- Indexes for table `doctor_consults`

--

ALTER TABLE `doctor_consults`

  ADD PRIMARY KEY (`id`),

  ADD KEY `doc_id` (`doc_id`),

  ADD KEY `email_id` (`email_id`);



--

-- Indexes for table `doctor_details`

--

ALTER TABLE `doctor_details`

  ADD PRIMARY KEY (`email_id`),

  ADD UNIQUE KEY `id` (`id`),

  ADD KEY `doc_id` (`doc_id`),

  ADD KEY `hos_id` (`hos_id`),

  ADD KEY `specialization` (`specialization`);



--

-- Indexes for table `doctor_followers_users`

--

ALTER TABLE `doctor_followers_users`

  ADD PRIMARY KEY (`id`),

  ADD KEY `doc_id` (`doc_id`),

  ADD KEY `email_id` (`email_id`);



--

-- Indexes for table `doctor_posts`

--

ALTER TABLE `doctor_posts`

  ADD PRIMARY KEY (`post_id`),

  ADD UNIQUE KEY `id` (`id`),

  ADD KEY `doc_id` (`doc_id`);



--

-- Indexes for table `doctor_registration`

--

ALTER TABLE `doctor_registration`

  ADD PRIMARY KEY (`doc_id`),

  ADD UNIQUE KEY `id` (`id`);



--

-- Indexes for table `doctor_review_user`

--

ALTER TABLE `doctor_review_user`

  ADD PRIMARY KEY (`review_id`),

  ADD KEY `doc_id` (`doc_id`),

  ADD KEY `email_id` (`email_id`);



--

-- Indexes for table `doctor_treatments`

--

ALTER TABLE `doctor_treatments`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `emergency`

--

ALTER TABLE `emergency`

  ADD PRIMARY KEY (`emr_id`);



--

-- Indexes for table `faqs`

--

ALTER TABLE `faqs`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `holiday_list`

--

ALTER TABLE `holiday_list`

  ADD PRIMARY KEY (`id`),

  ADD KEY `hos_id` (`id`);



--

-- Indexes for table `hoscompare_search`

--

ALTER TABLE `hoscompare_search`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `hospital_advertisement`

--

ALTER TABLE `hospital_advertisement`

  ADD PRIMARY KEY (`ad_id`);



--

-- Indexes for table `hospital_consults`

--

ALTER TABLE `hospital_consults`

  ADD PRIMARY KEY (`id`),

  ADD KEY `hos_id` (`hos_id`),

  ADD KEY `email_id` (`email_id`);



--

-- Indexes for table `hospital_departments`

--

ALTER TABLE `hospital_departments`

  ADD PRIMARY KEY (`id`),

  ADD KEY `hos_id` (`hos_id`),

  ADD KEY `dept_id` (`dept_id`);



--

-- Indexes for table `hospital_details`

--

ALTER TABLE `hospital_details`

  ADD UNIQUE KEY `id` (`id`),

  ADD KEY `hos_id` (`hos_id`);



--

-- Indexes for table `hospital_followers_doctor`

--

ALTER TABLE `hospital_followers_doctor`

  ADD PRIMARY KEY (`id`),

  ADD KEY `hos_id` (`hos_id`),

  ADD KEY `doc_id` (`doc_id`);



--

-- Indexes for table `hospital_followers_users`

--

ALTER TABLE `hospital_followers_users`

  ADD PRIMARY KEY (`id`),

  ADD UNIQUE KEY `id` (`id`),

  ADD KEY `hos_id` (`hos_id`),

  ADD KEY `email_id` (`email_id`);



--

-- Indexes for table `hospital_offers`

--

ALTER TABLE `hospital_offers`

  ADD PRIMARY KEY (`coupon_id`);



--

-- Indexes for table `hospital_patients`

--

ALTER TABLE `hospital_patients`

  ADD PRIMARY KEY (`p_id`);



--

-- Indexes for table `hospital_patients_medication`

--

ALTER TABLE `hospital_patients_medication`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `hospital_review_user`

--

ALTER TABLE `hospital_review_user`

  ADD PRIMARY KEY (`review_id`);



--

-- Indexes for table `hospital_treatments_appointment`

--

ALTER TABLE `hospital_treatments_appointment`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `leaves_details`

--

ALTER TABLE `leaves_details`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `treatment_review_user`

--

ALTER TABLE `treatment_review_user`

  ADD PRIMARY KEY (`review_id`);



--

-- Indexes for table `user_details`

--

ALTER TABLE `user_details`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `user_medical_history`

--

ALTER TABLE `user_medical_history`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `user_registration`

--

ALTER TABLE `user_registration`

  ADD PRIMARY KEY (`id`);



--

-- Indexes for table `user_report_issues`

--

ALTER TABLE `user_report_issues`

  ADD PRIMARY KEY (`id`);



--

-- AUTO_INCREMENT for dumped tables

--



--

-- AUTO_INCREMENT for table `chatbot`

--

ALTER TABLE `chatbot`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;



--

-- AUTO_INCREMENT for table `chatbot_extra_queries`

--

ALTER TABLE `chatbot_extra_queries`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;



--

-- AUTO_INCREMENT for table `contact_me`

--

ALTER TABLE `contact_me`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;



--

-- AUTO_INCREMENT for table `departments`

--

ALTER TABLE `departments`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;



--

-- AUTO_INCREMENT for table `department_review_user`

--

ALTER TABLE `department_review_user`

  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;



--

-- AUTO_INCREMENT for table `diseases`

--

ALTER TABLE `diseases`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;



--

-- AUTO_INCREMENT for table `disease_articles`

--

ALTER TABLE `disease_articles`

  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;



--

-- AUTO_INCREMENT for table `doctors_appointment`

--

ALTER TABLE `doctors_appointment`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;



--

-- AUTO_INCREMENT for table `doctors_experience`

--

ALTER TABLE `doctors_experience`

  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;



--

-- AUTO_INCREMENT for table `doctors_schedule`

--

ALTER TABLE `doctors_schedule`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;



--

-- AUTO_INCREMENT for table `doctor_consults`

--

ALTER TABLE `doctor_consults`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;



--

-- AUTO_INCREMENT for table `doctor_details`

--

ALTER TABLE `doctor_details`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;



--

-- AUTO_INCREMENT for table `doctor_followers_users`

--

ALTER TABLE `doctor_followers_users`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



--

-- AUTO_INCREMENT for table `doctor_posts`

--

ALTER TABLE `doctor_posts`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;



--

-- AUTO_INCREMENT for table `doctor_registration`

--

ALTER TABLE `doctor_registration`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;



--

-- AUTO_INCREMENT for table `doctor_review_user`

--

ALTER TABLE `doctor_review_user`

  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;



--

-- AUTO_INCREMENT for table `doctor_treatments`

--

ALTER TABLE `doctor_treatments`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;



--

-- AUTO_INCREMENT for table `faqs`

--

ALTER TABLE `faqs`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;



--

-- AUTO_INCREMENT for table `holiday_list`

--

ALTER TABLE `holiday_list`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;



--

-- AUTO_INCREMENT for table `hospital_offers`

--

ALTER TABLE `hospital_offers`

  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;



--

-- AUTO_INCREMENT for table `hospital_patients_medication`

--

ALTER TABLE `hospital_patients_medication`

  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;



--

-- AUTO_INCREMENT for table `hospital_review_user`

--

ALTER TABLE `hospital_review_user`

  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;



--

-- AUTO_INCREMENT for table `hospital_treatments_appointment`

--

ALTER TABLE `hospital_treatments_appointment`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;



--

-- AUTO_INCREMENT for table `leaves_details`

--

ALTER TABLE `leaves_details`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;



--

-- AUTO_INCREMENT for table `treatment_review_user`

--

ALTER TABLE `treatment_review_user`

  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;



--

-- AUTO_INCREMENT for table `user_details`

--

ALTER TABLE `user_details`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;



--

-- AUTO_INCREMENT for table `user_medical_history`

--

ALTER TABLE `user_medical_history`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



--

-- AUTO_INCREMENT for table `user_registration`

--

ALTER TABLE `user_registration`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;



--

-- AUTO_INCREMENT for table `user_report_issues`

--

ALTER TABLE `user_report_issues`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

