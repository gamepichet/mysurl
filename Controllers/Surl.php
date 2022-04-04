<?php

namespace App\Controllers;

class Surl extends BaseController
{
    public function index()
    {
        #return view('welcome_message');
        
        echo view('surlform');
        $this->savedata();

        
    }
    public function savedata(){
        $link = $this->request->getPost('link');
        if(isset($link)){

            helper('text');
            #$shrl = random_string('alnum', 6);
            #$surl = base_url($shrl);
                
                        
            $db = \Config\Database::connect();
            $now = date("Y-m-d H:i:s"); 
            #echo $request->getIPAddress();
            $ip = '120.110.251.01';

            #check short url is duplicate? 
            #$shrl = 'xdaqYX';
            do{
                $shrl = random_string('alpha', 4);
                $sql =  "SELECT shr_url from surl_data where shr_url='{$shrl}'";
                $qr = $db->query($sql);
                $re = $qr->getRow();
                #echo $shrl ."---" .$re ."--<br>" ;
            }while($re<>"");

            $surl = base_url('sht'.$shrl);
            echo "<a href='{$surl}'>{$surl}</a>";

            $sql = "INSERT INTO surl_data (raw_url,shr_url,make_date) VALUES (" .$db->escape($link) .",'{$shrl}',".$db->escape($now) .")";
            $db->query($sql);
            #echo $db->affectedRows();

            echo "<br><br><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" .$surl ."' atl='' title=''/>";
            
        }else{
            $ll = base_url('surl/seedata');
            echo "<br>กรุณาใส่ลิงค์ที่ต้องการ <a href='{$ll}'>ดูข้อมูลทั้งหมด</a><br>";
        }
    }
    public function seedata(){
        $db = \Config\Database::connect();
        $qr = $db->table('surl_data');
        $re = $qr->get();

        echo "<table><tr><th>no</th><th>Raw url</th><th>short url</th><th>date time</th></tr>";
        foreach($re->getResult() as $row){
            $no = $row->url_no;
            $raw = $row->raw_url;
            $shr = "<a href=" .base_url("sht" .$row->shr_url) .">" .base_url("sht" .$row->shr_url) ."</a>";
            $dat = $row->make_date;
            echo "<tr><th>{$no}</th><th>{$raw}</th><th>{$shr}</th><th>{$dat}</th></tr>";
        }
        echo "</table>";
    }
}