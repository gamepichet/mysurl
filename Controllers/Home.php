<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        #return view('welcome_message');
        $link = explode('sht',current_url());
        $link = $link[1];
        if(isset($link)){
            echo $link .'<br>';

            $db = \Config\Database::connect();
            $re = $db->query("SELECT raw_url from surl_data where shr_url='{$link}'");

            $data = $re->getResult('array');
            $dd = $data[0]['raw_url'];
            
            if(isset($dd)){
                return redirect()->to($dd);
            }else{
                $nl = base_url('surl');
                header('Refresh:2; url= '. base_url('surl')); 
                echo "ไม่มีลิงค์นี้ในฐานข้อมูล";
            }

        }else{
            return redirect()->to('surl');
        }
    }
    public function call(){
        echo "yessssssssssssss";
    }
}
