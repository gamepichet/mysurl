<?php
namespace App/Models;

class checkDup extends Model{
    $db = \Config\Database::connect();

    public function index(){
        
        do{
            $stxt = chkk();
        }while($stxt[0]=0);
        echo $stext[1];
        
    }
    public function chkk(){
        helper('text');
        $shrl = random_string('alnum', 6);

        $sql = "SELECT user_ip from surl_db where user_ip={$shrl}";
        $qr = $db->query($sql);
        $re = $qr->getResult();

        if($re<>""){
            return array(0,$shrl);
        }else{
            return array(1,$shrl)
        }

    }
}

?>