<?php

namespace App\Controllers;


class Login extends BaseController
{

    public function index()
    {
        
        $request = \Config\Services::request();
        $db = \Config\Database::connect();
        $validation =  \Config\Services::validation();
        $session = \Config\Services::session($config);

        $data=$request->getPost();
        $method = $request->getMethod();
        if($method=='post'){
            
            $validation->run($data, 'signup');
            if($validation->listErrors()==''){
                $query = $db->query('SELECT * FROM `users` WHERE `acount`='.$db->escape($data['acount']).' AND `pwd`= '.$db->escape($data['pwd']));
                $row   = $query->getRowArray();
                $session->set($row);
                echo '<script>alert("登入成功");document.location.href="./";</script>';
            }
        }
        //$session->destroy();
        //var_dump($_SESSION);
        $data=[
            'validation' => $validation,
            'title'=>'login'
        ];

        echo view('login',$data);

    }
    public function logout(){
        $session = \Config\Services::session($config);
        $session->destroy();
        echo '<script>alert("登出成功");document.location.href="../";</script>';
    }
    
}
?>