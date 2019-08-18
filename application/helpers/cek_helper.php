<?php 
function cek_session_admin(){
	$ci = & get_instance();
	$session = $ci->session->userdata('level');
	if ($session != 'admin'){
		redirect(base_url());
	}
}

function cek_session_penulis(){
    $ci = & get_instance();
    $session = $ci->session->userdata('level');
    if ($session != 'penulis'){
        redirect(base_url());
    }
}

function cek_session_user(){
    $ci = & get_instance();
    $session = $ci->session->userdata('level');
    if ($session != 'user'){
        redirect(base_url());
    }
}

function cek_session_user_all(){
    $ci = & get_instance();
    $session = $ci->session->userdata('level');
    if ($session == ''){
        redirect(base_url());
    }
}

    function tgl_indo($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;       
    } 

    function rupiah($total){
        return number_format($total,0);
    }

    function tgl_simpan($tgl){
            $tanggal = substr($tgl,0,2);
            $bulan = substr($tgl,3,2);
            $tahun = substr($tgl,6,4);
            return $tahun.'-'.$bulan.'-'.$tanggal;       
    }

    function tgl_view($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = substr($tgl,5,2);
            $tahun = substr($tgl,0,4);
            return $tanggal.'-'.$bulan.'-'.$tahun;       
    }

    function tgl_grafik($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.'_'.$bulan;       
    }    

    function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function hari_ini($w){
        $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $hari_ini = $seminggu[$w];
        return $hari_ini;
    }

    function acakangkahuruf($panjang) { 
        $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; 
        $string = ''; 
        for ($i = 0; $i < $panjang; $i++) { 
            $pos = rand(0, strlen($karakter)-1); 
            $string .= $karakter{$pos}; 
        } 
            return $string; 
    }
    
    function getBulan($bln){
                switch ($bln){
                    case 1: 
                        return "Jan";
                        break;
                    case 2:
                        return "Feb";
                        break;
                    case 3:
                        return "Mar";
                        break;
                    case 4:
                        return "Apr";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Jun";
                        break;
                    case 7:
                        return "Jul";
                        break;
                    case 8:
                        return "Agu";
                        break;
                    case 9:
                        return "Sep";
                        break;
                    case 10:
                        return "Okt";
                        break;
                    case 11:
                        return "Nov";
                        break;
                    case 12:
                        return "Des";
                        break;
                }
            } 

function cek_terakhir($datetime, $full = false) {
		$today = time();    
                 $createdday= strtotime($datetime); 
                 $datediff = abs($today - $createdday);  
                 $difftext="";  
                 $years = floor($datediff / (365*60*60*24));  
                 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
                 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
                 $hours= floor($datediff/3600);  
                 $minutes= floor($datediff/60);  
                 $seconds= floor($datediff);  
                 //year checker  
                 if($difftext=="")  
                 {  
                   if($years>1)  
                    $difftext=$years." Tahun lalu";  
                   elseif($years==1)  
                    $difftext=$years." Tahun lalu";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($months>1)  
                    $difftext=$months." Bulan lalu";  
                    elseif($months==1)  
                    $difftext=$months." Bulan lalu";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($days>1)  
                    $difftext=$days." Hari lalu";  
                    elseif($days==1)  
                    $difftext=$days." Hari lalu";  
                 }  
                 //hour checker  
                 if($difftext=="")  
                 {  
                    if($hours>1)  
                    $difftext=$hours." Jam lalu";  
                    elseif($hours==1)  
                    $difftext=$hours." Jam lalu";  
                 }  
                 //minutes checker  
                 if($difftext=="")  
                 {  
                    if($minutes>1)  
                    $difftext=$minutes." Menit lalu";  
                    elseif($minutes==1)  
                    $difftext=$minutes." Menit lalu";  
                 }  
                 //seconds checker  
                 if($difftext=="")  
                 {  
                    if($seconds>1)  
                    $difftext=$seconds." Detik lalu";  
                    elseif($seconds==1)  
                    $difftext=$seconds." Detik lalu";  
                 }  
                 return $difftext;  
	}