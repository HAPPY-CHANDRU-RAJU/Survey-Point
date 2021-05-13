-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2020 at 02:32 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Survey_Points`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin_Login`
--

CREATE TABLE `Admin_Login` (
  `Admin_Id` varchar(250) NOT NULL,
  `Admin_Name` varchar(50) NOT NULL,
  `Admin_Mail` varchar(50) NOT NULL,
  `Admin_password` varchar(250) NOT NULL,
  `Admin_Status` varchar(50) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admin_Login`
--

INSERT INTO `Admin_Login` (`Admin_Id`, `Admin_Name`, `Admin_Mail`, `Admin_password`, `Admin_Status`) VALUES
('8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'HAPPY CHANDRU RAJU', 'rajuashwin1410@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ACTIVE'),
('8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12776GUFsafayd8as7fahsdshgad', 'SANIYA', 'saniya@surveyking.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ACTIVE'),
('8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12776GUFsafayd8as7fahsdshgadsadhas', 'SNEHA KULKARNI', 'snehakulkarni@surveyking.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ACTIVE'),
('va8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12776GUFsafayd8as7fahsdshgadsa', 'POOJA P M', 'poojapm@surveyking.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `Survey_Activty`
--

CREATE TABLE `Survey_Activty` (
  `Survey_Act_Id` varchar(300) NOT NULL,
  `Survey_Act_Name` varchar(250) NOT NULL,
  `Survey_Act_Cate_Id` varchar(250) NOT NULL,
  `Survey_Act_Bio` varchar(500) NOT NULL DEFAULT '-',
  `Survey_Act_Status` varchar(12) NOT NULL DEFAULT 'ACTIVE',
  `Survey_Act_DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Survey_Act_Author` varchar(50) NOT NULL DEFAULT 'Open Survey',
  `Survey_Act_Author_Id` varchar(250) NOT NULL,
  `Survey_Act_Rating` varchar(6) NOT NULL DEFAULT '0',
  `Survey_Act_Cate_name` varchar(50) NOT NULL,
  `Survey_Act_No_ques` varchar(150) NOT NULL DEFAULT '6',
  `Survey_Act_Credit` varchar(150) NOT NULL DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Survey_Answer`
--

CREATE TABLE `Survey_Answer` (
  `Survey_Answer_Id` varchar(250) NOT NULL,
  `Survey_Create_ID` varchar(250) NOT NULL,
  `Survey_Creater_FAq_Id` varchar(250) NOT NULL,
  `Survey_Creater_opt1` varchar(10) NOT NULL,
  `Survey_Creater_opt2` varchar(10) NOT NULL,
  `Survey_Creater_opt3` varchar(10) NOT NULL,
  `Survey_Creater_opt4` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Survey_Answer_txt`
--

CREATE TABLE `Survey_Answer_txt` (
  `Survey_Answer_Id` varchar(250) NOT NULL,
  `Survey_Create_ID` varchar(250) NOT NULL,
  `Survey_Creater_FAq_Id` varchar(250) NOT NULL,
  `Survey_Creater_answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Survey_Attender`
--

CREATE TABLE `Survey_Attender` (
  `Survey_attender_Id` varchar(250) NOT NULL,
  `Survey_attender_mail` varchar(250) NOT NULL,
  `Survey_attender_Activity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Survey_Category`
--

CREATE TABLE `Survey_Category` (
  `Survey_Cat_Id` varchar(300) NOT NULL,
  `Survey_Cat_Name` varchar(150) NOT NULL,
  `Survey_Cat_DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Survey_Cat_No_Of_Post` varchar(15) NOT NULL DEFAULT '0',
  `Survey_Cat_Status` varchar(12) NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Survey_Category`
--

INSERT INTO `Survey_Category` (`Survey_Cat_Id`, `Survey_Cat_Name`, `Survey_Cat_DOC`, `Survey_Cat_No_Of_Post`, `Survey_Cat_Status`) VALUES
('0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'Colleges', '2020-05-10 23:30:03', '0', 'ACTIVE'),
('19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'EVents', '2020-05-10 23:29:51', '0', 'ACTIVE'),
('85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'Tourist Place', '2020-05-10 23:29:38', '0', 'ACTIVE'),
('90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'products', '2020-05-08 04:53:21', '2', 'ACTIVE'),
('f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'Companies', '2020-05-11 00:13:15', '4', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `Survey_Events`
--

CREATE TABLE `Survey_Events` (
  `Survey_Create_ID` varchar(250) NOT NULL,
  `Survey_Creater_Title` varchar(150) NOT NULL,
  `Survey_Creater_Name` varchar(50) NOT NULL,
  `Survey_Creater_ID` varchar(250) NOT NULL,
  `Survey_Creater_Cat_ID` varchar(150) NOT NULL,
  `Survey_Creater_DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Survey_Creater_Status` varchar(150) NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Survey_FAQ`
--

CREATE TABLE `Survey_FAQ` (
  `Survey_Cat_FAQ_Id` varchar(250) NOT NULL,
  `Survey_Cat_FAQ_Title` varchar(150) NOT NULL,
  `Survey_Cat_Id_FAQ` varchar(250) NOT NULL,
  `Survey_Cat_FAQ_Type` varchar(15) NOT NULL,
  `Survey_Cat_FAQ_Status` varchar(12) NOT NULL DEFAULT 'ACTIVE',
  `Survey_Cat_FAQ_DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Survey_FAQ`
--

INSERT INTO `Survey_FAQ` (`Survey_Cat_FAQ_Id`, `Survey_Cat_FAQ_Title`, `Survey_Cat_Id_FAQ`, `Survey_Cat_FAQ_Type`, `Survey_Cat_FAQ_Status`, `Survey_Cat_FAQ_DOC`) VALUES
('037cd883995f250095b98acb0d1e1ef3d59390e69d8d3dcd9a3d6b0cb0d58586', 'How likely are you to suggest the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('06f71d3b77eb4d4bc22231a062ad386d7e49cb67e965b1a2fd5a7104287a39b5', 'How approachable are the teachers?', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('097af4d1c79a5e10cabb497ea2df5e15343dd36b12b03631dd38256b8a96b350', 'How likely are you to suggest this place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('0994a610f728b238368ef06de04086055d45ffc7e3cafb2dba3f98839257cb0a', 'How organized was the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('0b4571ab780777bffad05cce5eee76d9d7c1408ff26e7e922c76959cf4777b7a', 'How easy was it for you to obtain the necessary resources from the college library?', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('11b003f23188246bfb5df2c3ed71ff08bda0d3a4de2c8ff16bec895c18f77799', 'How well does our product meet your needs?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('13a6b4d9599187e83c1cc48bcfa16895f48794d47ac4b3b2ab93e22c4f5baf17', 'Overall, how happy are you with the college?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('152b5c0f4fefd8e61d28c34203f33d0a242328cc37cfdc55f178baa901d98a5e', 'Did the event meet your expectations?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('19090b0ca7d15bce80aa139c2b1ed9a31bfed7da20c2a6ab25cbb95d2e709ca6', 'What were your favourite moments or experiences?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'TXT', 'ACTIVE', '2020-05-08 06:05:35'),
('1d9b8a87a0a32eabb58cafdd50dd000dbebf1fe1d8255cdfb952ca5c3a9b4170', 'How satisfied are you by the variety of food items available in the cafeteria?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('1e162c7fe634a28f8e9a64a34796d5abdb62e48fdd5a68568a59e0fa41c2fe6a', 'How happy are you with the geographical location of the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('1e9bf5ec4861af6c8464d2b707fd21d4866aa097309f239e1831cadbe608241b', 'How comfortable was your stay at the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('1f299fa045cbbaef97ca1c4fe8afcf74a979106699dde4b353bd1fb0d47b766d', 'How did you get to know about our product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('1fd7c1de3c8c3b4f299fa8c98464ece5454201ff8006d6b4598ee455adf0d449', 'Were the people in that place friendly and cooperative?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('205a401897e5884f51f9cba3a50148e958894032f6ae0d6c3d60f28c2f8db8e6', 'Do you have the flexibility to take time off when you need to?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('2c91c685e7ba04e9e70a79bcaab67138fcb5914be740db857b7a0ad9d79bd9cb', 'Did the place meet your expectations?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('2d767a2e725a905580887e6eb0f07be64d3cf1c9f1c2d3493df9997a6fdd6908', 'Which features are most valuable to you?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'TXT', 'ACTIVE', '2020-05-08 06:52:27'),
('2ee9719c7f0250638cf2540bc251390c694bc6b8ffb86023e8569adb02c75c55', 'How did you hear about this event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('30fc01a8167b86baf8ca34025781bfc3dbcb62b411e5a030e3faa547d41aa57b', 'How many times have you visited this place before?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('339a0929673b4447ce90b9863e451c89ce83b207798554507340c6e8f767da3a', 'Which type of accommodation did you stay in?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('33b65bad19f8e9ea79e467a66638fc4dfa6082a6e9de062f489584bac42ff9e2', 'How friendly was the staff?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('37b50e5d08d662fba93255e57e1ba37a344726b08a25c501e1beb59c91fe47b0', 'Do you have someone at your workplace that you consider a friend?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('388df1fb13a510aba4b0200125dc8c7bac41f3311478ddfe8be9c92fd03303fb', 'How easy is it to use our product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('4418038b3de2bee4d6dbc5ac2a780c0e0d9877b9bdfcaaae79b128ef6a5c2670', 'How likely are you to recommend your organization as a good place to work?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('45ab7ebd42f1510a09827245b0733688f9320411b0fc62d75f46a78c5c24a05b', 'What do you like about the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'TXT', 'ACTIVE', '2020-05-08 06:05:35'),
('45d789d66af626878f6196339e295d9cd751569e5d88aa9757caff2c302d2e26', 'How trustworthy are your colleagues?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('46e69116a64ac9a4b7036db70a40b6978dd064878d6fe77e3bc1571a4fb6d439', 'How well do you agree with this statement?:\"The company made it easy for me to handle my issue\"\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('47af532a935201c720cb669b728a47dad8dfaf35ba26b4e58038adfba1bb5a85', 'Do you think your work is engaging?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('4e8f8c0eb4badfd087f106f764a33aaee2d95070e37257e4f243673041eed964', 'Prior to the event, how much information that you needed did you get?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('502c0a6debdd1ef50caa9d15e37390ccef57a708e51b2a5f2a650de6203096ca', 'Overall how would you like the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('521a767cbd7e28b975bf842618c0c4c55817923a419e7855032e8e1c04395d06', 'How satisfied are you with installation or first use experience?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('5400bf970ae95ac4a6626978e33c7c0317b33bf30365c1f71e840528545c0332', 'Did you like the food available in that place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('5707bf0fee3c2e340c0650445d78c38bc7e46a7460cfad9760e68d20e73c9d02', 'Would you prefer visiting the place again?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('57484138178b387ed5e3f6425ae02fb147cfaa9611a777517027056f43d01535', 'Overall, how happy are you with the product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('590f27c58a712ae9ecda14599133468e6869c05d769dfd2e7c14befdb366984f', 'Were you able to find the information you were looking for on our website?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('61aad00fcbf7e9b2b0045a708f842d31bfbdb710dbe53078c60f853b51d2f126', 'Do you like to attend this event in the future and why?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'TXT', 'ACTIVE', '2020-05-08 06:05:35'),
('6264587b0ca43e0244f2d201c2289109a0fd2ad525a750041ee39310a70cb6f7', 'How likely are you to suggest this product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('63f54ac8d37bb7d3cd08670bafe7f959741832f4be2d67998690dc61965d1ebd', 'Do you feel you maintain a healthy balance between your work and personal life?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('672e6cb6d5794648ae6ab4582106c812e20d79533f5d400e228e092f702fcfcc', 'How satisfied are you by the facilities provided to you by the college?', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('6734320e300924d78ddea94b02038b529bb034c3b51a0ccb7e07c162d69a9b0e', 'What do you think of the cleanliness and hygiene in the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('68ca001382bdfcddb1fad435bcdf824f2bbc966b87cd795a2e5c9076922447b7', 'How happy are you with the date and time of the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('6ee0567758b4ea0a4cfa7df9e6dbe8c16f77efc01be1c2c0ca844f1a48894a78', 'How satisfied are you with the level of comfort in your physical workspace?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('6eec0eeaf51620773015939a8448e912153ddba64934b3f3dea7a10a22430097', 'Are you satisfied with the courses offered in college?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('6f03dc2ee22b006246c58ed19fef3520117e5d712a055d40eff54ff1288690c7', 'Which of the following words would you use to describe our product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('6fb48a24c9fcdf04d04d627ede343a6cba31515c6c33f4db91d1a630a0471a27', 'How did you get to know about the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('70385c246ea7a996420062b05cbd91475152e0e4188ffcb27e72f77a8c6bd399', 'What do you dislike the most about the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'TXT', 'ACTIVE', '2020-05-08 06:48:10'),
('704f7b291ecc6c34ce15e5158bd309c82fdec69ac924e77bd9080bec792c92c5', 'How long did you stay at the destination?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('78c290c1fe462b25c8d1dac8d00d98ce56123ecbc92cb9415e1f84c61eb1ab88', 'How would you rate the value for money of the product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('7ce88374255580af6f3b7488ff1b45300c37d2acdd793f50ba190b45c7f2eed5', 'How satisfied are you with the overall quality of our product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8eac77e', 'Does your manager care about your feedback?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('819cfccd5da6be5475271f2880080ac3c41a80946e78e2425e021ebacc3ad086', 'How would you describe your relationship with your manager?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'TXT', 'ACTIVE', '2020-05-08 06:22:47'),
('81cd0f3b637171953ccb3734e074f09cab602c588d7cc0f32d41e80e8ec21d09', 'What do you dislike about the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'TXT', 'ACTIVE', '2020-05-08 06:05:35'),
('8396a41e23c693ad05b20bd23553a16cfca2e46ca4d06a38d846fabbfc00d879', 'Are you satisfied with the geographical location of the campus?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('86252b3f833bcae64f85d94341ac56579ef596ff33a9e89f814202e374deefc1', 'Thinking of that place, how far did you travel to get to the destination?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('8b4f4ee51f5a4f2081b3c3482944a597ebf80fe6c753786347945bb310e17e36', 'Are the teaching aids helpful?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('8f0adedd053c0b91febae4da6e5a3b0858985d27aa631720e07114b7843cc69d', 'How satisfied are you with the transport facilities?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('8f2b12fd1f46bbcf1f8015931203e6b3d1bc9c992ec2a052b83b274c8fd195e1', 'Can you count on your peers when you need help?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('901a209c95f4bc49d0124f37a3f7cf44a492d0a687ebebd452f13d7d90d3c1b2', 'What do you like the most about the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'TXT', 'ACTIVE', '2020-05-08 06:48:10'),
('90b31c5a61e3320547daedee97edda2b3effed4bf3aa18f8c9d609bbb9e7bfe2', 'How satisfied are you by the cleanliness in the cafeteria?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('95a3378c4b4305f629679020f5937bf2499f3b9ac47e8fa801e468ab0afb8c48', 'Do you think the college faculty and support staff were helpful?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('96dc1d61e1f691383e0c420efc7dac10943ac904cc9d057cf509a839e0b12cac', 'Are goals and accountabilities clear to everyone in your team?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'TXT', 'ACTIVE', '2020-05-08 06:23:22'),
('99ac570d5e176869f8767a62ec11ae03363bbd6fbdf56547710540afd4d417b4', 'Who did you travel with?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('9b3d569ab4ab10e5dc6971e152863d1e5dff63274e6be8fb6562e3dc1597d575', 'How likely are you to suggest this college?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:29:49'),
('9f14c5639fbc53ead1dca78c4d9ec9cb660d8d4f88900880530d925d8dadef4a', 'How easy is it to register for different courses within the college ?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('9fa0b01cc2feab534b395465cde979977ad6c7b03e0b0b78d1ec62ffcab90d1e', 'Who else could find our product useful?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'TXT', 'ACTIVE', '2020-05-08 06:52:27'),
('a80746a7856a8ec41f839ab136d6ba1b7a462efe1b4eb54ec5345fe2dccd1492', 'Do you have the opportunity to grow within your organization?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('a89d0707a17bc5b6d0db5c5011eca0efaf149557429f0d2706d2e545db1f5c82', 'Does your teacher encourage you to perform better?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('ac537d83d6e9ea8502e7cf364564b243176891c749acd43ea5d35165d45bbdc0', 'How would you rate your value for money in the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'TXT', 'ACTIVE', '2020-05-08 06:48:10'),
('b71dd129c856b39b7c319e1fbc2cd8b13226fccc442080a7346324b007c299fb', 'Are you satisfied with how your company protects its employees from discrimination?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('bb34957914904307ccc8a3119e0fa228bddcd49f43ce71b599badd0d9b7df44e', 'How responsive have we been to your questions or concerns about our product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98b', 'Are you satisfied with the teaching staff and teaching methods?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('beba23a8f2c29c0628150df71db753f910f6eb92e153b6e808e587663eaedbaa', 'How long have you used our product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('bfd3472b706e1946adf624adf09adc498c07a0e2ffd3fc2a1c316b647c395096', 'What do you think about campus safety?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('bff9ea00394c25ada3961c2a77576acf1db4a08ec1b9fc3d7dfdf02c907056e5', 'How trustworthy is your manager?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('c201f18dfa0b0dd6cf1e8f98bbf187c8da1fec69774cbe1a780a18ede5a1278f', 'Do you feel you have enough freedom to decide how to do your work?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('c24756b077cd841b72fd1b0eec252ff8cc57d4cbf2041a347aea2bdd574e4a1e', 'Do the teachers encourage students for extracurriculr activities?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('c3e9dc7b87eed4185ba747c8851ca0942e4a77591ba20433c075d9b011ebb5ea', 'Would you like to buy our product again?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('c72c7a3323fd78de70b9a59daf2c98d87cc97501361a4e637454dbf13b1e0a7c', 'Would you like to continue working here even if provided a chance elsewhere?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'TXT', 'ACTIVE', '2020-05-08 06:22:47'),
('c78c7907f306efe1aa7803f93b3a5ea1139f3a2ea9b7e982845d4da72454dd80', 'Do you and your colleagues collaborate well?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('c9e8f116b9b40d390f41db92aedb1516d1d001f9b1ec393b333e52cf5f8f1fe5', 'How would you rate the food available at the event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'RANGE', 'ACTIVE', '2020-05-08 06:05:35'),
('cb95a570f85b028f1b990b20511965d01054890fe3e5e0733cf2cfbebc3aa628', 'Is your teacher fair with the class and impartial?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('ccf90008bbf4002ca815f0e93824fa74375bb746f437ff159d021c49beda5b2e', 'Do you think we missed out any features?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'TXT', 'ACTIVE', '2020-05-08 06:52:28'),
('ce548d1fbceec471c480a25ca08b630105f17bdcbf03bb1bc7ca3df4e705a22e', 'Where did you book your holiday?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('d1a523ec4b29b8478f3c0bf51b4db7f52a05797af8aa227f6fb062f48fdc25fe', 'How do you like the climate?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:45'),
('d2f21c3d12c88d30188040a902ea1390c2eda8b65134e80703e191a2e0f4bdd0', 'What was your mode of transportation to reach the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('d4dac6df90fbb21bcd9864fcdc0a32f61f334aeaec55b761d26fce332e7e8147', 'How do you like the culture and community at the place?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('d5ff16d19de3423742394b233465d0b71d0307b84852c08c0b2cb87f713a4946', 'Are you satisfied with the testing and grading methods?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('d6b2bc3b22bf836a2f5c52a18d225a2835877896ba9e0498d27d25eaf025f7cf', 'How can we improve for next year?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'TXT', 'ACTIVE', '2020-05-08 06:05:35'),
('d8a21e7390ce46b913313729da57b11842c5174216195c8c338cc31150a2f92f', 'How much would you rate the event, on a scale of 10?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'RANGE', 'ACTIVE', '2020-05-08 06:05:35'),
('d8b68c4d2aa6f7973142d4d7e9a00f215bf1dc415b6ff089750752bbd1306208', 'How distraction-free is the environment?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('dd11007a3d116ac7bd9103e5121f6cce56efc5cbf573e3d95e8ffc9cb6320063', 'How is the access to Wifi and WAN in the campus?\r\n', '0bfd9ee79f5ff47983f8ee639b682b554c16d305f786147853bb4cc2e1adaf4f', 'CH_OP', 'ACTIVE', '2020-05-08 05:28:49'),
('e0ae51584bb893d496f377cb2ec9a9f3f7da041fecdac9403a48f161a29bf3ef', 'Are you happy with the frequency at which you receive recognition from your manager?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('e2523d87b64575e998c3c3064d3f24d3b82790714df6119ec08faf226d371ba5', 'Why did you decide to attend this event?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'TXT', 'ACTIVE', '2020-05-08 06:05:35'),
('e48667f1e034678659010f103e77c5924cbffaefd8750e8674d187235cb2e48b', 'What would you prefer attending if offered a holiday again?\r\n', '85237d1d27b5a8a317df2d6d22b07b303e7bb0888f12b140dcaad52b9b8c0b7d', 'CH_OP', 'ACTIVE', '2020-05-08 06:48:10'),
('e728d2fe6b1ccfc05e597e8cd4a773903ebc0045e5abb04fd3afdcb2bb4de3d0', 'Compared to our competitors, how is our product?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('f2de6323d3151e642ef63c79e706893787de88b1027877c9cfb963446dfd91cf', 'How helpful was the staff?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('f50365a63140ca72f18e9f5f94f00e9cbbcd595f0fd600a86c72e35cfd4ad551', 'How was your purchase experience?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29'),
('f94ead36c1b79e44fde24870c8e6fc4de892615d2889b4290e2267b5ebb7e344', 'Was the event length too long, too short or about right?\r\n', '19e963f72a2587771c5640b338183eba60a964af3d352fb6081ebc24b69c3a1a', 'CH_OP', 'ACTIVE', '2020-05-08 06:05:35'),
('fbc54a01c9cbeebba1ddb1728458a93c63e9a22f6082c85a862a9288525ccd8c', 'Are you satisfied with the level of transparency your manager maintains with you and your team?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('fe3ba74620469a6654fd544c9cb6df15f0a4ef8b703067c830a2d7728a995e78', 'How could we improve our product to meet better needs?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'TXT', 'ACTIVE', '2020-05-08 06:52:28'),
('fe9518b7fbb61054fcaafe47028f289903c1b5b9ed470e8363ee2ce2ea5b49b5', 'How satisfied are you with the way your organization makes use of your strength?\r\n', 'f9b3c114f281920d5d1fe48389835a56575bfabccfa9ec24da120bd7a5ec01da', 'CH_OP', 'ACTIVE', '2020-05-08 06:22:47'),
('ff8b361c7ba7cc687a0762b481b1c91aa42b7e443596d45d557971bbe58e01a6', 'How easy is it to navigate to our website?\r\n', '90bfa2640b57df308794e878d71023fb90c47f60a78bbde7a24373624de4a203', 'CH_OP', 'ACTIVE', '2020-05-08 05:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `Survey_Option`
--

CREATE TABLE `Survey_Option` (
  `Survey_Opt_ID` varchar(250) NOT NULL,
  `Survey_Opt_FAQ_Id` varchar(250) NOT NULL,
  `Survey_Opt_Title1` varchar(150) NOT NULL,
  `Survey_Opt_Title2` varchar(150) NOT NULL,
  `Survey_Opt_Title3` varchar(150) NOT NULL,
  `Survey_Opt_Title4` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Survey_Option`
--

INSERT INTO `Survey_Option` (`Survey_Opt_ID`, `Survey_Opt_FAQ_Id`, `Survey_Opt_Title1`, `Survey_Opt_Title2`, `Survey_Opt_Title3`, `Survey_Opt_Title4`) VALUES
('0982a70937b46783gfg0a0273a9fdhb348c3576d90aee', '7ce88374255580af6f3b7488ff1b45300c37d2acdd793f50ba190b45c7f2eed5', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a70937b46783gfg0a0273a9hbfdhb348c3576d90aee', 'f50365a63140ca72f18e9f5f94f00e9cbbcd595f0fd600a86c72e35cfd4ad551', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a70937b46783gfg0a0273de9hbfdhb348c3576d90aee', '521a767cbd7e28b975bf842618c0c4c55817923a419e7855032e8e1c04395d06', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a70937b4678dgfe9hbfdhb348c3576d90aee', 'b71dd129c856b39b7c319e1fbc2cd8b13226fccc442080a7346324b007c299fb', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a70937b4678dgfe9hbfdhbfdf3576d90aee', '6ee0567758b4ea0a4cfa7df9e6dbe8c16f77efc01be1c2c0ca844f1a48894a78\r\n', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a709dg37b4678dgfe9hbfdhbfdf3576d90aee', 'fe9518b7fbb61054fcaafe47028f289903c1b5b9ed470e8363ee2ce2ea5b49b5', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a709dg37b4678dgfe9hbfdhbfdf3576d9dg0aee', 'fbc54a01c9cbeebba1ddb1728458a93c63e9a22f6082c85a862a9288525ccd8c', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a709dg37b4678dgfe9hbfdhbfdf3fd76d9dfdee6rgc', '68ca001382bdfcddb1fad435bcdf824f2bbc966b87cd795a2e5c9076922447b7', 'Extremely Happy', 'Happy', 'Unhappy', 'Extremely Unhappy'),
('0982a709dg37b4678dgfe9hbfdhbfdf3fd76d9dfdeedg6rgc', '1e162c7fe634a28f8e9a64a34796d5abdb62e48fdd5a68568a59e0fa41c2fe6a', 'Extremely Happy', 'Happy', 'Unhappy', 'Extremely Unhappy'),
('0982a709dg37b4678dgfe9hbfdhbfdf3fd76d9dg0aee', '13a6b4d9599187e83c1cc48bcfa16895f48794d47ac4b3b2ab93e22c4f5baf17', 'Extremely Happy', 'Happy', 'Unhappy', 'Extremely Unhappy'),
('0982a709dg37b4678dgfe9hbfdhbfdf3fd76d9dg0aee6rgc', '57484138178b387ed5e3f6425ae02fb147cfaa9611a777517027056f43d01535', 'Extremely Happy', 'Happy', 'Unhappy', 'Extremely Unhappy'),
('0982a709dg37b4678dgfe9hbsfdhbfdf3fd76d9dfdeedg6rgc', 'e0ae51584bb893d496f377cb2ec9a9f3f7da041fecdac9403a48f161a29bf3ef', 'Extremely Happy', 'Happy', 'Unhappy', 'Extremely Unhappy'),
('0982a709dg37bfgdgfe9hbsfdhbfdf3fd76d9dfdeedg6rgc', 'd4dac6df90fbb21bcd9864fcdc0a32f61f334aeaec55b761d26fce332e7e8147', 'Extremely Happy', 'Happy', 'Unhappy', 'Extremely Unhappy'),
('0982a76b4c0937b46783gfg0a0273a9fdhb348c3576b90aee', 'd5ff16d19de3423742394b233465d0b71d0307b84852c08c0b2cb87f713a4946', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c0937b46783gfg0a0273a9fdhb348c3576d90aee', '8396a41e23c693ad05b20bd23553a16cfca2e46ca4d06a38d846fabbfc00d879', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c0937b46783gfg0a0282c73a9fdhb348c3576b90aee', '8f0adedd053c0b91febae4da6e5a3b0858985d27aa631720e07114b7843cc69d', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c0937b4b37251609b920a0282c73a9fdhb348c3576b90aee', '1d9b8a87a0a32eabb58cafdd50dd000dbebf1fe1d8255cdfb952ca5c3a9b4170', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c0937b4b609b920a0282c73a9fdhb348c3576b90aee', '6eec0eeaf51620773015939a8448e912153ddba64934b3f3dea7a10a22430097', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c0937b4b609b93gfg0a0282c73a9fdhb348c3576b90aee', 'dd11007a3d116ac7bd9103e5121f6cce56efc5cbf573e3d95e8ffc9cb6320063', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c093e3f7b4b372516098dca308b920a0282c73a9b348c3576b90aee', 'bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98b', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c093e3f7b4b372516098dca308b920a0282c73a9fdhb348c3576b90aee', '672e6cb6d5794648ae6ab4582106c812e20d79533f5d400e228e092f702fcfcc', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('0982a76b4c093e3f7b4b37251609b920a0282c73a9fdhb348c3576b90aee', '90b31c5a61e3320547daedee97edda2b3effed4bf3aa18f8c9d609bbb9e7bfe2', 'Extremely satisfied', 'Satisfied', 'Dissatisfied', 'Extremely dissatisfied'),
('1113bcc882b81dc52214a685bd6bf48924b0790947d2c716febadfa981a22a59', '06f71d3b77eb4d4bc22231a062ad386d7e49cb67e965b1a2fd5a7104287a39b5', 'Very approachable', 'Somewhat approachable', 'Not very approachable', 'Not at all approachable'),
('1113bcc882b81dc52214a685bd6bf48924b0790947d2c716febadfa981a22a59fdgfg', 'bfd3472b706e1946adf624adf09adc498c07a0e2ffd3fc2a1c316b647c395096', 'Extremely safe', 'Safe', 'Not safe', 'Extremely unsafe'),
('11b003f23188246bfb5df2c3ed71ff08bda0d3a4de2c8ff16be', '11b003f23188246bfb5df2c3ed71ff08bda0d3a4de2c8ff16bec895c18f77799', 'Badly', 'Fine ', 'Well', 'Very well'),
('11b003f23188246bfb5df2c3ed71ff08bda0d3a4de2c8ff16bedsg', '78c290c1fe462b25c8d1dac8d00d98ce56123ecbc92cb9415e1f84c61eb1ab88', 'Very good', 'Good', 'Bad', 'Very bad'),
('4418038b3de2bee4d6dbc5ac2a780c0e0d9877b9bdfcaaae79b128ef6a5c2670dsgfdgsye8w7yr87ew', 'bff9ea00394c25ada3961c2a77576acf1db4a08ec1b9fc3d7dfdf02c907056e5', 'Very trustworthy', 'Somewhat trustworthy', 'Not very trustworthy', 'Not trustworthy at all'),
('4418038b3de2bee4d6dbc5ac2a780c0e0d9877b9bdfcaaae79b128ef6a5c2670dsgsdgfds', '45d789d66af626878f6196339e295d9cd751569e5d88aa9757caff2c302d2e26', 'Very trustworthy', 'Somewhat trustworthy', 'Not very trustworthy', 'Not trustworthy at all'),
('4418038b3de2bee4d6dbc5ac2a780c0e0d9877b9bdfcaaae79b128ef6a5c2670sdfdsgfsdg', 'd8b68c4d2aa6f7973142d4d7e9a00f215bf1dc415b6ff089750752bbd1306208', 'Very peaceful', 'Peaceful', 'Noisy', 'Very noisy'),
('6f03dc2ee22b006246c58ed19fef3520117e5d712a055d40eff54ff12', '6f03dc2ee22b006246c58ed19fef3520117e5d712a055d40eff54ff1288690c7', 'Buggy', 'Fine,but there are issues', 'Great', 'Life saving'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8', '590f27c58a712ae9ecda14599133468e6869c05d769dfd2e7c14befdb366984f', 'Yes', 'Somewhat,yes', 'No', 'Not at all'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be82325dfgdf', 'beba23a8f2c29c0628150df71db753f910f6eb92e153b6e808e587663eaedbaa', 'Less than a month', 'About six months', '6 months-1 year', 'More than a year'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8dsdtuytkjhhgfdsff', '1f299fa045cbbaef97ca1c4fe8afcf74a979106699dde4b353bd1fb0d47b766d', 'From a friend', 'Online ads', 'Social media', 'Others'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8esdgdfght', '46e69116a64ac9a4b7036db70a40b6978dd064878d6fe77e3bc1571a4fb6d439', 'Stongly agree', 'Partly agree', 'Disagree', 'Strongly disagree'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8rhdg', 'bb34957914904307ccc8a3119e0fa228bddcd49f43ce71b599badd0d9b7df44e', 'Very responsive', 'Responsive', 'Not very responsive', 'Not responsive at all'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8sder6ytrt4543yfg', 'c3e9dc7b87eed4185ba747c8851ca0942e4a77591ba20433c075d9b011ebb5ea', 'Definitely', 'Maybe', 'Maybe not', 'Never'),
('7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8sdterujhg', 'e728d2fe6b1ccfc05e597e8cd4a773903ebc0045e5abb04fd3afdcb2bb4de3d0', 'Great', 'Better', 'Same', 'Worse'),
('8fa5c49be3cf1524c22c608c095074d11e7183c77338981f2ef9e6bbd0492e54', 'a89d0707a17bc5b6d0db5c5011eca0efaf149557429f0d2706d2e545db1f5c82', 'Yes,all the time', 'Only sometimes', 'Not all the tim', 'Not at all'),
('8fa5c49be3cf1524c22c608c095074d11e7183c77338981f2ef9e6bbd0492e54FGDS', 'cb95a570f85b028f1b990b20511965d01054890fe3e5e0733cf2cfbebc3aa628', 'Extremely fair and impartial', 'somewhat fair but partial', 'Very partial', 'Extremely partial'),
('bb34957914904307ccc8a3119e0fa228bddcd49f43ce71b599badd0d9b7df44e454rgfdg', '4e8f8c0eb4badfd087f106f764a33aaee2d95070e37257e4f243673041eed964', 'Most of the information', 'Some of the information', 'A little information', 'None of the information'),
('bb34957914904307ccc8a3119e0fa228bddcd49f43ce71b599badd0d9b7df44edsfsdg', '0994a610f728b238368ef06de04086055d45ffc7e3cafb2dba3f98839257cb0a', 'Extremely organized', 'Organized', 'Not so organized', 'Not at all organized'),
('bb34957914904307ccc8a3119e0fa228bddcd49f43ce71b599badd0d9b7df44edsgdesdgrfg', 'f94ead36c1b79e44fde24870c8e6fc4de892615d2889b4290e2267b5ebb7e344', 'Too long', 'About right', 'Short', 'Too short'),
('bb34957914904307ccc8a3119e0fa228bddcd49f43ce71b599badd0d9b7df44efdgdr634gfdg', '502c0a6debdd1ef50caa9d15e37390ccef57a708e51b2a5f2a650de6203096ca', 'Very good', 'Good', 'Fair', 'Poor'),
('bb34957914904307ccc8a3119e0fa228bddcd49f43ce71b599badd0d9bsdfsdfg', '2ee9719c7f0250638cf2540bc251390c694bc6b8ffb86023e8569adb02c75c55', 'Social media', 'From a friend/colleague', 'Professional association', 'Others'),
('bd89a2d45d94b2e61e18ba7ertfdhgff8c8a9f8c3a2858c1b551ebc5d90d6b6ebd6etert', '6fb48a24c9fcdf04d04d627ede343a6cba31515c6c33f4db91d1a630a0471a27', 'Social media', 'Friend or colleague', 'Search engine', 'Others'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6e9809hbsadfsgf', 'd2f21c3d12c88d30188040a902ea1390c2eda8b65134e80703e191a2e0f4bdd0', 'Bus', 'Train', 'Plane', 'Others'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67asfi98sahhfkjdsnfncxb', '30fc01a8167b86baf8ca34025781bfc3dbcb62b411e5a030e3faa547d41aa57b', 'Never', 'Once', '2-3 times', 'More than 4 times'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98b87987werhwehbfdsfs', '339a0929673b4447ce90b9863e451c89ce83b207798554507340c6e8f767da3a', 'Guesthouse', 'Farmhouse', 'Hostel', 'Camping/Caravan'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98b9097544ddnj', 'd1a523ec4b29b8478f3c0bf51b4db7f52a05797af8aa227f6fb062f48fdc25fe', 'Very cool', 'Cool', 'Harsh climate', 'Very harsh climate'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98bew543er89898sfd', '99ac570d5e176869f8767a62ec11ae03363bbd6fbdf56547710540afd4d417b4', 'Alone', 'Family', 'Friends', 'Office colleagues'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98bew5ed354rgd', '704f7b291ecc6c34ce15e5158bd309c82fdec69ac924e77bd9080bec792c92c5', '1 night', '2-4 nights', '5-7 nights', 'more than 8 nights'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98bw589880ashdkjfdsk', '5707bf0fee3c2e340c0650445d78c38bc7e46a7460cfad9760e68d20e73c9d02', 'Definitely', 'Maybe', 'Maybe not', 'Not at all'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67eewtri987ewurhdbsfm', '6734320e300924d78ddea94b02038b529bb034c3b51a0ccb7e07c162d69a9b0e', 'Very clean and hygienic', 'Somewhat clean and hygienic', 'Not very clean or hygienic', 'Not clean or hygienic at all'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd6ahsfihsd86f8dshf', '86252b3f833bcae64f85d94341ac56579ef596ff33a9e89f814202e374deefc1', '<150 kms(domestic tourist)', '>150 kms(domestic tourist)', 'Within the country', 'From another country'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd6ete4r89fjksdnfndscmxnbzmv', '1e9bf5ec4861af6c8464d2b707fd21d4866aa097309f239e1831cadbe608241b', 'Very comfortable', 'Comfortable', 'Somewhat comfortable', 'Not at all comfortable'),
('bd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd6tee4iu98r7wiuhkjsfcxvc', 'ce548d1fbceec471c480a25ca08b630105f17bdcbf03bb1bc7ca3df4e705a22e', 'Online booking agency', 'Website of travel agencies', 'Book on arrival', 'Phone or email individual accommodation'),
('disufodsufo8nasbdbd89a2d45d94b2e61e18ba7f8c8a9f8c3a2858c1b551ebc5d90d6b6ebd67e98b', 'e48667f1e034678659010f103e77c5924cbffaefd8750e8674d187235cb2e48b', 'Attend festivals and events', 'Visit local heritage sites', 'Shopping and markets', 'Guided or self tours/walks'),
('ebb55be195d417dfg00dg1eDFHGGfhgfhjfc7fdh09fdCGDsf', '097af4d1c79a5e10cabb497ea2df5e15343dd36b12b03631dd38256b8a96b350', 'Very likely', 'Likely', 'Not so likely', 'Not at all likely'),
('ebb55be195d417dfg00dg1eDGGfhgfhjfc7fdh09fdCGDsf', '4418038b3de2bee4d6dbc5ac2a780c0e0d9877b9bdfcaaae79b128ef6a5c2670', 'Very likely', 'Likely', 'Not so likely', 'Not at all likely'),
('ebb55be195d417dfg00dg1eDGGfhgfhjfc7fdh09fdCGsf', '037cd883995f250095b98acb0d1e1ef3d59390e69d8d3dcd9a3d6b0cb0d58586', 'Very likely', 'Likely', 'Not so likely', 'Not at all likely'),
('ebb55be195d417dfg00dg1eDGGfhgfhjfc7fdh09fdsf', '6264587b0ca43e0244f2d201c2289109a0fd2ad525a750041ee39310a70cb6f7', 'Very likely', 'Likely', 'Not so likely', 'Not at all likely'),
('ebb55be195d417dfg00dg1efhgfhjfc7fdh09fdsf', '9b3d569ab4ab10e5dc6971e152863d1e5dff63274e6be8fb6562e3dc1597d575', 'Very likely', 'Likely', 'Not so likely', 'Not at all likely'),
('ebb55be19d6d35c0c31f15d417001ec709fdsf', '0b4571ab780777bffad05cce5eee76d9d7c1408ff26e7e922c76959cf4777b7a\r\n', 'Very easy', 'Easy', 'Difficult', 'Very difficult'),
('ebb55be19d6d35c0c31ffdhg15d417001ec709fdsf', '0b4571ab780777bffad05cce5eee76d9d7c1408ff26e7e922c76959cf4777b7a', 'Very easy', 'Easy', 'Difficult', 'Very difficult'),
('ebb55be19d6d35c0c31ffdhg15d41700dg1ec709fdsf', '9f14c5639fbc53ead1dca78c4d9ec9cb660d8d4f88900880530d925d8dadef4a\r\n', 'Very easy', 'Easy', 'Difficult', 'Very difficult'),
('ebb55be19d6d35c0c31ffdhg15d41700dg1ec7fdh09fdsf', 'ff8b361c7ba7cc687a0762b481b1c91aa42b7e443596d45d557971bbe58e01a6', 'Very easy', 'Easy', 'Difficult', 'Very difficult'),
('ebb55be19d6d35c0c31ffdhg1dg5d41700dg1ec7fdh09fdsf', '388df1fb13a510aba4b0200125dc8c7bac41f3311478ddfe8be9c92fd03303fb', 'Very easy', 'Easy', 'Difficult', 'Very difficult'),
('ebb55be19d6d35cfdgg5d41700dg1ec7fdh09fdsf', '8b4f4ee51f5a4f2081b3c3482944a597ebf80fe6c753786347945bb310e17e36', 'Extremely helpful', 'Helpful', 'Neither helpful nor unhelpful', 'Unhelpful'),
('ebb55be19d6d35cfdgg5d41700dg1efhgfhjfc7fdh09fdsf', 'f2de6323d3151e642ef63c79e706893787de88b1027877c9cfb963446dfd91cf', 'Extremely helpful', 'Helpful', 'Not so helpful', 'Not at all helpful\r\n'),
('ebb55be19d6d35cg5d41700dg1ec7fdh09fdsf', '95a3378c4b4305f629679020f5937bf2499f3b9ac47e8fa801e468ab0afb8c48', 'Extremely helpful', 'Helpful', 'Neither helpful nor unhelpful', 'Unhelpful'),
('ebb55be19d6tytd35cfdgg5d41700dg1efhgfhjfc7fdh09fdsf', '1fd7c1de3c8c3b4f299fa8c98464ece5454201ff8006d6b4598ee455adf0d449', 'Extremely friendly', 'Friendly', 'Not very friendly', 'Not friendly at all'),
('ebb55be19d6tytd35cfdgg5d417dfg00dg1efhgfhjfc7fdh09fdsf', '33b65bad19f8e9ea79e467a66638fc4dfa6082a6e9de062f489584bac42ff9e2', 'Extremely friendly', 'Friendly', 'Not very friendly', 'Not friendly at all'),
('fa94050890b0480a8c94bbb486188dsfdy7687eterh', '152b5c0f4fefd8e61d28c34203f33d0a242328cc37cfdc55f178baa901d98a5e', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480a8c94bbb4rety86188dsfdy7687eterh', '47af532a935201c720cb669b728a47dad8dfaf35ba26b4e58038adfba1bb5a85', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480a8c94bbbdgdf88dsfdy7687eterh', '7d65db664bc6f6696cfeecc2c179d41fcd3076746e0da69f0390ed8be8eac77e', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480a8c94bbbfgdfhdgdf88dsfdy7687eterh', '63f54ac8d37bb7d3cd08670bafe7f959741832f4be2d67998690dc61965d1ebd', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480sdfdfhddf7dfghgfhfgdfhgfh', '2c91c685e7ba04e9e70a79bcaab67138fcb5914be740db857b7a0ad9d79bd9cb', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480sdfdfhdgdf88dsfdy7687eterh', 'a80746a7856a8ec41f839ab136d6ba1b7a462efe1b4eb54ec5345fe2dccd1492', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480sdfdfhdgdg8dfd45y7dfgdfhgfh', '205a401897e5884f51f9cba3a50148e958894032f6ae0d6c3d60f28c2f8db8e6', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480sdfdfhdgdg8dfd45y7dfghgfhfgdfhgfh', '5400bf970ae95ac4a6626978e33c7c0317b33bf30365c1f71e840528545c0332', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480sdfdfhdgdg8dfdgfdy7687eterh', '8f2b12fd1f46bbcf1f8015931203e6b3d1bc9c992ec2a052b83b274c8fd195e1', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480sdfdfhdgdg8dfdgfdy7dfgdfhgfh', 'c78c7907f306efe1aa7803f93b3a5ea1139f3a2ea9b7e982845d4da72454dd80', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('fa94050890b0480sdfdfhdgdg8dsfdy7687eterh', 'c201f18dfa0b0dd6cf1e8f98bbf187c8da1fec69774cbe1a780a18ede5a1278f', 'Totally', 'Somewhat yes', 'Not really', 'Not at all'),
('jygsdfy7678sahdsgfv7sdaf65dshhvhdsfdsbbuuasgfdsjh', 'c24756b077cd841b72fd1b0eec252ff8cc57d4cbf2041a347aea2bdd574e4a1e', 'Yes,all the time', 'Only sometimes', 'Not all the time', 'Not at all');

-- --------------------------------------------------------

--
-- Table structure for table `User_Login`
--

CREATE TABLE `User_Login` (
  `User_SP_Id` varchar(300) NOT NULL,
  `User_SP_Name` varchar(50) NOT NULL,
  `User_SP_DOB` date NOT NULL,
  `User_SP_Mail` varchar(50) NOT NULL,
  `User_SP_Status` varchar(12) NOT NULL DEFAULT 'INACTIVE',
  `User_SP_Password` varchar(250) NOT NULL,
  `User_SP_Ranking` varchar(15) NOT NULL DEFAULT '0',
  `User_SP_Credit` varchar(50) DEFAULT '0',
  `User_SP_DOC` datetime DEFAULT current_timestamp(),
  `User_SP_Photo` varchar(250) NOT NULL DEFAULT '../indept-assets/profile.png',
  `User_SP_Gender` varchar(50) NOT NULL,
  `User_SP_City` varchar(50) NOT NULL,
  `User_SP_State` varchar(50) NOT NULL,
  `User_SP_Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_Login`
--

INSERT INTO `User_Login` (`User_SP_Id`, `User_SP_Name`, `User_SP_DOB`, `User_SP_Mail`, `User_SP_Status`, `User_SP_Password`, `User_SP_Ranking`, `User_SP_Credit`, `User_SP_DOC`, `User_SP_Photo`, `User_SP_Gender`, `User_SP_City`, `User_SP_State`, `User_SP_Country`) VALUES
('15435a35328afb03b7298ba112ec574c', 'CHANDRU', '2000-02-10', 'rajuashwin1410@gmail.com', 'ACTIVE', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0', '0', '2020-04-23 11:14:21', '../indept-assets/profile.png', 'male', 'Nagamangala', 'Karnataka', 'India'),
('b1c5fc8adfdee1b2982ab90c56d70021', 'NEW USERS', '2000-10-21', 'user@surveyKing.com', 'ACTIVE', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0', '0', '2020-04-21 05:22:20', '../indept-assets/profile.png', 'male', 'Chittoor', 'Andhra Pradesh', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Survey_Activty`
--
ALTER TABLE `Survey_Activty`
  ADD PRIMARY KEY (`Survey_Act_Id`) USING HASH;

--
-- Indexes for table `Survey_Answer`
--
ALTER TABLE `Survey_Answer`
  ADD PRIMARY KEY (`Survey_Answer_Id`);

--
-- Indexes for table `Survey_Answer_txt`
--
ALTER TABLE `Survey_Answer_txt`
  ADD PRIMARY KEY (`Survey_Answer_Id`);

--
-- Indexes for table `Survey_Attender`
--
ALTER TABLE `Survey_Attender`
  ADD PRIMARY KEY (`Survey_attender_Id`);

--
-- Indexes for table `Survey_Category`
--
ALTER TABLE `Survey_Category`
  ADD PRIMARY KEY (`Survey_Cat_Id`) USING HASH,
  ADD UNIQUE KEY `Survey_Cat_Name` (`Survey_Cat_Name`);

--
-- Indexes for table `Survey_Events`
--
ALTER TABLE `Survey_Events`
  ADD PRIMARY KEY (`Survey_Create_ID`);

--
-- Indexes for table `Survey_FAQ`
--
ALTER TABLE `Survey_FAQ`
  ADD PRIMARY KEY (`Survey_Cat_FAQ_Id`);

--
-- Indexes for table `Survey_Option`
--
ALTER TABLE `Survey_Option`
  ADD PRIMARY KEY (`Survey_Opt_ID`);

--
-- Indexes for table `User_Login`
--
ALTER TABLE `User_Login`
  ADD PRIMARY KEY (`User_SP_Id`) USING HASH,
  ADD UNIQUE KEY `User_SP_Mail` (`User_SP_Mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
