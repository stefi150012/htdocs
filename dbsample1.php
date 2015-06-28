<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.Table{
	display:table;
}
.SingleSubject{
	display: table-cell;
        border: solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
}
.SecondSubject{
	display: table-cell;
	border-right:thick solid #ff0000;
	border-width:thin;
	padding-left:5px;
	padding-right:5px;
	
}
</style>
</head>
<body>
<?php
	
	$link=mysql_connect('localhost','root','0048156529Aa');
	if(!$link) {
		die('Not Connected:' .mysql_error());
	}
	$dbconnected=mysql_select_db('subjects',$link);
	if(!$dbconnected){
		die ('Cannot use subjects:'.mysql_error());
	}
	//$insert = mysql_query("INSERT INTO subjects(subject_name) VALUES('".$data."')"); insert new row in table
	//$insert = mysql_query("DELETE FROM subjects WHERE subject_name = '".$data."'"); delete row from table
	//$insert = mysql_query("UPDATE subjects SET subject_name = 'Bad mathematics' WHERE id = ".$data); change existing row
	
	
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('1','Maths')");
	$insert=mysql_query("INSERT INTO subjects(ID,subject_name) VALUES('2','Bulgarian')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('3','English')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('4','Physics')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('5','Biology')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('6','History')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('7','Chemistry')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('8','Geography')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('9','Sport')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('10','IT')");
	$insert=mysql_query("INSERT INTO subjects (ID,subject_name) VALUES('11','Final')");
	
	
	echo "<div class='Table'>";
	$result1=mysql_query("SELECT subject_name FROM subjects",$link);
	while($row1 = mysql_fetch_array($result1))
	{
		echo "<div class = 'SingleSubject'>".$row1[0]."</div>";
	}
	echo"</div>";
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('1','Alex','Georgiev')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('2','Alexandra','Petrova')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('3','Boyan','Alexandrov')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('4','Vasil','Angelov')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('5','Velizar','Petrov')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('6','Velislava','Todorova')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('7','Georgi','Gavrilov')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('8','Georgi','Georgiev')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('9','Georgi','Stoyanov')");
	$insert1=mysql_query("INSERT INTO klas_8a(number,name,family_name) VALUES('10','Desislava','Lyubenova')");
	echo "<div class='Table'>";
	$result2=mysql_query("SELECT name,family_name FROM klas_8a",$link);
	while($row2=mysql_fetch_array($result2)){
		echo "<div class='SecondSubject'>".$row2[0]."</div>";
	}
	echo "</div>";
	$mark;
	$insert2=mysql_query("INSERT INTO marks (id,user_id,subjects_id)")
?>
</body>
</html>