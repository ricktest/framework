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
                //$db->table('users')->insert($data);
                $userModel = new \App\Models\UserModel();
                
                //var_dump($test);
               if($userModel->insert($data)){
                    $data=[
                        'sus'=>[
                            'msg'=>'註冊成功',
                            'link'=>'./login',
                        ],
                    ];
                    return json_encode($data);
                    //echo '<script>alert("註冊成功");document.location.href="./login";</script>';
                }else{
                    $data=[
                        'sus'=>[
                            'msg'=>'註冊失敗',
                            'link'=>'./register',
                        ],
                    ];
                    return json_encode($data);
                   // echo '<script>alert("註冊失敗");document.location.href="./register";</script>';
                }
                
            }else{
                $data=[
                    'erreo'=>[
                        'name'=>$validation->getError('name'),
                        'acount' => $validation->getError('acount'),
                        'pwd'=>$validation->getError('pwd')
                    ],
                ];
                return json_encode($data);
            }
            
        }else{
            $data=[
                'name'=>$data['name'],
                'acount'=>$data['acount'],
            ];
            echo view('register',$data);
        }
      
      

    }

    
}
?>