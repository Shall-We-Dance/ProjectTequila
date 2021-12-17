<html>
	<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Tequila</title>
  <link rel="shortcut icon" href="src/PT-logo.png" />
  <link rel="bookmark" href="src/PT-logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <meta http-equiv="Refresh" content="1;url=index.php" />
                

	</head>
	<body>
		<div class="div-bottom">
			<?php
				$message = $_POST['message'];
				$name = $_POST['name'];
				if($message==""|| $name==""){
					echo "<h1>未输入昵称和评论</h1>";
				}else{
				$y=date("Y年m月d日 H:i:s");
				
				function get_real_ip(){
					 $ip=FALSE;
					 //客户端IP 或 NONE 
					 if(!empty($_SERVER["HTTP_CLIENT_IP"])){
						$ip = $_SERVER["HTTP_CLIENT_IP"];
						 }//多重代理服务器下的客户端真实IP地址（可能伪造）,如果没有使用代理，此字段为空
					if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
						if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
						for ($i = 0; $i < count($ips); $i++) {
						if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
							$ip = $ips[$i];
							break;
        					}
    					 }
					}
					
				

    //客户端IP 或 (最后一个)代理服务器 IP 
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
//第二个get IP函数
	function getIp()
{
    if ($_SERVER["HTTP_CLIENT_IP"] && strcasecmp($_SERVER["HTTP_CLIENT_IP"], "unknown")) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } else {
        if ($_SERVER["HTTP_X_FORWARDED_FOR"] && strcasecmp($_SERVER["HTTP_X_FORWARDED_FOR"], "unknown")) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            if ($_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknown")) {
                $ip = $_SERVER["REMOTE_ADDR"];
            } else {
                if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],
                        "unknown")
                ) {
                    $ip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $ip = "unknown";
                }
            }
        }
    }
    return ($ip);
}
				file_put_contents("message_admin.txt",'IP:'.getIp().'[ '.$name.' ]'.$y.':'.nl2br($message,false)."\n", FILE_APPEND ) ;
				file_put_contents("message.txt",'<code> '.$name.' <sup>'.$y.'</sup></code><br/>'.nl2br($message,false).'<br/><br/>'."\n", FILE_APPEND ) ;
				echo "<h1>正在发布</h1>";
				}
			?>
		</div>
	</body>
</html>
