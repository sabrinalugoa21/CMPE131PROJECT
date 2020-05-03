
-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userID` int(11) NOT NULL,
  `acctNum` int(11) NOT NULL,
  `acctName` varchar(255) DEFAULT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `acctNum` (`acctNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acctNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195096;
COMMIT;

