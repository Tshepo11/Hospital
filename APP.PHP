<?php require('connection.php');?>
<html>
 <head>
  <title>Add Appointments</title>
 <link rel="stylesheet" href="css/bootstrap.css"/>
 </head> 
 <body style="background-color: cadetblue">
<table class="table table-bordered">
<tr bgcolor=blue><td align=center><font SIZE=6 color=white>HOSPITAL
MANAGEMENT SYSTEM</font></td></tr>
<tr><td><table align=center width=750 cellspacing=0 cellpadding=5>
<tr><td align=center><a class="btn btn-primary" href=dlist.php>Doctors</td><td align=center><a
class="btn btn-primary" href=plist.php>Patients</td><td align=center><a
class="btn btn-primary" href=alist.php>Appointments</td>
</table></td></tr>
<tr bgcolor=blue><td ><font size=4 color=white>Add Appointments</font></td></tr>
<form role=form name=fdadd method=post action=asave.php>
<tr><td><table width=750 cellspacing=0 cellpadding=5>
<tr><td>Patient Id</td><td><div class="input-group"><select class="form-control" name=pat style="width:230px">
<?php


$rs1=mysql_query("SELECT * from patient where pshow='Y' order by
pno;");
$sno=1;
?>
<option selected="selected" disabled="disabled">Patient Id</option>
<?php
while( $row=mysql_fetch_array($rs1)) {
 $patient_id=$row[0];
 $patient=$row[1];
 ?>
	<option value="<?php echo $patient_id ?>"><?php echo $patient_id."  :  ".$patient ?></option>
 <?php
 $sno++;
}
?>
</select>
</div></td></tr>
<tr><td>Doctor Id</td><td><div class="input-group"><select class="form-control" name=doc style="width:230px">
<option selected="selected" disabled="disabled">Doctor Id</option>
<?php

$rs2=mysql_query("SELECT * from doct where dshow='Y' order by
dno;");
$sno=1;
while($row1=mysql_fetch_array($rs2)) {
 $doctor_id=$row1[0];
 $doctor=$row1[1];
 ?>
	<option value="<?php echo $doctor_id ?>"><?php echo $doctor_id."  :  ".$doctor ?></option>
 <?php
 $sno++;
}
?>
</select>
</div></td></tr>
<tr><td>Time</td><td><div class="input-group"><input class="form-control" type=text name=tim placeholder="hh:mm" size=30
maxlength=30></div></td></tr>
<tr><td>Date</td><td><div class="input-group"><input class="form-control" type=text name=dat placeholder="yy/dd/mm" size=30
maxlength=30></div></td></tr>
</table></td></tr>
<tr><td align=center><div class="input-group"><input class=btn type=submit value=Submit></div></td></tr>
</form>
</table>
</body>
</html>
