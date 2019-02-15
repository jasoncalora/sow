-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 07:13 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docgen`
--

-- --------------------------------------------------------

--
-- Table structure for table `sow activities`
--

CREATE TABLE `sow activities` (
  `Solution Stream` varchar(50) NOT NULL,
  `Solution` varchar(50) NOT NULL,
  `Activities` varchar(100) NOT NULL,
  `Deliverables` varchar(1000) DEFAULT NULL,
  `Mandays` int(4) NOT NULL,
  `RecID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sow activities`
--

INSERT INTO `sow activities` (`Solution Stream`, `Solution`, `Activities`, `Deliverables`, `Mandays`, `RecID`) VALUES
('ITSM', 'Cherwell', 'AD Orchestration', NULL, 5, 85),
('ITSM', 'Cherwell', 'Asset Management Automation', 'Deployment of Policies to Unified Endpoint (Ivanti)', 5, 86),
('ITSM', 'Cherwell', 'Admin Training', NULL, 3, 87),
('ITSM', 'Cherwell', 'DR setup', NULL, 2, 88),
('ITSM', 'Cherwell', 'CMDB population', 'Integration with Discovery tool for data import of Assets\\r\\nMaximum of 2 Asset Types', 5, 89),
('ITSM', 'Cherwell', 'Customization Training', NULL, 3, 90),
('ITSM', 'Cherwell', 'HR ServiceDesk', 'Case Management', 5, 91),
('ITSM', 'Cherwell', 'Business Process Training', NULL, 0, 92),
('ITSM', 'Cherwell', 'End-User Training', NULL, 1, 93),
('ITSM', 'Cherwell', 'Analyst Training', NULL, 1, 94),
('ITSM', 'Cherwell', 'Tailored Workflow', 'System Documentation\\r\\nPrototype Design\\r\\nOne (1) Workflow\\r\\nOne (1) Form', 8, 95),
('ITSM', 'Cherwell', 'SMS integration', 'Send SMS for every ticket logged', 2, 96),
('ITSM', 'Cherwell', 'Upgrade Services', NULL, 5, 97),
('ITSM', 'Cherwell', 'Tailored Administration Training', NULL, 5, 98),
('ITSM', 'Cherwell', 'Quick Start', 'Installation\\r\\nIntegration with Email and AD', 35, 99),
('ITSM', 'Cherwell', 'SelfService Customization', 'Branding and Theme of SelfService', 3, 100),
('ITSM', 'Cherwell', 'Instance of ServiceDesk', 'Another Tenant\\r\\nDefinition of Access, Service Offering/Catalogue\\r\\nAnalyst Rights and Permissions', 15, 101),
('ITSM', 'Cherwell', 'Reporting', NULL, 1, 102),
('ITSM', 'Cherwell', 'QR Code Integrations', 'ITSM', 3, 103),
('ITSM', 'Ivanti ISM', 'Reporting', NULL, 1, 104),
('ITSM', 'Ivanti ISM', 'Quick Start', 'Installation\\r\\nIntegration with Email and AD', 35, 105),
('ITSM', 'Ivanti ISM', 'Upgrade Services', NULL, 8, 106),
('ITSM', 'Ivanti ISM', 'SelfService Customization', 'Branding and Theme of SelfService', 5, 107),
('ITSM', 'Ivanti ISM', 'SMS integration', 'Send SMS for every ticket logged', 3, 108),
('ITSM', 'Ivanti ISM', 'AD Orchestration', NULL, 0, 109),
('ITSM', 'Ivanti ISM', 'CMDB population', 'Integration with Discovery tool for data import of Assets\\r\\nMaximum of 2 Asset Types', 5, 110),
('ITSM', 'Ivanti ISM', 'End-User Training', NULL, 1, 111),
('ITSM', 'Ivanti ISM', 'QR Code Integrations', 'ITSM', 3, 112),
('ITSM', 'Ivanti ISM', 'Asset Management Automation', 'Deployment of Policies to Unified Endpoint (Ivanti)', 3, 113),
('ITSM', 'Ivanti ISM', 'DR setup', NULL, 5, 114),
('ITSM', 'Ivanti ISM', 'Customization Training', NULL, 3, 115),
('ITSM', 'Ivanti ISM', 'Analyst Training', NULL, 1, 116),
('ITSM', 'Ivanti ISM', 'Admin Training', NULL, 3, 117),
('ITSM', 'Ivanti ISM', 'HR ServiceDesk', 'Case Management', 15, 118),
('ITSM', 'Ivanti ISM', 'Business Process Training', NULL, 0, 119),
('ITSM', 'Ivanti ISM', 'Instance of ServiceDesk', 'Another Tenant\\r\\nDefinition of Access, Service Offering/Catalogue\\r\\nAnalyst Rights and Permissions', 15, 120),
('ITSM', 'Ivanti ISM', 'Tailored Administration Traini', NULL, 5, 121),
('ITSM', 'Ivanti ISM', 'Tailored Workflow', 'System Documentation\\r\\nPrototype Design\\r\\nOne (1) Workflow\\r\\nOne (1) Form', 8, 122),
('ITSM', 'Supportworks', 'Analyst Training', NULL, 1, 123),
('ITSM', 'Supportworks', 'SelfService Customization', 'Branding and Theme of SelfService', 5, 124),
('ITSM', 'Supportworks', 'Upgrade Services', NULL, 50, 125),
('ITSM', 'Supportworks', 'SMS integration', 'Send SMS for every ticket logged', 3, 126),
('ITSM', 'Supportworks', 'Quick Start', 'Installation\\r\\nIntegration with Email and AD', 45, 127),
('ITSM', 'Supportworks', 'Instance of ServiceDesk', 'Another Tenant\\r\\nDefinition of Access, Service Offering/Catalogue\\r\\nAnalyst Rights and Permissions', 15, 128),
('ITSM', 'Supportworks', 'DR setup', NULL, 5, 129),
('ITSM', 'Supportworks', 'Tailored Workflow', 'System Documentation\\r\\nPrototype Design\\r\\nOne (1) Workflow\\r\\nOne (1) Form', 10, 130),
('ITSM', 'Supportworks', 'HR ServiceDesk', 'Case Management', 15, 131),
('ITSM', 'Supportworks', 'Customization Training', NULL, 3, 132),
('ITSM', 'Supportworks', 'Tailored Administration Traini', NULL, 5, 133),
('ITSM', 'Supportworks', 'Reporting', NULL, 1, 134),
('ITSM', 'Supportworks', 'End-User Training', NULL, 1, 135),
('ITSM', 'Supportworks', 'QR Code Integrations', 'ITSM', 3, 136),
('ITSM', 'Supportworks', 'Admin Training', NULL, 5, 137),
('ITSM', 'Supportworks', 'AD Orchestration', NULL, 0, 138),
('ITSM', 'Supportworks', 'Asset Management Automation', 'Deployment of Policies to Unified Endpoint (Ivanti)', 8, 139),
('Security', 'Ivanti Patch fo Windows (Shavlik)', 'Quick Start', '\"Installation\r\nIntegration with Email and AD\r\nBasic Configuration\"', 2, 140);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sow activities`
--
ALTER TABLE `sow activities`
  ADD PRIMARY KEY (`RecID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sow activities`
--
ALTER TABLE `sow activities`
  MODIFY `RecID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
