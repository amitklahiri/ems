# EMS Repository
EMS stands for Employee Management System. This application deals with the daily employee management. 

# Technology Stack
* PHP
* CodeIgniter PHP Framework, version 3.1.10.
* Bootstrap 4.3
* Font Awesome

# Functionalities
1. Super Admin login only.
2. Add, edit, delete, view employees. 
3. Add, update, view daily attendance of employees, year and month wise.

# Instructions
1. Dump the database as instructed below. 
2. Dump the zip file or clone the project using git to local folder. 
3. If there is any changes in database then change the database configuration information in file \application\config\database.php. 
4. Change the base URL from file \application\config\config.php, if root project folder and / or local URL is changed. 
5. Open the browser with the URL.

# MySQL Dump
1. Create a database with the name 'ems'.
2. Import below three table structures.
3. Open the the table 'users' and insert a new record for the Super Admin with below restrictions. 
	* Password should use sha1().
	* User type should be 0 (zero) for Super Admin. 
	* User status should be 1 to make it active. 

```sql
--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empid` int(11) NOT NULL,
  `attdate` varchar(10) NOT NULL,
  `attstatus` varchar(1) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0' COMMENT '1 - Active, 0 - Not Active',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` varchar(1) NOT NULL COMMENT '0 - admin, 1 - users',
  `active` varchar(1) NOT NULL COMMENT '1 - active, 0 - inactive',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
COMMIT;
