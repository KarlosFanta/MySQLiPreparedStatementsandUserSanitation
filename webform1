Inserting from a _POST requires 2 files. one for inputting: and another for capturing the data.
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action="webform2.php" method="post">
<table>
<?
echo "<tr><th>TransNo</th>";
echo "<th>CustNo</th>";
echo "<th>TransDate</th>";
echo "<th>AmtPaid</th>";
echo "<th>Payment Method</th>";
echo "</tr>\n";
?>
                <tr>
                        <th><input type="text" size="2"  id="TransNo"  name="TransNo" value="" />
                </th>
                        <th><input type="text" size="2"  id="CustNo"  name="CustNo" value="" />
                </th>
                <th>   
                        <input  id="TransDate" size="10" name="TransDate"  value=""  >
                </th>
                <th>
                        <input type="text"  size="5" id="AmtPaid"  name="AmtPaid" value="" />
                </th>
                <th>
                        <select name="TMethod"  id="TMethod"  >
                <option value="Please Choose">Please Choose</option>
                <option value="EFT">EFT</option>
                <option value="Cash">Cash</option>
                <option value="Cash Bank Deposit">Cash Bank Desposit</option>
                <option value="Stop-order">Stop-order</option>
                <option value="Debit">Debit</option>
                <option value="Cheque">Cheque</option> 
          </select>
                       
                </th>
                </tr>
                </table>
 
 
<!-- Table structure:  NB I Have to add primary key!
 
        CREATE TABLE `transactions` (
  `TransNo` int(11) NOT NULL,
  `CustNo` int(11) DEFAULT NULL,
  `TransDate` date NOT NULL DEFAULT '0000-00-00',
  `AmtPaid` float DEFAULT NULL,
  `Notes` varchar(500) DEFAULT NULL,
  `TMethod` varchar(30) DEFAULT NULL,
  `InvNoA` varchar(50) DEFAULT NULL,
  `InvNoAincl` float DEFAULT NULL,
  `InvNoB` varchar(11) DEFAULT NULL,
  `InvNoBincl` float DEFAULT NULL,
   PRIMARY KEY (`TransNo`),
  UNIQUE KEY `TransNo` (`TransNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 

