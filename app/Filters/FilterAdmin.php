<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $level = session()->get('level');
        if (!session()->get('isLoggedIn') || ($arguments && !in_array($level, $arguments))) {
            return redirect()->to(base_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the request is processed
    }
}
