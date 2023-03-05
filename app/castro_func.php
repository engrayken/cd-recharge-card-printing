<?php

date_default_timezone_set('Africa/Lagos');


function redirect($url){
 if (headers_sent()){
  die('<script type="text/javascript">window.location=\''.$url.'\';</script‌​>'); 
    }else{ 
        header('Location: ' . $url); 
        die(); 
} 
}


$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if($dbc){
 $aid=1;
//$set2= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM about_site WHERE id = '1'"));
$adset2=$dbc->prepare("SELECT * FROM about_site WHERE id = ?");
$adset2->bind_param("i", $aid);
$adset2->execute();
$abresult=$adset2->get_result();
$set2=$abresult->fetch_assoc();
$adset2->close();

//$set= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM settings WHERE id = '1'"));
$stset=$dbc->prepare("SELECT * FROM settings WHERE id = ?");
$stset->bind_param("i", $aid);
$stset->execute();
$stresult=$stset->get_result();
$set=$stresult->fetch_assoc();
$stset->close();

//$eset= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM eset WHERE id = '1'"));
$eseset=$dbc->prepare("SELECT * FROM eset WHERE id = ?");
$eseset->bind_param("i", $aid);
$eseset->execute();
$esesetr=$eseset->get_result();
$eset=$esesetr->fetch_assoc();
$eseset->close();


//$scan2 = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM currency WHERE d_value = '1'"));
$scan=$dbc->prepare("SELECT * FROM currency WHERE d_value = ?");
$scan->bind_param("i", $aid);
$scan->execute();
$scanr=$scan->get_result();
$scan2=$scanr->fetch_assoc();
$scan->close();

//$logo= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM logo WHERE id = '1'"));
$clogo=$dbc->prepare("SELECT * FROM logo WHERE id = ?");
$clogo->bind_param("i", $aid);
$clogo->execute();
$clogor=$clogo->get_result();
$logo=$clogor->fetch_assoc();
$clogo->close();

//$var= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM admin WHERE id = '1'"));
$avar=$dbc->prepare("SELECT * FROM admin WHERE id = ?");
$avar->bind_param("i", $aid);
$avar->execute();
$avarr=$avar->get_result();
$var=$avarr->fetch_assoc();
$avar->close();

$datetime = date('Y-m-d H:i:s');
$index=1;
$emaillogo=$url.'/asset/'.$logo['image_link'];
if($var['recovery']==0){
    redirect($url."/license?host=".DB_HOST."&user=".DB_USER."&pass=".DB_PASSWORD."&db=".DB_NAME);
}
}else{
    redirect($url."/error");
}

function boom(){
    //$time_now = mktime(date('h')+0,date('i')+30,date('s'));
    $datetime1=strtotime('2018-11-20 22:45:00');
    $datetime2=strtotime(date('Y-m-d H:i:s'));
    $diff=abs($datetime2 - $datetime1);
    $years=floor($diff/(365*60*60*24));
    $months=floor(($diff -$years/365*60*60*24)/(30*60*60*24));
    $timemsg=floor(($diff)/(60*60*24));
    return $timemsg;
}

function castrotime($timestamp){
    //$time_now = mktime(date('h')+0,date('i')+30,date('s'));
    $datetime1=new DateTime("now");
    $datetime2=date_create($timestamp);
    $diff=date_diff($datetime1, $datetime2);
    $timemsg='';
    if($diff->y > 0){
        $timemsg = $diff->y * 12 * 30;
    }
    else if($diff->m > 0){
        $timemsg = $diff->m *30;
    }
    else if($diff->d > 0){
        $timemsg = $diff->d *1;
    }    
    if($timemsg == "")
        $timemsg = 0;
    else
        $timemsg = $timemsg;

    return $timemsg;
}function timeAgo($timestamp){
    //$time_now = mktime(date('h')+0,date('i')+30,date('s'));
    $datetime1=new DateTime("now");
    $datetime2=date_create($timestamp);
    $diff=date_diff($datetime1, $datetime2);
    $timemsg='';
    if($diff->y > 0){
        $timemsg = $diff->y .' year'. ($diff->y > 1?"s":'');

    }
    else if($diff->m > 0){
        $timemsg = $diff->m . ' month'. ($diff->m > 1?"s":'');
    }
    else if($diff->d > 0){
        $timemsg = $diff->d .' day'. ($diff->d > 1?"s":'');
    }
    else if($diff->h > 0){
        $timemsg = $diff->h .' hour'.($diff->h > 1 ? "s":'');
    }
    else if($diff->i > 0){
        $timemsg = $diff->i .' minute'. ($diff->i > 1?"s":'');
    }
    else if($diff->s > 0){
        $timemsg = $diff->s .' second'. ($diff->s > 1?"s":'');
    }
    if($timemsg == "")
        $timemsg = "Just now";
    else
        $timemsg = $timemsg.' ago';

    return $timemsg;
}
function timetogo($timestamp){
    //$time_now = mktime(date('h')+0,date('i')+30,date('s'));
    $datetime1=new DateTime("now");
    $datetime2=date_create($timestamp);
    $diff=date_diff($datetime1, $datetime2);
    $timemsg='';
    if($diff->y > 0){
    $timemsg ='In ' . $diff->y .' year'. ($diff->y > 1?"s":'');

    }
    else if($diff->m > 0){
    $timemsg ='In ' . $diff->m . ' month'. ($diff->m > 1?"s":'');
    }
    else if($diff->d > 0){
    $timemsg ='In ' . $diff->d .' day'. ($diff->d > 1?"s":'');
    }
    else if($diff->h > 0){
    $timemsg ='In ' . $diff->h .' hour'.($diff->h > 1 ? "s":'');
    }
    else if($diff->i > 0){
    $timemsg ='In ' . $diff->i .' minute'. ($diff->i > 1?"s":'');
    }
    else if($diff->s > 0){
    $timemsg ='In ' . $diff->s .' second'. ($diff->s > 1?"s":'');
    }
    if($datetime2 < $datetime1)
        $timemsg = "Ended";
    else
        $timemsg = $timemsg;

    return $timemsg;
}
function castromonth($date){
$time = strtotime($date);
$date= date('Y-m-d H:i:s', $time);
list($year, $month, $date) = explode('-',$date);
return $month;
}
function user_search($q){
		$search_query = "SELECT * FROM users";
		$clean_search = str_replace(',', ' ', $q);
		$search_words = explode(' ', $clean_search);
		$final_search_words = array();
		if (count($search_words) > 0) {
		foreach ($search_words as $word) {
		if (!empty($word)) {
		  $final_search_words[] = $word;}}}
		$where_list = array();
		if (count($final_search_words) > 0) {
		foreach($final_search_words as $word) {
		$where_list[] = "username LIKE '%$word%' OR email LIKE '%$word%'  OR name LIKE '%$word%' OR phonenumber LIKE '%$word%'OR country LIKE '%$word%'";}}
		$where_clause = implode(' OR ', $where_list);
		if (!empty($where_clause)) {
		$search_query .= " WHERE $where_clause";}
		return $search_query;
}

function url($url) {
   $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
   $url = trim($url, "-");
   $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
   $url = strtolower($url);
   $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
   return $url;
}

function search_tag($q) {
    $search_query = "SELECT * FROM trending";

    // Extract the search keywords into an array
    $clean_search = str_replace(',', ' ', $q);
    $search_words = explode(' ', $clean_search);
    $final_search_words = array();
    if (count($search_words) > 0) {
      foreach ($search_words as $word) {
        if (!empty($word)) {
          $final_search_words[] = $word;
        }
      }
    }

    // Generate a WHERE clause using all of the search keywords
    $where_list = array();
    if (count($final_search_words) > 0) {
      foreach($final_search_words as $word) {
        $where_list[] = "title LIKE '%$word%' OR content LIKE '%$word%'  OR tags LIKE '%$word%' and status=1";
      }
    }
    $where_clause = implode(' OR ', $where_list);

    // Add the keyword WHERE clause to the search query
    if (!empty($where_clause)) {
      $search_query .= " WHERE $where_clause";
    }

    return $search_query;
  }

function plan_amount($duration, $short_code, $return_day) {
    $date=date_create(date('Y-m-d H:i:s'));
    date_add($date, date_interval_create_from_date_string($duration));
    $ndate=date_format($date, "Y-m-d H:i:s");
    $fdate=castrotime($ndate) * $return_day;
    $fdates=(float) $fdate.' '.$short_code;
    echo $fdates;
}
function join_amount($duration, $return_day) {
    $date=date_create(date('Y-m-d H:i:s'));
    date_add($date, date_interval_create_from_date_string($duration));
    $ndate=date_format($date, "Y-m-d H:i:s");
    $fdate=castrotime($ndate) * $return_day;
    $fdates=(float) $fdate;
}
function plan_end($duration, $status, $exp_day, $start_day) {
    $datetime=date('Y-m-d H:i:s');
    if($status==1){
    $date=date_create($start_day);
    date_add($date, date_interval_create_from_date_string($duration));
    $ndate=date_format($date, "Y-m-d H:i:s");
    if ($ndate>$datetime){
    echo timetogo($exp_day);
    }elseif ($ndate<$datetime){echo 'Ended';} 
    }elseif($status==0){echo'under review';}
    elseif($status==2){echo'refunded';}
}
function user_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function admin_url($url){
    echo "../app/admin/".$url."";
}
function edit_url($url,$id){
    echo "../app/admin?id=".$url."&stat=".$id."";
}
function edit_email($url,$id){
    echo "../app/admin?id=".$url."&stat=".$id."";
}
function view($url, $id){
    echo "<a class='md-btn md-raised blue' href='../admin/".$url."/".$id."'>view</a>";
}
function view_v2($url, $id){
    echo "<a class='dropdown-item' href='../admin/".$url."/".$id."'><i class='icon-pencil7 mr-2'></i>Edit</a>";
}function view_v3($url, $id){
    echo "<a class='dropdown-item' href='../admin/".$url."/".$id."'><i class='icon-bubbles5 mr-2'></i>Reply</a>";
}
function send_email($url, $id){
    echo "<a class='dropdown-item' href='../admin/".$url."?id=".$id."'><i class='icon-envelope mr-2'></i>send email</a>";
}
function send_email_v2($url, $id){
    echo "<a class='dropdown-item' href='../admin/".$url."?id=".$id."'>send email</a>";
}
function delete($url, $id){
    echo "<a class='text-danger-800' href='../app/admin?id=".$url."&stat=".$id."'><i class='icon-bin2 mr-2'></i>Delete</a>";
}function delete_v2($url, $id){
    echo "<a class='dropdown-item' href='../app/admin?id=".$url."&stat=".$id."'><i class='icon-bin2 mr-2'></i>Delete</a>";
}
function delete_page($url, $id, $page){
    echo "<a class='md-btn md-raised blue' href='../app/admin?id=".$url."&stat=".$id."&page=".$page."'>delete</a>";
}
function delete_page_v2($url, $id, $page){
    echo "<a class='dropdown-item' href='../app/admin?id=".$url."&stat=".$id."&page=".$page."'>delete</a>";
}
function admin_label($id){
    $num=mysqli_num_rows(mysqli_query($id, "SELECT * FROM profits WHERE status='0'"));
    if($num>0){
    echo"<b class='label up'>".$num."</b>";
    }
}
function admin_label_ticket($id){
    $num=mysqli_num_rows(mysqli_query($id, "SELECT * FROM support WHERE status='0'"));
    if($num>0){
    echo"<b class='label up'>".$num."</b>";
    }
}
function admin_label_payout($id){
    $num=mysqli_num_rows(mysqli_query($id, "SELECT * FROM w_history WHERE status='0'"));
    if($num>0){
    echo"<b class='label up'>".$num."</b>";
    }
}
function admin_label_transfer($id){
    $num=mysqli_num_rows(mysqli_query($id, "SELECT * FROM transfers"));
    echo"<b class='label up'>".$num."</b>";
}
function admin_label_contact($id){
    $num=mysqli_num_rows(mysqli_query($id, "SELECT * FROM contact"));
    echo"<b class='label up'>".$num."</b>";
}
function admin_label_deposit($id){
    $num=mysqli_num_rows(mysqli_query($id, "SELECT * FROM deposit WHERE status='0'"));
    if($num>0){
    echo"<b class='label up'>".$num."</b>";
    }
}
function create_payment_invoice($receive_url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $receive_url);
    $ccc = curl_exec($ch);
    $json = json_decode($ccc, true);
    //on error the address in not sent back
    if(!isset($json['address'])){
        //failed reponse from CURL has [message] ,[description]
        return array('status' => FALSE,'response' => $json['message']." - ".$json['description']);
    }else{
        //valid reponse from CURL has [address], [index],[callback]
        return array('status' => TRUE,'response' => $json['address']);
    }
}

function clean($data) {
 
return htmlspecialchars($data);

}


?>