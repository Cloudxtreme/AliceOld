<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin {

	protected $auth;
  
	public function __construct(Guard $auth){
		$this->auth = $auth;
	}

	public function handle($request, Closure $next){
		if ($this->auth->guest()){
			if ($request->ajax()){
				return response('Unauthorized.', 401);
			}else{
				return redirect()->guest('auth/login');
			}
		}elseif(!in_array($this->auth->user()->id, explode(',', env('ADMIN_UID', '1')))){
      if ($request->ajax()){
				return response('Unauthorized.', 401);
			}else{
				return redirect()->to('/');
			}
    }

		return $next($request);
	}

}
