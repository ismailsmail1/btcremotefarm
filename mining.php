<?php

include('config.php');
$w = "\033[1;37m";
$g = "\033[1;32m";
$r = "\033[1;31m";
$cy = "\033[1;36m";
$y = "\033[1;33m";
$b = "\033[1;34m";
$p = "\033[1;35m";
$d = "\033[1;30m";


function login($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        $info_code = $info["http_code"];
        if ($info_code == 200){
                if (strpos($result,"All BTC Wallets are allowed!")){
                        echo "\n\033[1;31m Disconnected...!\n";
                        sleep(2);
                       login($PHPSESSID);
                       start($PHPSESSID);
                }
                else{
                        $one = explode('<header class="wp-header" role="banner" style="list-style-type:none;">
    <h1><i class="fa fa-bitcoin"></i> 
                 <span id="user_balance">', $result);
                        $two = explode('</span></h1>', $one[1]);
                        global $pr;
                        $pr = "$two[0]\n";
                }
        }
        else{
                echo "\n\033[1;31m Disconnected...!\n";
                sleep(2);
                start($PHPSESSID);
        }
}
function ball($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_reset($ch);
        $one = explode('<header class="wp-header" role="banner" style="list-style-type:none;">
    <h1><i class="fa fa-bitcoin"></i> 
                 <span id="user_balance">', $result);
                        $two = explode('</span></h1>', $one[1]);
                        global $pr;
                        $pr = "$two[0]\n";
                        login($PHPSESSID);
}
function start($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['start_mining_info'] = '1';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
        login($PHPSESSID);
}
function click($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['claimbuttons_fb'] = '1';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_reset($ch);
}
function setInterval($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['check_status'] = '0';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
}
function stop($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['stop_mining_info'] = '1';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
}

date_default_timezone_set('Asia/Jakarta');
$asciicode = " \033[1;30m                                                                 
\033[1;35m✩✩✩✩✩✩✩✩✩✩✩✩✩✩✩★★★★★★★★★★ «\033[1;36m Good Lucky! \033[1;35m» ★★★★★★★★★★✩✩✩✩✩✩✩✩✩✩✩✩✩✩✩

\033[1;32mScript for  \033[1;31m: \033[1;33mMining Btc     || \033[1;32mTools Ini Untuk Mining
\033[1;32mScript by.  \033[1;31m: \033[1;33mBlack devils   || \033[1;32m Apk BTC REMOTE FRAM

\033[1;35m✩✩✩✩✩✩✩✩✩✩✩✩✩✩✩★★★★★★★★★★ «\033[1;36m \033[1;36mBtc Framing \033[1;35m» ★★★★★★★★★★✩✩✩✩✩✩✩✩✩✩✩✩✩✩✩

\033[1;33m==========================<\033[1;35m [".date("h:i:sa")."] \033[1;33m>==========================";

date_default_timezone_set('Asia/Jakarta');
system('clear');
echo $asciicode;
echo $y."\nConnecting....!";
login($PHPSESSID); 
echo $g."\nLogin Btc ..!\n".$g."Login Success"; 
echo "\nBallance Btc  : ".$w, $pr;
echo "\n".$y."Start Mining......!\n";
$i = 1;
while($i ==1) {
     { click($PHPSESSID);
       setInterval($PHPSESSID);
       start($PHPSESSID); echo "\n".$g."[".date("h:i:sa")."] Ballance Btc  : ".$w, $pr; 
       echo $p. ' 1 menit kedepan : ' . date('Y-m-d H:i:s', time() + (60 * 60));  ball($PHPSESSID);   
       sleep(60);
      }
     
     
}

?>