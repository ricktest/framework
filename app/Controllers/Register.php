<?php

namespace App\Controllers;


class register extends BaseController
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
            $validation->run($data, 'register');

            if($validation->listErrors()==''){
                //$data['as']=1;
                $db->table('users')->insert($data);
                if($db->affectedRows()==1){
                    echo '<script>alert("註冊成功");document.location.href="./login";</script>';
                }else{
                    echo '<script>alert("註冊失敗");document.location.href="./register";</script>';
                }
                
            }
            
        }
        $data=[
            'validation' => $validation,
            'name'=>$data['name'],
            'acount'=>$data['acount'],
        ];
        //var_dump($validation->listErrors());
        echo view('register',$data);

    }

    
}
?>