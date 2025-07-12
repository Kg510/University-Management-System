
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'tipu', '202cb962ac59075b964b07152d234b70'),
(2, 'admin', '202cb962ac59075b964b07152d234b70');


CREATE TABLE `attn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) NOT NULL,
  `atten` varchar(50) NOT NULL,
  `at_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `attn` (`id`, `st_id`, `atten`, `at_date`) VALUES
(206, 12103072, 'absent', '2021-04-11'),
(207, 13103072, '', '0000-00-00'),
(208, 13203072, '', '0000-00-00'),
(209, 14103053, '', '0000-00-00'),
(210, 14203072, '', '0000-00-00'),
(211, 12103072, 'absent', '2021-06-05'),
(212, 13103072, 'absent', '2021-06-05'),
(213, 13203072, 'absent', '2021-06-05'),
(214, 14103053, 'present', '2021-06-05'),
(215, 14203072, 'absent', '2021-06-05'),
(216, 1454540, '', '0000-00-00'),
(217, 17699619, '', '0000-00-00'),
(218, 12103072, 'present', '2021-06-06'),
(219, 13103072, 'present', '2021-06-06'),
(220, 13203072, 'present', '2021-06-06'),
(221, 14103053, 'absent', '2021-06-06'),
(222, 14203072, 'absent', '2021-06-06'),
(223, 1454540, 'present', '2021-06-06'),
(224, 17699619, 'present', '2021-06-06');


CREATE TABLE `at_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `st_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `at_student` (`id`, `name`, `st_id`) VALUES
(29, 'Robert Speer', 12103072),
(30, 'Mariea Moore', 13103072),
(31, 'Pamela A Reed', 13203072),
(32, 'Stephen D Skaggs', 14103053),
(33, 'Evelyn K Ambrose', 14203072),
(34, 'Bruno Den', 1454540),
(35, 'Amy Billington', 17699619);


CREATE TABLE `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `contact` int(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `faculty` (`id`, `username`, `password`, `name`, `email`, `birthday`, `gender`, `education`, `contact`, `address`) VALUES
(1, 'robinson', '202cb962ac59075b964b07152d234b70', 'Terry Robinson', 'terryr@gmail.com', '1986-04-01', 'Male', 'BIT, MIT', 900248750, '3962 Elk Rd Little'),
(13, 'will', '202cb962ac59075b964b07152d234b70', 'Will Williams', 'will@gmail.com', '1985-12-12', 'Male', 'MIT, PhD', 124785450, '3308 Valley Drive');


CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(11) NOT NULL,
  `marks` int(5) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `st_info` (
  `st_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `program` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
