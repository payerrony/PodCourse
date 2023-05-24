<?php

function time_now(){
    date_default_timezone_set("Asia/Dhaka");
    $time_now = date("Y-m-d h:i:sa");
    return $time_now;
}

function find_a_field($table,$field,$condition){
    //return date('Y-m-d');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




 $sql = "SELECT $field FROM $table WHERE 1 and $condition limit 1 ";
$result = $conn->query($sql);

if ($result) {
  // output data of each row
  $row = $result->fetch_assoc();
     return $row[$field];
}else{
	return NULL;
} 
 
 }

// foreign relation

function foreign_relation($table,$field1,$field2,$value,$condition){
    //return date('Y-m-d');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($condition !=""){
	$con=" WHERE $condition";
}

 $sql = "SELECT $field1,$field2 FROM $table $con ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    echo '<option></option>';
  while($row = $result->fetch_assoc()) {
	  if($value==$row[$field1]){
	echo '<option value="'.$row[$field1].'" selected >'.$row[$field2].'</option>';
	  }else{
		echo '<option value="'.$row[$field1].'">'.$row[$field2].'</option>';
	  }
  }
} 

 
 }


 
// Autocomplete from dv
function auto_complete_from_db($table,$field1,$field2,$value,$condition){
    //return date('Y-m-d');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($condition !=""){
	$con=" WHERE $condition";
}
//echo '<input list="'.$value.'" name="'.$value.'" id="'.$value.'">';
echo '<datalist id="'.$value.'">';

$sql = "SELECT $field1,$field2 FROM $table $con ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
	  if($value==$row[$field1]){
	echo '<option value="'.$row[$field1].'" selected >'.$row[$field2].'</option>';
	  }else{
		echo '<option value="'.$row[$field1].'">'.$row[$field2].'</option>';
	  }
  }
 echo '</datalist>'; 
} 

 
 }
 
 
 // foreign relation sql

function foreign_relation_sql($sql){
    //return date('Y-m-d');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    echo '<option></option>';
  while($row = $result->fetch_assoc()) {
	  if($value==$row[$field1]){
	echo '<option value="'.$row[$field1].'" selected >'.$row[$field2].'</option>';
	  }else{
		echo '<option value="'.$row[$field1].'">'.$row[$field2].'</option>';
	  }
  }
} 

 
 }
 
 // journal Item Control Function
 
 function journal_item($date,$warehouse_id,$item_id,$item_in,$item_ex,$item_price,$final_price,$tr_from,$tr_no,$user_id){
    //return date('Y-m-d');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($item_in>0){
 $amount = ($item_in*$item_price);
}else{
 $amount = ($item_ex*$item_price);    
}

if($tr_from=='Base Receive'||$tr_from=='Sales'){
    $amount = $final_price;
}

if($tr_from=='Purchase'){
    $total_in=find_a_field('journal_items','sum(item_in)','item_id="'.$item_id.'"');
    $total_amount=find_a_field('journal_items','sum(amount)','item_id="'.$item_id.'"');
    if($total_amount>0){
        $final=(($total_amount+$amount)/($total_in+$item_in));
    }else{
        $final=$item_price;
    }
}else{
    $final=0;
}



$sql = "INSERT INTO journal_items (warehouse_id, item_id, item_in,item_ex,item_price,journal_date,tr_from,tr_no,user_id,final_price,amount)
VALUES ($warehouse_id,$item_id,$item_in,$item_ex,$item_price,'".$date."','".$tr_from."',$tr_no,$user_id,$final,$amount)";

mysqli_query($conn, $sql);


mysqli_close($conn);
 
 }
 
 // journal item function end



function next_value($field,$table,$diff=1,$initiate=100001,$btw1='',$btw2='')
	{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


			if($btw1>0)
			$sql="select max(".$field.") from ".$table." where ".$field." between '".$btw1."' and '".$btw2."'";
			else
			$sql="select max(".$field.") from ".$table;
			$result=$conn->query($sql);
            
			$query=$result->fetch_row();

			$value=$query[0]+$diff;
			if($query[0] == 0)
			{
				$value=$initiate;
			}
			return $value;
	}


// ledger function Start ----------------------===============---------------------------------------------------------------

function next_group_id($cls)
{
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$max=(ceil(($cls+1)/1000))*1000;
$min=$cls;

$acc=find_a_field('ledger_groups','max(group_id)','group_id>'.$min.' and group_id<'.$max);

if($acc > 0){
$acc_no=$acc+1;
}else{
$acc_no=$min+1;

}

return $acc_no;
}

function next_ledger_id($group_id)
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


	 $max=($group_id*1000000000000)+1000000000000;
	 $min=($group_id*1000000000000);
	//$s='select max(ledger_id) from accounts_ledger where ledger_id like "%00000000" and ledger_id>'.$min.' and ledger_id<'.$max;
	//$sql=$conn->query($s);
	$acc=find_a_field('accounts_ledgers','max(ledger_id)','ledger_id like "%00000000" and ledger_id>'.$min.' and ledger_id<'.$max);
	if($acc>0){
	//$data=$sql->fetch_row();
	$acc_no=$acc+100000000;
	}else{
	$acc_no=$min+100000000;
	}
	return $acc_no;
}
function under_ledger_id($id)
{
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//***-***-***
if(($id%100000000)==0)// group level
{
	$max=($id)+100000000;
	$min=($id)-1;
	$add=10000;		// make ledger
$s='select ledger_id from accounts_ledger where ledger_id>'.$min.' and ledger_id<'.$max.' order by ledger_id desc limit 1';
}
elseif(($ledger_id%10000)==0)// ledger level
{
	$max=($id)+10000;
	$min=($id)-1;
	$add=1;		// make ledger
$s='select sub_ledger_id from sub_ledger where sub_ledger_id>'.$min.' and sub_ledger_id<'.$max.' order by sub_ledger_id desc limit 1';
}

$sql=$conn->query($s);
if($sql->num_rows > 0)
$data=$sql->fetch_row();
else
$acc_no=($id)+$add;
if(!isset($acc_no)) 
$acc_no=$data[0]+$add;
return $acc_no;
}


function next_sub_ledger_id($ledger_id)
{
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$max=$ledger_id+100000000;
$min=$ledger_id;
$acc=find_a_field('accounts_ledgers','max(ledger_id)','ledger_id like "%0000" and ledger_id>'.$min.' and ledger_id<'.$max);
if($acc > 0){
    $acc_no=$acc+10000;
}else{
    $acc_no=$min+10000;
}
return $acc_no;
}



function next_sub_sub_ledger_id($ledger_id)
{
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


 $max=number_format(($ledger_id+10000),0,'','');
 $min=number_format($ledger_id,0,'','');
 
$acc=find_a_field('accounts_ledgers','max(ledger_id)','ledger_id>'.$min.' and ledger_id<'.$max);
if($acc > 0)
$acc_no=number_format(($acc+1),0,'','');
else
$acc_no=number_format(($min+1),0,'','');
return $acc_no;
}	

// ledger function End



function next_job_id(){
    date_default_timezone_set("Asia/Dhaka");
	$year= date('Y');
	$last_id=find_a_field('job_orders','job_no','1 order by id desc ');

	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[3]+1;
        
		$job_id='JA-PEL-'.$year.'-'.$last;
		return $job_id;
	}else{
		$last=10000+1;
		$job_id='JA-PEL-'.$year.'-'.$last;
		return $job_id;
	}

}

function temp_jv_no($user1){
    date_default_timezone_set("Asia/Dhaka");
    $user=1000+$user1;
    $date=date('Ymd');

    $len=strlen($date.$user);
    $dd=$date.$user;
    
	$last_id=find_a_field('secondary_temps','jv_no','jv_no like "'.$dd.'%" order by id desc ');
    
	if($last_id !=''){
	    $pregentId = substr($last_id,$len);
		$last = $pregentId+1;
		$finalNo = $dd.$last;
		return $finalNo;
	}else{
		$finalNo=$dd.'1';
		return $finalNo;
	}

}

function jv_no($user1){
    date_default_timezone_set("Asia/Dhaka");
    $user=1000+$user1;
    $date=date('Ymd');

    $len=strlen($date.$user);
    $dd=$date.$user;
    
	$last_id=find_a_field('secondary_journals','jv_no','jv_no like "'.$dd.'%" order by id desc ');
    
	if($last_id !=''){
	    $pregentId = substr($last_id,$len);
		$last = $pregentId+1;
		$finalNo = $dd.$last;
		return $finalNo;
	}else{
		$finalNo=$dd.'1';
		return $finalNo;
	}

}

function next_ticket_id(){
    date_default_timezone_set("Asia/Dhaka");
	$year= date('y');
	$mon= date('m');
	$d=date('d');
	$last_id=find_a_field('job_tickets','job_ticket_no','1 order by id desc ');

	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[1]+1;
        
		$job_ticket_id=$year.$mon.$d.'-'.$last;
		return $job_ticket_id;
	}else{
		$last=1000+1;
		$job_ticket_id=$year.$mon.$d.'-'.$last;
		return $job_ticket_id;
	}
}

function next_transfer_no(){
    date_default_timezone_set("Asia/Dhaka");
	$year= date('y');
	$mon= date('m');
	$d=date('d');
	$last_id=find_a_field('base_transfer_masters','transfer_no','1 order by id desc ');

	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[1]+1;
        
		$transfer_no=$year.$mon.$d.'-'.$last;
		return $transfer_no;
	}else{
		$last=100+1;
		$transfer_no=$year.$mon.$d.'-'.$last;
		return $transfer_no;
	}
}

function next_sr_no(){
    date_default_timezone_set("Asia/Dhaka");
	$year= date('y');
	$mon= date('m');
	$d=date('d');
	$last_id=find_a_field('sales_return_masters','sr_no','1 order by id desc ');

	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[1]+1;
        
		$sr_no=$year.$mon.$d.'-'.$last;
		return $sr_no;
	}else{
		$last=100+1;
		$sr_no=$year.$mon.$d.'-'.$last;
		return $sr_no;
	}
}

function next_po(){
    date_default_timezone_set("Asia/Dhaka");

	$year= date('y');
	$mon= date('m');
	$d=date('d');
	$last_id=find_a_field('purchase_orders','po_no','1 order by id desc ');

	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[2]+1;
        
		$po_no='PO-'.$year.$mon.$d.'-'.$last;
		return $po_no;
	}else{
		$last=1000+1;
		$po_no='PO-'.$year.$mon.$d.'-'.$last;
		return $po_no;
	}
}

 function next_chalan_id(){
    date_default_timezone_set("Asia/Dhaka");
    
	$year= date('y');
	$mon= date('m');
	$d=date('d');
	$last_id=find_a_field('job_chalans','chalan_no','1 order by id desc ');

	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[1]+1;
        
		$chalan_no=$year.$mon.$d.'-'.$last;
		return $chalan_no;
	}else{
		$last=1000+1;
		$chalan_no=$year.$mon.$d.'-'.$last;
		return $chalan_no;
	}
}

 function next_mrr(){

	$last_id=find_a_field('purchase_receives','mrr_no','1 order by mrr_no desc ');

	if($last_id != ''){
		
		$last = $last_id+1;
        
		$mrr_no=$last;
		return $mrr_no;
	}else{
		$last=100+1;
		$mrr_no=$last;
		return $mrr_no;
	}
}

 function purchase_req_no(){

	$last_id=find_a_field('purchase_requisition_masters','req_no','1 order by req_no desc ');

	if($last_id != ''){
		
		$last = $last_id+1;
        
		$req_no=$last;
		return $req_no;
	}else{
		$last=10000+1;
		$req_no=$last;
		return $req_no;
	}
}

 function oi_no(){

	$last_id=find_a_field('warehouse_other_issues','oi_no','1 order by oi_no desc ');

	if($last_id != ''){
		
		$last = $last_id+1;
        
		$oi_no=$last;
		return $oi_no;
	}else{
		$last=1000+1;
		$oi_no=$last;
		return $oi_no;
	}
}

function issue_no(){
    $last_id=find_a_field('production_issue_masters','issue_no','1 order by id desc ');
        if($last_id>0){
            $issue_no=$last_id+1;
        }else{
            $issue_no=1000+1;
        }
}

 function or_no(){

	$last_id=find_a_field('warehouse_other_receives','or_no','1 order by or_no desc ');

	if($last_id != ''){
		
		$last = $last_id+1;
        
		$or_no=$last;
		return $or_no;
	}else{
		$last=100+1;
		$or_no=$last;
		return $or_no;
	}
}

 function base_receive_no(){

	$last_id=find_a_field('base_order_receives','base_receive_no','1 order by base_receive_no desc ');

	if($last_id != ''){
		
		$last = $last_id+1;
        
		$br_no=$last;
		return $br_no;
	}else{
		$last=1000+1;
		$br_no=$last;
		return $br_no;
	}
}


 function manual_req_no($req_for){

	$short_code=find_a_field('warehouses','short_code','id='.$req_for);
	$last_id=find_a_field('requisition_masters','manual_req_no','req_for='.$req_for.' order by id desc');

	if($last_id != ''){
		
		$last = explode('-',$last_id);
		$last_req = $last[1]+1; 
        
		$manual_req_no=$short_code.'-'.$last_req;
		return $manual_req_no;
	}else{
		$last_req= 1;
		$manual_req_no=$short_code.'-'.$last_req;
		return $manual_req_no;
	}
}

function pr_manual_req_no($req_for){

	$short_code=find_a_field('warehouses','short_code','id='.$req_for);
	$last_id=find_a_field('purchase_requisition_masters','manual_req_no','req_for='.$req_for.' order by id desc');

	if($last_id != ''){
		
		$last = explode('-',$last_id);
		$last_req = $last[1]+1; 
        
		$manual_req_no=$short_code.'-'.$last_req;
		return $manual_req_no;
	}else{
		$last_req= 1;
		$manual_req_no=$short_code.'-'.$last_req;
		return $manual_req_no;
	}
}



function design_no(){
	date_default_timezone_set("Asia/Dhaka");
	$time = date('Ymd');
	$last_id=find_a_field('pre_designs','design_no','1  order by design_no desc ');
    $supplied_by=1;
	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[1]+1;
        
		$design_no=$time.'-'.$last;
		return $design_no;
	}else{
		$last=1;
		$design_no=$time.'-'.$last;
		return $design_no;
	}
}






function base_id($base_supplied_by){
	$supplied_by= $base_supplied_by;
	
	$last_id=find_a_field('base_orders','base_order_no','1 and base_order_no like "'.$supplied_by.'-%" order by base_order_no desc ');

	if($last_id != ''){
		$data = explode("-",$last_id);
		$last = $data[1]+1;
        
		$base_no=$supplied_by.'-'.$last;
		return $base_no;
	}else{
		$last=10000+1;
		$base_no=$supplied_by.'-'.$last;
		return $base_no;
	}
}

// secondary journal push purchase receive start
function secondary_journal_purchase($date,$tr_no,$tr_id,$crLedger,$drLedger,$amount,$narration,$vat,$tax,$user){ 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


      $jv_no = jv_no($user);
      
      $sql1='INSERT INTO `secondary_journals`(`jv_no`, `jv_date`, `ledger_id`, `dr_amt`, `cr_amt`,`company_id`, `narration`, `tr_from`, `tr_no`,`tr_id`, `entry_by`, `status`,`created_at`)
      VALUES ("'.$jv_no.'","'.$date.'","'.$drLedger.'","'.$amount.'","0.00",1,"'.$narration.'","Purchase","'.$tr_no.'","'.$tr_id.'","'.$user.'","NO","'.time_now().'")';
      
      $conn->query($sql1);
      
      $sql2='INSERT INTO `secondary_journals`(`jv_no`, `jv_date`, `ledger_id`, `dr_amt`, `cr_amt`,`company_id`, `narration`, `tr_from`, `tr_no`,`tr_id`, `entry_by`, `status`,`created_at`)
      VALUES ("'.$jv_no.'","'.$date.'","'.$crLedger.'","0.00","'.$amount.'",1,"'.$narration.'","Purchase","'.$tr_no.'","'.$tr_id.'","'.$user.'","NO","'.time_now().'")';
      
      $conn->query($sql2);
      
     }

// secondary journal push purchase receive end


// secondary journal push Chalan start
function secondary_journal_chalan($date,$tr_no,$tr_id,$crLedger,$drLedger,$amount,$narration,$vat,$tax,$user){ 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


      $jv_no = jv_no($user);
      
      $sql1='INSERT INTO `secondary_journals`(`jv_no`, `jv_date`, `ledger_id`, `dr_amt`, `cr_amt`,`company_id`, `narration`, `tr_from`, `tr_no`,`tr_id`, `entry_by`, `status`,`created_at`)
      VALUES ("'.$jv_no.'","'.$date.'","'.$drLedger.'","'.$amount.'","0.00",1,"'.$narration.'","Sales","'.$tr_no.'","'.$tr_id.'","'.$user.'","NO","'.time_now().'")';
      
      $conn->query($sql1);
      
      $sql2='INSERT INTO `secondary_journals`(`jv_no`, `jv_date`, `ledger_id`, `dr_amt`, `cr_amt`,`company_id`, `narration`, `tr_from`, `tr_no`,`tr_id`, `entry_by`, `status`,`created_at`)
      VALUES ("'.$jv_no.'","'.$date.'","'.$crLedger.'","0.00","'.$amount.'",1,"'.$narration.'","Sales","'.$tr_no.'","'.$tr_id.'","'.$user.'","NO","'.time_now().'")';
      
      $conn->query($sql2);
      
     }

// secondary journal push Chalan end


//  secondary to journal push start
function secondary_to_journal($jv_no,$checked_by,$checked_at){ 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podcourse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
      $update = 'UPDATE secondary_journals SET checked_by="'.$checked_by.'",checked_at="'.$checked_at.'" , status="YES" WHERE jv_no="'.$jv_no.'" ';
      $conn->query($update);
      
      $sql='INSERT INTO journals(SELECT * FROM secondary_journals where jv_no ="'.$jv_no.'")';
      $conn->query($sql);
      
}

// end

function convert_number($number) 
{ 
    $my_number = $number;

    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 
    $Kt = floor($number / 10000000); /* Koti */
    $number -= $Kt * 10000000;
    $Gn = floor($number / 100000);  /* lakh  */ 
    $number -= $Gn * 100000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Kt) 
    { 
        $res .= convert_number($Kt) . " Koti "; 
    } 
    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Lakh"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 


} 

   function auto_complete($name){
       
    return    
    '<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
		$.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );

				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},

			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

				this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.attr( "title", "" )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: $.proxy( this, "_source" )
					})
					.tooltip({
						classes: {
							"ui-tooltip": "ui-state-highlight"
						}
					});

				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},

					autocompletechange: "_removeIfInvalid"
				});
			},

			_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.tooltip()
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-button ui-widget ui-button-icon-only custom-combobox-toggle ui-corner-right " )
					.on( "mousedown", function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.on( "click", function() {
						input.trigger( "focus" );

						// Close if already visible
						if ( wasOpen ) {
							return;
						}

						// Pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
					});
			},

			_source: function( request, response ) {
				var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = $( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
						return {
							label: text,
							value: text,
							option: this
						};
				}) );
			},

			_removeIfInvalid: function( event, ui ) {

				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}

				// Search for a match (case-insensitive)
				var value = this.input.val(),
					valueLowerCase = value.toLowerCase(),
					valid = false;
				this.element.children( "option" ).each(function() {
					if ( $( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});

				// Found a match, nothing to do
				if ( valid ) {
					return;
				}

				// Remove invalid value
				this.input
					.val( "" )
					.attr( "title", value + " didnt match any item" )
					.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
					this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},

			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});

		$( "#'.$name.'" ).combobox();
		$( "#toggle" ).on( "click", function() {
			$( "#'.$name.'" ).toggle();
		});
	} );
	</script>';
   }

