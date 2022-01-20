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
                $data=[
                    'sus'=>[
                        'msg'=>'登入成功',
                        'link'=>'./',
                    ],
                ];
                return json_encode($data);
                //echo '<script>alert("登入成功");document.location.href="./";</script>';
            }else{
                $data=[
                    'erreo'=>[
                        'acount' => $validation->getError('acount'),
                        'pwd'=>$validation->getError('pwd')
                    ],
                ];
                return json_encode($data);
            }
        }else{
            $data=[
                'title'=>'login'
            ];
            echo view('login',$data);
        }
    }
    public function logout(){
        $session = \Config\Services::session($config);
        $session->destroy();
        echo '<script>alert("登出成功");document.location.href="../";</script>';
    }
    
}
?>