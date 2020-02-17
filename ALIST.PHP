<?php
require('connection.php');
error_reporting(1);
?>
<html>
 <head>
  <title>HOSPITAL MANAGEMENT SYSTEM</title>
  <link rel="stylesheet" href="css/bootstrap.css"/>
 </head> 
 <body style="background-color: cadetblue">
<table class="table table-bordered">

<tr bgcolor=blue><td align=center><font SIZE=6 color=white>HOSPITAL
MANAGEMENT SYSTEM</font></td></tr>
<tr><td><table align=center width=750 cellspacing=0 cellpadding=5>
<tr><td align=center><a class="btn btn-primary" href=dlist.php>Doctors</td><td align=center><a class="btn btn-primary" href=plist.php>Patients</td><td align=center><a class="btn btn-primary" href=alist.php>Appointments</td>
</table></td></tr>
<tr bgcolor=blue><td ><font size=4 color=white>Appointments
List</font></td></tr>
<tr><td><a class="btn btn-primary" href=app.php>Add New Appointments</a></td></tr>
<tr><td><table width=750 cellspacing=0 cellpadding=5>
<tr bgcolor=#ccccc><td align=center>S No</td><td align=center>Patient
Name</td><td align=center>Doctor
Name</td><td align=center>Time</td>
<td align=center>Date</td><td
align=center>Options</td></tr>
<?php

if($_GET['rno']!=null)
{
$todel=$_GET['rno'];
mysql_query("update appt SET ashow='N' where ano='$todel' ;");
}
$rs1=mysql_query("SELECT * from appt where ashow='Y'");
$sno=1;
while( $row=mysql_fetch_array($rs1)) {

$rs2=mysql_query("SELECT pname from patient where pno='$row[2]'");
$rs3=mysql_query("SELECT dname from doct where dno='$row[1]'");
$rs22=mysql_fetch_assoc($rs2);
$rs33=mysql_fetch_assoc($rs3);
 echo "<tr><td>$sno</td><td>$rs22[pname]</td><td>$rs33[dname]</td><td>$row[3]</td><td>$row[5]</td><td><a
class='btn btn-danger' href=alist.php?rno=".$row[0].">Delete</a></td></tr>";
 $sno++;
}
if ($sno==1) echo "<tr><td align=center><font size=4 color=red>Records
Not Found</font></td></tr>";?>
</table></td></tr>
<tr><td align=center><hr></td></tr>
<tr bgcolor=blue><td><font size=4 color=white>Deleted
Records</font></td></tr>
<tr><td><table width=750 cellspacing=0 cellpadding=5>
<tr bgcolor=#ccccc><td align=center>S No</td><td align=center>Patient
Name</td><td align=center>Doctor
Name</td><td align=center>Time</td>
<td align=center>Date</td><td
align=center>Options</td></tr>
<?php
$rs1=mysql_query("SELECT * from appt where ashow='N'");
$sno=1;
while( $row=mysql_fetch_array($rs1)) {

$rs2=mysql_query("SELECT pname from patient where pno='$row[2]'");
$rs3=mysql_query("SELECT dname from doct where dno='$row[1]'");
$rs22=mysql_fetch_assoc($rs2);
$rs33=mysql_fetch_assoc($rs3);
 echo "<tr><td>$sno</td><td>$rs22[pname]</td><td>$rs33[dname]</td><td>$row[3]</td><td>$row[5]</td><td><a
class='btn btn-warning' href=aundel.php?rno=".$row[0].">Undelete</a></td></tr>";
 $sno++;
}
if ($sno==1) echo "<tr><td align=center><font size=4 color=red>Records
Not Found</font></td></tr>";
?>
</table></td></tr>
</table>
</body>
</html> 
