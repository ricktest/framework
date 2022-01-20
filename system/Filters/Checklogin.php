<?php

namespace CodeIgniter\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Checklogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
       
       if($session->name==''){
        
        return redirect()->to('/login');
      
       }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}