<?php 
function setBalance($amount,$process,$accountno)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	$array = $con->query("select * from useraccounts where accountno='$accountno'");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$deposit = $row['deposit'] + $amount;
		return $con->query("update useraccounts set deposit = '$deposit' where accountno = '$accountno'");
	}else
	{
		$deposit = $row['deposit'] - $amount;
		return $con->query("update useraccounts set deposit = '$deposit' where accountno = '$accountno'");
	}
}

function setOtherBalance($amount,$process,$accountno)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	$array = $con->query("select * from otheraccounts where accountno='$accountno'");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$deposit = $row['deposit'] + $amount;
		return $con->query("update otheraccounts set deposit = '$deposit' where accountno = '$accountno'");
	}else
	{
		$deposit = $row['deposit'] - $amount;
		return $con->query("update otheraccounts set deposit = '$deposit' where accountno = '$accountno'");
	}
}
function makeTransaction($action,$amount,$other)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	if ($action == 'transfer')
	{
		return $con->query("insert into transaction (action,debit,other,userid) values ('transfer','$amount','$other','$_SESSION[userid]')");
	}
	if ($action == 'withdraw')
	{
		return $con->query("insert into transaction (action,debit,other,userid) values ('withdraw','$amount','$other','$_SESSION[userid]')");
		
	}
	if ($action == 'deposit')
	{
		return $con->query("insert into transaction (action,credit,other,userid) values ('deposit','$amount','$other','$_SESSION[userid]')");
		
	}
}
function makeTransactionCashier($action,$amount,$other,$userid)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	if ($action == 'transfer')
	{
		return $con->query("insert into transaction (action,debit,other,userid) values ('transfer','$amount','$other','$userid')");
	}
	if ($action == 'withdraw')
	{
		return $con->query("insert into transaction (action,debit,other,userid) values ('withdraw','$amount','$other','$userid')");
		
	}
	if ($action == 'deposit')
	{
		return $con->query("insert into transaction (action,credit,other,userid) values ('deposit','$amount','$other','$userid')");
		
	}
}
 ?>