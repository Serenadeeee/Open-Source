<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Auth;
use App\Models\Social; 
use App\Models\LoginModel;
use Socialite;

class AuthController extends Controller {
    
    public function login_auth() {
        return view('admin.login');
    }

    public function login(Request $request) {

        $data = $request->validate([
            'g-recaptcha-response' => new Captcha(),
        ]);
        if(Auth::attempt(['admin_user' => $request->admin_email, 'admin_password' => $request->admin_password])) {
            return redirect('/admin');
        } else {
            return redirect('/admin/dang-nhap')
            ->with('message', 'Tên đăng nhập hoặc mật khẩu không chính xác!<br>Vui lòng kiểm tra lại!');
        }
    }


    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
        Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_user',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_user' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_status' => 1

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
             Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập thành công');
        } 
    }


    public function login_google(){
        return Socialite::driver('google')->redirect();
   }
    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = Login::where('user_id',$authUser->user)->first();
        Session::put('user_name',$account_name->user_name);
        Session::put('user_id',$account_name->user_id);
        return redirect('/')->with('message', 'Đăng nhập thành công');
      
       
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }
      
        $hieu = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);

        $orang = Login::where('user_email',$users->email)->first();

            if(!$orang){
                $orang = Login::create([
                    'user_name' => $users->name,
                    'user_email' => $users->email,
                    'user_password' => '',

                ]);
            }
        $hieu->login()->associate($orang);
        $hieu->save();

        $account_name = Login::where('user_id',$authUser->user)->first();
        Session::put('user_name',$account_name->user_name);
        Session::put('user_id',$account_name->user_id);
        return redirect('/')->with('message', 'Đăng nhập thành công');


    }




    public function logout() {
        
        Auth::logout();
        return redirect('/admin/dang-nhap');
    }
}
