create database eplanet_emp;
use eplanet_emp;

CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` text,
  `first_name` text NOT NULL,
  `middle_name` text,
  `last_name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `employee_image` text NOT NULL,
  `id_number` text NOT NULL,
  `id_card_image` text NOT NULL,
  `residence_address` text NOT NULL,
  `city` text NOT NULL,
   `salry` int(20) NOT NULL,
  `ref_data` text NOT NULL,
  `relationship` text NOT NULL,
  `ref_phone` text NOT NULL,
  `ref_residence` text NOT NULL,
  `date_employed` date NOT NULL,
  `job_type` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `accounttype` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `emp_attendance` (
  `employee_id` int(11) NOT NULL ,
  `f_l_name` text NOT NULL,
  `date_enter` varchar(10) NOT NULL,
  `time_in` text NOT NULL,
  `time_out` text NOT NULL,
  `status_att` text NOT NULL);
  
  INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `accounttype`) VALUES
(1, 'prince', 'syed', 'user', 'admin', 'Admin');



