<?php

namespace app\http\middleware;

use think\Controller;

class Check extends Controller
{
    public function handle($request, \Closure $next)
    {
        if (!session('adminLoginVal')){
            return $this->redirect('');
        }
        return $next($request);
    }
}
