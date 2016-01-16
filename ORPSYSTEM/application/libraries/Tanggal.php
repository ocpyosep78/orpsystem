<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Class Tanggal {

    public static function replacebulan($bulan) {
        $bulan-=1;
        $array = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $intBulan = intVal($bulan);
        $result = $array[$intBulan];
        return $result;
    }

    public static function formatDate($input) {
        if (empty($input)) {
            $tanggal = "-";
        } else {
            sscanf($input, '%d-%d-%d', $y, $m, $d);
            $bulan = tanggal::getBulan($m);
            $tanggal = $d . " " . $bulan . " " . $y;
        }

        return $tanggal;
    }
    public static function formatDateTime($input) {
        if (empty($input)) {
            $tanggal = "-";
        } else {
            sscanf($input, '%d-%d-%d %d:%d:%d', $y, $m, $d, $h, $i, $s);
            $bulan = tanggal::getBln($m);
            
            $h = tanggal::normalDigit($h);
            $i = tanggal::normalDigit($i);
            $s = tanggal::normalDigit($s);
            
            $tanggal = $d . " " . $bulan . " " . $y. " - ".$h.":".$i.":".$s."";
        }

        return $tanggal;
    }
    
    public static function formatTime($input) {
        if (empty($input)) {
            $tanggal = "-"; 
        } else {
            sscanf($input, '%d-%d-%d %d:%d:%d', $y, $m, $d, $h, $i, $s);
            
            $h = tanggal::normalDigit($h);
            $i = tanggal::normalDigit($i);
            
            //$tanggal = $h.":".$i."";
            $tanggal = "$h:$i";
        }

        return $tanggal;
    }

    public static function fieldDate($input) {
        sscanf($input, '%d-%d-%d', $y, $m, $d);
        $tanggal = $d . "-" . $m . "-" . $y;
        return $tanggal;
    }
    
    public static function fieldDateSlashFromWest($input) {
        sscanf($input, '%d/%d/%d', $m, $d, $y);
        $tanggal = $d . "-" . $m . "-" . $y;
        return $tanggal;
    }

    public static function sqlDate($input) {
        sscanf($input, '%d-%d-%d', $d, $m, $y);
        $tanggal = $y . "-" . $m . "-" . $d;
        return $tanggal;
    }
    
     public static function sqlDateSlash($input) {
        sscanf($input, '%d/%d/%d', $d, $m, $y);
        $tanggal = $y . "-" . $m . "-" . $d;
        return $tanggal;
    }

    public static function sqlDateDot($input) {
        sscanf($input, '%d.%d.%d', $d, $m, $y);
        $tanggal = $y . "-" . $m . "-" . $d;
        return $tanggal;
    }

    public static function tgl_indo($tgl) {
        $tanggal = substr($tgl, 8, 2);
        $bulan = tanggal::getBln(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    public static function daysBetween($s, $e)
{
        $s = strtotime($s);
        $e = strtotime($e);
 
        return ($e - $s)/ (24 *3600);
}
    
    public static function getBulan($bln) {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    public static function getBln($bln) {
        switch ($bln) {
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
                return "Agust";
                break;
            case 9:
                return "Sept";
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

   public static function normalDigit($d) {
        switch ($d) {
            case 0:
                return "00";
                break;
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            default :
                return $d;
        }
        
    }
    
    
    public static function getHari($h) {
        switch ($h) {
            case 'Mon':
                return "Senin";
                break;
            
            case 'Tue':
                return "Selasa";
                break;
            
            case 'Wed':
                return "Rabu";
                break;
            
            case 'Thu':
                return "Kamis";
                break;
            
            case 'Fri':
                return "Jumat";
                break;
            
            case 'Sat':
                return "Sabtu";
                break;
            
            case 'Sun':
                return "Minggu";
                break;
            
           default :
                return $h;
        }
    }


}

?>
