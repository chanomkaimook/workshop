<?php
	//
	//	Load data a long time	
	//
	ini_set('max_execution_time',0);
	ini_set('memory_limit',1);
?>
css แยก design ออกจาก layout
layout (display:none)
design (font-family)

<!--	set rem convert from pixel	-->
https://nekocalc.com/px-to-rem-converter

<!--	ericmeyer css reset	(https://meyerweb.com/eric/tools/css/reset/)-->
<style>
	/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
</style>


<style>
	.partner-card[data-id=""]{
		/*	focus element have data-id=""	*/
	}
	.partner-card:not(.partner-card[data-id=""]){
		/*	เลือก class .partner-card แต่ไม่เอา attr data-id = ""	*/
	}
	.partner-card:not(a:not([href]) .partner-card){
		min-height: 14rem;
		/*	a not href	*/
	}
</style>
<!--	make element to attribute link	-->
<a href=""  class="stretched-link card-link" onclick="return false;" ></a>
	
<!--	display show sm only	-->	
<span class="d-none d-sm-block">ข้อมูลทั่วไป</span>

<input id="" name="" step="0.0001">
	<?php
	//
	//	Active Record
	//
	
	
	//	echo query
	echo $this->db->get_compiled_select();
	
	//	where query build
	$this->db->where('if(stock_lotdetail.retail_productlist_id is not null, stock_lot.status = 1,true)',null,false);
	
	//	join query build
	$this->db->join('retail_productlist','if(retail_billdetail.list_id != "", retail_billdetail.list_id = retail_productlist.id ,retail_billdetail.prolist_id = retail_productlist.id)','left',false);
	//
	//	===========================================
	//
	//	function
	//
	
	//	keep logs
	$message_logs =  "Login Systems : ".json_encode($setsession, JSON_UNESCAPED_UNICODE);
    $this->logfile->logs_actionMsg('info', $message_logs, 'Login');
	
	//	keep logs (on database)
	$datainsert = array(
                    'userid'     	=> $row->staffid,
                    'username'     	=> null,
                    'message'       => 'change password',
                    'usertype'     	=> 's'
                );
    $this->logfile->log_userEvent($datainsert);
	//
	//	===========================================
	//	===========================================
	//	Date time...
	//	===========================================
	//
	//	time แปลงวันเวลา
	$t=time();
	echo($t . "<br>");
	echo(date("Y-m-d",$t));
	
	//	===========================================
	//	Form serializeArray
	//	===========================================
	//
	//	อ่านค่าตัวแปรจาก form ....$("#frm").serializeArray()
	$input = filter_input_array(INPUT_POST);
	
	$value = "123abc456def";
	echo "result : ".filter_var($value, FILTER_SANITIZE_NUMBER_INT)."<br>"; 	
	
	$value = true;
	echo "result boolean : ".filter_var($value, FILTER_VALIDATE_BOOLEAN)."<br>"; 
	
	$value = "test@example.com";	//	check format email
	echo "result email : ".filter_var($value, FILTER_VALIDATE_EMAIL)."<br>"; 
	
	$value01 = 7.234;
	$value02 = 1234;
	$value03 = "1,234";
	$value04 = array("a");
	$value05 = null;
	echo $value01." - ".$value02."<br>";
	
	echo is_float($value01)."<br>";
	echo is_float($value02)."<br>";
	
	echo "<br>";
	echo "result float : ".filter_var($value01, FILTER_VALIDATE_FLOAT)."<br>"; 
	echo "result float : ".filter_var($value02, FILTER_VALIDATE_FLOAT)."<br>"; 	
	echo "result int : ".filter_var($value01, FILTER_VALIDATE_INT)."<br>"; 	
	echo "result int : ".filter_var($value02, FILTER_VALIDATE_INT)."<br>";
	
	echo "<br>";
	$obj = new stdClass();
	if(is_object($obj)){
		echo "is object";
	} else {
		echo "not object";
	}
	echo "<br>";
	echo "result is_int : ".is_int($value02)."<br>";
	echo "result is_string : ".is_string($value03)."<br>";
	echo "result is_float : ".is_float($value01)."<br>";
	echo "result is_bool : ".is_bool($value02)."<br>";
	echo "result is_array : ".is_array($value04)."<br>";
	echo "result is_null : ".is_null($value05)."<br>";
	echo "<br>";
	
	$value ="192.168.0.1";
	echo "result ip : ".filter_var($value, FILTER_VALIDATE_IP)."<br>"; 
	
	$value_a ="https://tutspluscom/a";
	$value_b ="string";
	echo "result url : ".filter_var($value_a, FILTER_VALIDATE_URL)."<br>"; 	
	echo "result url : ".filter_var($value_b, FILTER_VALIDATE_URL)."<br>";
	
	$value = "<h>_/*-+.12345$   ?? (     )<()>";
	echo "result string : ".filter_var($value, FILTER_SANITIZE_STRING)."<br>"; 	
	
	echo "result encode : ".filter_var($value_a, FILTER_SANITIZE_ENCODED)."<br>"; 	
	
	$value = "Is Peter <smart> & funny?";
	var_dump(filter_var($value,FILTER_SANITIZE_SPECIAL_CHARS));
	echo "result specialchar : ".filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)."<br>"; 	
	
											

	//
	//	field check
	$name = test_input($_POST["name"]);
	// check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	  $nameErr = "Only letters and white space allowed";
	}

	$email = test_input($_POST["email"]);
	// check if e-mail address is well-formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format";
	}
	
	$website = test_input($_POST["website"]);
	// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
	  $websiteErr = "Invalid URL";
	}
	
	// function check field
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);		// htmlspecialchars($_REQUEST['PHP_SELF'])
	  return $data;
	}
	//	end field check
	//
	
	//	===========================================
	//	Folder & File...
	//	===========================================
	//
	//สร้างโฟลเดอร์อัตโนมัติโดยตั้งชื่อแรนดอมตัวเลขไปเรื่อยๆ 
	$numrand = (mt_rand());
	mkdir("$numrand");
	
	//	หากสร้าง path /test1/test2
	// 	สร้างด้วย mkdir ต้องกำหนด permission folder ให้เป็น 0777 ด้วย chmod
	//	โดยต้องไล่ทำตั้งแต่โฟลเดอร์แรก
	
	mkdir('/test1/test2', 0777, true);
	chmod('/test1', 0777);
	chmod('/test1/test2', 0777);
	
	//
	//	ตรวจสอบไฟล์ หรือ folder
	//
	if(file_exists("thaicreate.txt")){
	}

	//
	//  read file directory
	//
	$objOpen = opendir('asset/images/barcode');
	while (($file = readdir($objOpen)) !== false)
	{
		$filename = "";
		$type = strchr($file,".");      //  check type file
		if($type == ".png"){
			$filename = explode(".",$file);
			array_push($arraypic,$filename[0]);
		}
	}
	
	//
	//  read text file
	//
	//	ข้อมูลที่ได้จากการใช้ Function file() จะได้ออกมาเป็น Array แต่ละบัีนทัดข้อมูลที่เก็บใน File 
	//	คือ 1 ค่า index ของ Array
	//
	$data = file('application/language/page_main/'.$file);  
	for($i=0;$i<count($data);$i++){  // วนรอบเพื่อแสดงผลขอ้มูล
		
		$explod_data = explode("=>",$data[$i]);

		if(trim($explod_data[0]) == $textmeneu){
			$result = $explod_data[1];
			break;
		}

	}
	//	===========================================
	//	===========================================
	//	Array...
	//	===========================================
	//
	//	แสดง key index ของ array ที่เลือก
	array_keys(array_column($arr_detail, 'headdateonly'),$keydate);
	
	//
	//	เลือกค่าใน array 2 มิติ
	array_column($array, "bill_name");
	
	//
	//	ตัดค่าซ้ำใน array (** เฉพาะ array 1 มิติ)
	array_unique($array)
	
	//
	//	เรียงค่า index ใหม่
	array_values($array)
	
	//
	//	เรียงลำดับ น้อยไปหามาก
	asort($array);
	
	//	check null (no 0 or '')
	if($search === false){
		$search_array[] = $keygroup;
	}   
	
	//	ตรวจสอบเทียบค่าใน array
	if(in_array($_FILES["file"]["type"], $allowedFileType))
	
	//
	//	HTML select box 
	//	@param status	@int	= status work
	//	return html @text 
	//
	function html_selectStatusWork($status){
        $ci =& get_instance();
        $ci->load->database();
        
		$result = "";
		$result .= '<select id="statuswork" name="statuswork"  class="form-control form-control-sm" data-toggle="">';
        $result .= '<option  value="0" '. ($status == 0 ? "selected" : "") .'>'. $ci->lang->line("Status_Off") .'</option>';
        $result .= '<option  value="1" '. ($status == 1 ? "selected" : "") .'>'. $ci->lang->line("Status_On") .'</option>';
        $result .= '</select>';
		
		return $result;
	}
	
	//
	//	generate barcode
	//
	function barcode($code){
        //
        //	Load plugins
        //
        require_once "asset/plugin/phpbarcode/src/BarcodeGenerator.php";
        require_once "asset/plugin/phpbarcode/src/BarcodeGeneratorHTML.php";
        require_once "asset/plugin/phpbarcode/src/BarcodeGeneratorPNG.php";
        
        $result = "";

		// $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
		$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
		$border = 1;//กำหนดความหน้าของเส้น Barcode
		$height = 20;//กำหนดความสูงของ Barcode
        $img_barcode =  $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);

        //  save image on director 
        file_put_contents("asset/images/barcode/".$code.".png",$img_barcode);
        
        //  get image barcode from directory
        $objOpen = opendir('asset/images/barcode');
        while (($file = readdir($objOpen)) !== false)
        {
            $filename = "";
            $image = $code.".png";
            $type = strchr($file,".");      //  check type file
            if($type == ".png"){
                if($file == $image){
                    $result = "<img src='".base_url('asset/images/barcode/'.$file)."' >";
                }
            }
        }
        
		return $result;
    }
	
	//	===========================================
	//	String...
	//	===========================================
	//
	strtolower()		//	test and update ***มีปัญหากับตัวการันต์
	
	strtoupper()		//	TEST AND UPDATE
	mb_strtoupper($text,'UTF-8')	//	for error render thai result 
	
	ucfirst()			//	Test and update
	mb_ucfirst($text,'UTF-8')		//	for error render thai result 
	
	ucwords()			//	Test And Update
	mb_convert_case($this->lang->line('btn_signup'),MB_CASE_TITLE,'UTF-8')		//	for error render thai result 
	
	//
	//	creat function for render text
	//
	if (!function_exists('mb_ucfirst')) {
		function mb_ucfirst($str, $encoding = "UTF-8", $lower_str_end = false) {
		  $first_letter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
		  $str_end = "";
		  if ($lower_str_end) {
			$str_end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
		  }
		  else {
			$str_end = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
		  }
		  $str = $first_letter . $str_end;
		  return $str;
		}
	}
	
	//
	//	แยกตัวอักษร	
	//
	str_split($lottonumber,1);
	
	//	===========================================
	//	Hash...
	//	===========================================
	//
	//	ออกรหัสฐาน 16
	$token = openssl_random_pseudo_bytes(16);
	$token = bin2hex($token);
	
	//	ตรวจสอบรหัส
	for ($i = 1; $i <= 4; $i++) {
		$bytes = openssl_random_pseudo_bytes($i, $cstrong);
		$hex   = bin2hex($bytes);
	
		echo "Lengths: Bytes: $i and Hex: " . $hex . PHP_EOL;
		var_dump($hex);
		var_dump($cstrong);
		echo PHP_EOL;
	}
	
	//	===========================================
	//	Phpspreadsheet...
	//	===========================================
	//
	
	//	
	//
	$spreadsheet->getActiveSheet()->getStyle('F2:F'.$nextrow1)
    ->getNumberFormat()
    ->setFormatCode('0');
	
	//	===========================================
	//	SQL
	//	===========================================
	//
	
	//	
	//
	$builder->where('advance_amount <', function(BaseBuilder $builder) {
		return $builder->select('MAX(advance_amount)', false)->from('orders')->where('id >', 2);
	});
	
	//
	//	where for check superadmin
	function get_permit_set() { 

        if(chkSuperAdmin() == 0 ){
            $status = "";
        }else{
            $status = 3;
        }
        $array = array(
            'name !='   => 'default',
            'status !=' => $status
        );
        

        $sql = $this->db->select('
            permiss_set.ID,
            permiss_set.NAME,
            permiss_set.PERMISS_NAME,
            permiss_set.STATUS
        ')
        ->from('permiss_set')
        ->where($array);

        /* if(chkSuperAdmin() != 0 ){
            $sql->where('status !=',3);
        } */
        
        $number = $sql->count_all_results(null,false);

        $result = array(
            'query'     => $sql->get(),
            'total'     => $number
        );
        return $result;
    }
	
	//	ex. mysql match for fulltext column
	SELECT AlbumId, AlbumName
	FROM Albums
	WHERE MATCH(AlbumName) AGAINST('cool');
	
	//	นับจำนวนตัวอักษร
	SELECT * FROM `lotto_billdetail` where CHAR_LENGTH(lottonumber) = 3
	//	===========================================
	//	reading data array column in database
	//	===========================================
	//
	
	//	mysql date sub ,add
	//	DATE_SUB( )
	//	DATE_ADD( )
	//
	//	INTERVAL [DAY , MONTH , YEAR]
	//
	//	หาไอเทมย้อนหลัง 1 วัน
	$sqltotal = $this->db->from('retail_stock')
	->where('retail_stock.retail_productlist_id',$row->ID)
	->where('retail_stock.status',1)
	->where('date(retail_stock.date_starts) = DATE_SUB("'.date('Y-m-d').'", INTERVAL 1 DAY)',null,false);
	
	/*
		column value database
		[1,4,5]
		["a","b","c"]
		
		{"a":1,"b":2,"c":3}
		
		[{"d":"40"},{"h":"m"}]
	*/
	
	$obj = json_decode($result);
	settype($obj,"array");
	echo "total : ".count((array)$obj)." = ".$obj->array(0);
	foreach($obj as $k => $v){
		foreach($v as $kin => $vin){
			echo $k.". = ".$kin." : ".$vin ." <br>";
		}
	}
	
?>
<!--
	//
	//	clear catch on script
	//
-->
<script type="text/javascript" src="<?php echo base_url('asset/plugin/datatablebutton').'/datatables.min.js?token='.date('YmdH');?>"></script>
<script>
	// the only bit of jQuery
	$(window).bind('load', function() {

	});
	
	//	jquery input 2 paramiter 
	$('option:selected', this);
	
	// prevent resubmission เมื่อกดรีเฟรช ไม่ให้มีการ รีซับมิท
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
	
	//	===========================================
	//
	//	ajax request cache error แบบส่งไฟล์ รูป เอกสาร
	//
	var formData = new FormData();
    formData.append('inputfile',$('input#file')[0].files[0]);
	//	ปลายทางรับด้วย 
	//	$_FILES['inputfile']
	
	$.ajax({
		method: "post",
		processData: false,
		contentType: false,
		mimeType: "multipart/form-data",
		data: formData,
		url: "ajax_convertFile", 
			success: function(result){
				console.log(result);
				var obj = jQuery.parseJSON(result);
				resolve({
						result:obj
					})
			},
			complete: function(){

			},
			error: function(error){
				alert("error occured: " + error.status + " " + error.statusText);
			}
		})
		.fail(function(xhr, status, error) {
			// error handling
			alert('<?php echo trim($this->lang->line("main_alertWarning")); ?>');
			// window.location.reload();
		});
	//
	//	ajax request cache error
	//
	$(document).on('change', '#selectmemberid', function(event) {
		$.post("updateStaffLogin",
		{
			idstaff: $(this).attr('data-id'),
			idmember: $(this).val(),
		})
		.done(function(data, status, error){ 
			if(error.status == 200){	//	status complete
				var obj = jQuery.parseJSON(data); 
				if(obj.error_code !='0'){
					swal("พบความผิดปกติ ระบบจะทำการ Reload", "", "warning");
				}else{
					//	async dtaa table
					//	null,false for not refresh page
					//	
					$('#ex1').DataTable().ajax.reload(null, false);
				}
			}

		 })
		.fail(function(xhr, status, error) {
			// error handling
			alert('พบความผิดปกติ ระบบจะทำการ Reload');
			window.location.reload();
		});
	})
	
	//
	//	async await
	function ajax_addStock(){
		//
		//  submit form stock
		//
		return new Promise((resolve,reject) => {
			$.post("addStock",
			{
				//  paramiter
			})
			.done(function(data, status, error){ 
				if(error.status == 200){	//	status complete
					var obj = jQuery.parseJSON(data); 
					resolve({error_code:obj.error_code,txt:obj.txt})
				}

			})
			.fail(function(xhr, status, error) {
				// error handling
				alert('พบความผิดปกติ ระบบจะทำการ Reload');
				window.location.reload();
			});

		})
		
	}
	
	//	
	//	async await ( loading complete)
	function get_elementHistory(){
		return new Promise((resolve,reject) => {
			$.ajax({
			method: "get",
			beforeSend: function(){
			   $("#"+htmlopen).html(getLoading());
			},
			data: { open: htmlopen},
			url: "ajax_HTML_history", 
				success: function(result){
					$("#"+htmlopen).html(result);
					resolve({
							result:result
						})
				},
				complete: function(){
					elementNewKey(); 
				},
				error: function(error){
					alert("error occured: " + error.status + " " + error.statusText);
				}
			})
			.fail(function(xhr, status, error) {
				// error handling
				alert('<?php echo trim($this->lang->line("main_alertWarning")); ?>');
				window.location.reload();
			});

		})

	}
	
	//
	//	===========================================
	//
	//	ajax request normal
	//
	function checkLogins() {
		$.post("ctl_login/ajaxCheckLogin",
		{
			id: document.getElementById('name').value,
			passw: document.getElementById('passwords').value
		},
		function(data, status){
			var obj = jQuery.parseJSON(data); 
			if(obj.error_code !='0'){
				alert(obj.txt);
			}else{
				window.location.replace('ctl_login/pathadmin');
			}
		});
	}
	//
	//	===========================================
	//	Sweet Alert
	//	===========================================
	//
	function sweetAlert_Normal(){
		swal("topic","detail", "success");
	}
	
	function sweetAlert_Cache(){
		Swal.fire({
			type: 'success',
			title: 'อัพเดตข้อมูล',
			text: obj.txt,
		}).then((result) => {
			$('#modalaction').modal('hide');
		})
	}
	
	function sweetAlert_Waite(){
		var sw_icon = 'success';
		Swal.fire({
			title: 'Wait ...',
			allowOutsideClick: false,
			async onOpen (result) {
				let result1 =  await ajax_addStock()
				
				if(result1.error_code == 1){
					sw_icon = 'warning';
				}else{
					sw_icon = 'success';
				}

				Swal.fire({
					type: sw_icon,
					title: result1.txt,
					timer: 2000,
					showConfirmButton: false
					// text: 'Something went wrong!',
				}).then((result) => { 
					// window.location.replace('<?php echo site_url('mod_reservation/ctl_checkin/queue_success','http'); ?>');
					window.location.replace('<?php echo site_url(null,'http'); ?>mod_reservation/ctl_checkin/queue_success?uid='+lineid);
					
				})
			},
			onBeforeOpen () {
				Swal.showLoading ()
			},
			onAfterClose () {
				// Swal.hideLoading()
			}
		})
	}
	//
	//	close alert
	swal.close();
	
	//
	//	แบบดักจับข้อมูล **return $.get ยังไม่เข้าใจ**
	function GetDataFromServer(url) {
		var path = window.location.href;
		Swal.fire({
			title: "",
			text: "Please wait.",
			imageUrl: "../../app/app-img/loading_spinner.gif",
			showConfirmButton: false
		});
		return $.get(url)
		.then(success)
		.catch(exception);
		function success(response) {
			swal.close()
			return response.data;
		}
		function exception(ex) {
			console.log('error');
			return (ex);
		}

	}
	
	//
	//	===========================================
	//	Modal
	//	===========================================
	const queryString = decodeURIComponent(window.location.search);
	const params = new URLSearchParams(queryString);
	const lineid = params.get("uid");
	//
	//	===========================================
	//	Modal
	//	===========================================
	//
	//	API Modal
	//
	//	modal hide
	$('#modalaction').modal('hide');
	
	//	form clear value
	$("#frm").trigger('reset');
	
	//	form selected
	$('select#productgroup_id').val(2).change();
	$('select#productgroup_id').val(1).trigger('change');
	
	//
	//	===========================================
	//
	//	set time in javascript
	//
	function setTime() {
		setTimeout(function(){
			$("#"+result[x]).focus();
		},500)
	}
	//
	//	===========================================
	//
	//	button edit information form datatable
	//	== FIX == 
	//	creat button set paramiter this below
	//	1. data-id 	= product id from table database
	//	2. data-row = index id from query datatable
	//
	$(document).on('click','.btn-edit', function(event) {
		event.stopPropagation();
		
		product_id = $(this).attr('data-id');
		tr_id = event.currentTarget.attributes['data-row'].value;
		//
		//	nth-child	= key index show on display (key start 1)
		//	eq			= key index (key start 0)
		//
		var data = table.row( 'tr:nth-child('+tr_id+')' ).data();

		//
		//  data return resault array
		//  0   = order table
		//  1   = product code 
		//  2   = product name
		//  3   = product catalog
		//  4   = image barcode
		//
		inputcode.val(data[1]);
		inputproductid.val($(this).attr('data-id'));
		inputcatalog.val(data[3]);
		inputproduct.val(data[2]);

		$('#modalaction').modal().show();
	});
	//
	//	===========================================
	//	jquery html
	//
	//	check a href 
	menucheck = $('#side-menu li.d-none a[href$="'+value+'"]');
	//
	//	===========================================
	//
	//	datatable theme
	//
	function dataTables() {
		//
		//  set index column
		let tableColumn = [];
		$('table thead tr th').each(function(index){
			tableColumn[$(this).text()] = [$(this).index()];
		});
		
		// var valdate = frmdate.val();
		// var valdateto = frmdateto.val();
		var statusproduct = $('#status').val();

		var pagevalue = true;	//	sometable do not pageination
		
		setTimeout(function(){
			
			var dataTable = $('#ex1').DataTable({  
				// "serverSide": true,
				// "processing": true,  
				
				//"pageLength": 50
				"paging": pagevalue,
				"lengthChange": true,
				"lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]  ],
				"searching": true,
				
				//	on / off order
				"ordering": true,
				// "order": [[ 0, 'desc' ]],
				
				"scrollY": screen.availHeight-450+'px', 
                "scrollCollapse": false,
						
				"select": true,
				"info": true,
				"autoWidth": false,		//	auto width column
				
				//	for event in tr key index
				//	reset key index tr when table have event
				"rowReorder": true

				// "serverSide": true,
				"ajax":{  
						url:"fetch_data",  
						type:"post",
						dataType : "json",
						data:{
							statusproduct: statusproduct
						},
						//
						//	catch error 	
						//
						error: function (xhr, error, code)
                                {
                                    //  xhr return array status async
                                    if(xhr.status != 200){
                                        alert('พบข้อผิดพลาด กรุณาแจ้งเจ้าหน้าที่');
                                    }
                                } 
                        }
				},
				//	call back data before process
				"stateSave": true,
				"stateSaveCallback": function (settings, data) {
					 $('[data-toggle="popover"]').popover();
					// Send an Ajax request to the server with the state object
					/* $.ajax( {
					  "url": "/state_save",
					  "data": data,
					  "dataType": "json",
					  "type": "POST",
					  "success": function () {}
					} ); */
				},
				
				//	load finish
				"initComplete": function(settings, json) {
					/**
					*	select column footer
					 */
					this.api().columns().every( function (index) {
						var column = this;
						var select = $('<select><option value=""></option></select>')
							.appendTo( $(column.footer()).empty() )
							// .appendTo( $('tfoot .select').empty() )

							.on( 'change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
		
								column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
							} );
		
						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' );
						}
						);
						/**
						**	set column footer for select to has class 'select' only	
						*/
						var tfooterSelect =  select.parents('tfoot th');
						// console.log(tfooterSelect.hasClass('select'));
						if(tfooterSelect.hasClass('select') === false){
							$('tfoot th select:eq(' + index + ')').hide();
						}
					} );
					/**
					*	end column footer
					 */
					$('*[data=loading]').hide();
					var totalJSON = json.recordsTotal;
					if(totalJSON){
						// var outreport = "<button type=\"button\" id=\"btn_report\" class=\"btn btn-outline-primary btn-sm pull-left\">ออกรายงาน</button>";
						// $('.table-responsive').prepend(outreport);
					}else{
						$('.table-responsive').empty();
					}
					//	find data in json 
					// console.log(json.data[39][5]);
					
					//	for reload
					this.api().ajax.reload( null, false );
				},
				//	data load before 
				"preDrawCallback": function( settings ) {
					$('[data-toggle="popover"]').popover('hide');
				},
				//	data load after 
				"rowCallback": function( row, data) {
					/*
					*
					*	change status table
					*
					 */
					if ( data[indexStatus] == "online" ) {
						// $(row).css('background','#A1D991');
						$('td:eq('+indexStatus+')', row).addClass('text-success');
					}else{
						$('td:eq('+indexStatus+')', row).addClass('text-danger');
					}
				},

				// dom: 'Bfrtip',
				//
				//	button API
				//	==============================
				//	excel				= export excel file.	
				//	pdf					= export pdf file.
				//	print				= print on browser
				//	copy				= copy clipboard	
				//	colvis				= select column on table to show or hide 	
				//	columnToggle		= set number column to show or hide (@param[columns] = order column)	
				//	columnsToggle		= show column on table for toggle show or hide
				//	colvisRestore		= column visibility to show	
				//	==============================
				//
				dom:
					"<'row'<'col-sm-6 btn-sm'B><'col-sm-6 form-control-sm'f>>" +
					"<'row'<'col-sm-12 small'tr>>" +
					"<'row'<'col-sm-4'i><'col-sm-4 d-flex justify-content-center'l><'col-sm-4'p>>",
				buttons: [
					'excel',
					'pdf',
					{
						extend: 'copy',
						text: 'Copy'
					},
					'print',
					{
						extend: 'colvis',
						text: 'Column'
					},
					
					{
						extend: 'columnToggle',
						columns: 1
					},
					{
						extend: 'collection',
						autoClose: 'true',
						text: '<i class="icon-docs"></i>',
						className: '',
						titleAttr: 'export',
						tag: 'span',
						buttons: [ 'excel', 'pdf', 'copy' ]
					},
					{
						extend: 'collection',
						text: 'Tool',
						buttons: [ 'columnsToggle', 'colvisRestore' ],
						fade: true
					},
					{   
						text: '<i class="fas fa-redo-alt"></i>',
						className :'',
						titleAttr: 'reload',
						action: function ( e, dt, node, config ) {
							//
							//	API reload(callback,resetPaging [default true,false])
							//
							dt.ajax.reload();
							// dt.ajax.reload(null, false);
						}
					},
					{	//	ปริ้นแบบมีลายน้ำ เปลี่ยนชื่อ title ได้
						extend: 'print',
						text: '<i class="fas fa-print"></i>',
						title: 'Datatables example: Customisation of the print view window',
						titleAttr: 'print',
						customize: function ( win ) {
							$(win.document.body)
								.css( 'font-size', '10pt' )
								.prepend(
									'<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
								);

							$(win.document.body).find( 'table' )
								.addClass( 'compact' )
								.css( 'font-size', 'inherit' );
						}
					}
					
				],
				/* "orderFixed": {
					"pre": [ 6, 'asc' ],
					"post": [ 4, 'desc' ]
					// "pre": [[ 6, 'asc' ], [ 4, 'desc' ]]
				}, */
				"columnDefs":[  
					{  
						// "orderable": true, 
						"targets": 0 ,
						{width:"80px","targets":1},
						// { "type": "numeric-comma", targets: [3,4,5,6,7,8,9] },
						// { orderable: false, targets: 0 }
						// {className: "td-text-center", targets: "_all"},
					}
				]
				/* "columns": [
					{ "orderable": false },
					null
				] */
		}, 500);
			//
			//	Creat button on table
			//
			dataTable.button().add( 0, {
				action: function ( e, dt, button, config ) {
					// * reload data table
					// dt.ajax.reload();

					const tableid = $(this).attr('data-tableid')
					inputMethod.val('add');
					inputTableId.val(tableid);
					frm.submit();
				},
				text: 'Create',
				classname: 'btn'
			} );
			//
			//	Creat button on table custom location
			//	first step:
			//	set api DOM on datatable and creat class='toolbar'
			//
			$("div.toolbar").html('<button class="btn btn-outline-success" > <i class="fas fa-plus"> เพิ่ม</i> </button>');
			//
			//	Trigger the button at index:
			//
			$('#ex1').DataTable().button( '1' ).trigger();
			//
			//	button processing at index:
			//
			$('#ex1').DataTable().button( 3 ).processing( true );
			//
			//	table order run after table build
			//
			table.order( [ 3, 'asc' ] ).draw();
			
			/*
			//	click table
			$('#ex1 tbody').on('click', 'tr', function () {
				var data = dataTable.row( this ).data();
			} );
			*/
		

			$('#ex1').fadeIn('slow');
			$('div[data=loading]').hide();
			/* 
			//	refresh data table
			setInterval( function () {
				dataTable.ajax.reload();
			}, 3000 );
			 */
			 
			/*  $('#ex1').DataTable( {
				"dom": '<"toolbar">frtip'
			} ); */
			
			//
			//	insert button special
			// $('#buttonspecial').html(btn_specialbill)
	}
	
	if(jQuery.inArray( "stock_add", arraypermit ) >= 0 || inputpermit == 'all'){
		$("div.toolbar").html('<button id="btn-inputStore" class="btn btn-outline-secondary width-sm" > <i class="fas fa-plus"> รับเข้า</i> </button>');
	}
	
	//
	//	===========================================
	//	ETC
	//	===========================================
	
	//	color random 
	function getRandomColor() {
		var letters = '0123456789ABCDEF'.split('');
		var color = '#';
		for (var i = 0; i < 6; i++ ) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}
	
	//
	//	===========================================
	//	String
	//	===========================================
	
	//	ค้นหาว่ามีคำในตัวแปรนั้นหรือไม่
	let findPermit = str.includes("manage_stock");
	
	//	replace text
	let t = datajstree.replace("fas fa-file","far fa-file").replace("\"disabled\":true","\"disabled\":false");
	//
	//	===========================================
	//	format number format
	//	===========================================	
	//	format float
	formatMoney(price);
	
	//	format number and float (.00) return string!! 
	function formatMoney(number, decPlaces, decSep, thouSep) {
		decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
		decSep = typeof decSep === "undefined" ? "." : decSep;
		thouSep = typeof thouSep === "undefined" ? "," : thouSep;
		var sign = number < 0 ? "-" : "";
		var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
		var j = (j = i.length) > 3 ? j % 3 : 0;

		return sign +
			(j ? i.substr(0, j) + thouSep : "") +
			i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
			(decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
	}
	
	//	date
	//	@param	date	@date = date yyyy-mm-dd (2021-07-08)
	//	@param	typereturn	@text = [date , datetime]
	//	return datetime TH
	//
	function toThaiDateTimeString(date,typereturn) {
		let monthNames = [
			"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
			"พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
			"กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
		];

		let year = date.getFullYear() + 543;
		let month = monthNames[date.getMonth()];
		let numOfDay = date.getDate();

		let hour = date.getHours().toString().padStart(2, "0");
		let minutes = date.getMinutes().toString().padStart(2, "0");
		let second = date.getSeconds().toString().padStart(2, "0");

		switch(typereturn){
			case 'datetime' :
				return `${numOfDay} ${month} ${year} ` +
				`${hour}:${minutes}:${second} น.`;
			break;
			case 'date' :
				return `${numOfDay} ${month} ${year} `;
			break;
			default :
				return `${numOfDay} ${month} ${year} ` +
				`${hour}:${minutes}:${second} น.`;
			break;
		}
		
	}
	
	function toDateTimeString(date,typereturn) {
		let monthNames = [
			"january", "fabruary", "march", "april",
			"may", "june", "july", "august.",
			"sebtember", "october", "november", "december"
		];

		let year = date.getFullYear();
		let month = monthNames[date.getMonth()];
		let numOfDay = date.getDate();

		let hour = date.getHours().toString().padStart(2, "0");
		let minutes = date.getMinutes().toString().padStart(2, "0");
		let second = date.getSeconds().toString().padStart(2, "0");

		switch(typereturn){
			case 'datetime' :
				return `${numOfDay} ${month} ${year} ` +
				`${hour}:${minutes}:${second}.`;
			break;
			case 'date' :
				return `${numOfDay} ${month} ${year} `;
			break;
			default :
				return `${numOfDay} ${month} ${year} ` +
				`${hour}:${minutes}:${second}.`;
			break;
		}
		
	}
	
	//	=======================
	//	=======================
	//	Table Edit
	$("#btn-editable").Tabledit({
		url: '<?php echo site_url('mod_retailstock/ctl_retailstock/ajax_updatestock');?>',
		buttons: {
			edit: {
				class: "btn btn-info px-2 mr-1",
				html: '<i class="nav-icon fa fa-pencil" aria-hidden="true"></i>',
				action: "edit"
			}
		},
		inputClass: "form-control form-control-sm",
		deleteButton: !1,
		saveButton: 1,
		autoFocus: !1,
		hideIdentifier: true,
		columns: {
			identifier: [1, 'id'],
			editable: [
				[3, "start"],
				[4, "cut"],
				[5, "pull"],
				[6, "other"]
			]
		},
		onAjax: function(actions, serialize) {
			/* console.log('onAjax(action, serialize)');
			console.log(actions);
			console.log(serialize); */

			let start = 0;
			let cut = 0;
			let pull = 0;
			let other = 0;
			let total = 0;
			var namesplit = serialize.split("&");
			$.each(namesplit, function(key, value) {
				var valuesplit = value.split("=");
				console.log(key+" - "+valuesplit[0]+" = "+valuesplit[1]);

				switch(valuesplit[0]){
					case 'id':
						id = valuesplit[1];
						break;
					case 'start':
						start = (parseInt(valuesplit[1]) ? parseInt(valuesplit[1]) : 0);
						break;
					case 'cut':
						cut = (parseInt(valuesplit[1]) ? parseInt(valuesplit[1]) : 0);
						break;
					case 'pull':
						pull = (parseInt(valuesplit[1]) ? parseInt(valuesplit[1]) : 0);
						break;
					case 'other':
						other = (parseInt(valuesplit[1]) ? parseInt(valuesplit[1]) : 0);
						break;
				}
			});

			total = start + pull - (cut + other);
			$('table tr#'+id+' td.stock-start').text(start);
			$('table tr#'+id+' td.stock-cut').text(cut);
			$('table tr#'+id+' td.stock-pull').text(pull);
			$('table tr#'+id+' td.stock-other').text(other);
			$('table tr#'+id+' td.total').text(total);
		}
	})
</script>
<?php
//
//	===========================================
//	Excel Phpspreadsheet
//	===========================================	
//	check file type
	$allowedFileType = [
		'application/vnd.ms-excel',
		'text/xls',
		'text/xlsx',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
	];
	if (in_array($_FILES["file"]["type"], $allowedFileType)) {
		print_r($_FILES["file"]["type"]);
	}
	
//	อ่าน
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$spreadsheet = $reader->load("รายงานอาหารตามรายละเอียดตามบิล.xls");

//	สร้าง
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
$writer->save("05featuredemo.xls");

//	โหลด data lib ต่างๆ ที่ด้านบน
require 'vendor/autoload.php';
	//	ข้อมูลแบบไม่สร้างไฟล์เก็บ
	/* use PhpOffice\PhpSpreadsheet\Helper\Sample;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Writer; */
	
	//	ข้อมูลแบบสร้างไฟล์
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

?>