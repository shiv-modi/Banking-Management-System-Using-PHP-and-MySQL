<?php 
function setBalance($amount,$process,$accountno)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	$stmt = $con->prepare("select * from useraccounts where accountno = ?");
	$stmt->bind_param("s", $accountno);
	$stmt->execute();
	$array = $stmt->get_result();
	$row = $array->fetch_assoc();
	$deposit = $row['deposit'] + (float)$amount;
	if ($process == 'credit') 
	{
		$stmt = $con->prepare("update useraccounts set deposit = ? where accountno = ?");
	}else
	{
		$deposit = $row['deposit'] - (float)$amount;
		$stmt = $con->prepare("update useraccounts set deposit = ? where accountno = ?");
	}
	$stmt->bind_param("ds", $deposit, $accountno);
	return $stmt->execute();
}

function setOtherBalance($amount,$process,$accountno)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	$stmt = $con->prepare("select * from otheraccounts where accountno = ?");
	$stmt->bind_param("s", $accountno);
	$stmt->execute();
	$array = $stmt->get_result();
	$row = $array->fetch_assoc();
	$deposit = $row['deposit'] + (float)$amount;
	if ($process == 'credit') 
	{
		$stmt = $con->prepare("update otheraccounts set deposit = ? where accountno = ?");
	}else
	{
		$deposit = $row['deposit'] - (float)$amount;
		$stmt = $con->prepare("update otheraccounts set deposit = ? where accountno = ?");
	}
	$stmt->bind_param("ds", $deposit, $accountno);
	return $stmt->execute();
}
function makeTransaction($action,$amount,$other)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	$userid = $_SESSION['userid'];
	if ($action == 'deposit') {
		$stmt = $con->prepare("insert into transaction (action,credit,other,userid) values (?,?,?,?)");
		$stmt->bind_param("sdsi", $action, $amount, $other, $userid);
	} else {
		$stmt = $con->prepare("insert into transaction (action,debit,other,userid) values (?,?,?,?)");
		$stmt->bind_param("sdsi", $action, $amount, $other, $userid);
	}
	return $stmt->execute();
}
function makeTransactionCashier($action,$amount,$other,$userid)
{
	$con = new mysqli('localhost','root','','charusat_bank');
	if ($action == 'deposit') {
		$stmt = $con->prepare("insert into transaction (action,credit,other,userid) values (?,?,?,?)");
		$stmt->bind_param("sdsi", $action, $amount, $other, $userid);
	} else {
		$stmt = $con->prepare("insert into transaction (action,debit,other,userid) values (?,?,?,?)");
		$stmt->bind_param("sdsi", $action, $amount, $other, $userid);
	}
	return $stmt->execute();
}
 ?>