<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Session;
use App\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\AdminModel;
use DB;
use App\Http\Requests;


class MailController extends Controller {

    public function send_mail() {

        //send mail
        $to_name = "Thành Phát";
        $to_email = "ducna,21it@vku.udn.vn";//send to this email

        $data = array("name"=>"Mail từ tài khoản khách hàng của DK Shop","body"=>'Mail gửi về vấn dề hàng hóa');
    
        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Test gửi mail');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        //--send mail
    }

    public function quen_mat_khau(){
        return view('admin.forget_pass');
    }

    public function recover_pass(Request $request){
        $data = $request->all();
 //       $now = Carbon::now("Asia/Ho_Chi_Minh")->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu";
        $admin = AdminModel::where('admin_user','=',$data['admin_email'])->get();
        foreach($admin as $key=>$value){
            $admin_id =$value->admin_id;
        }
        if($admin){
            $count_admin = $admin->count();
                if($count_admin==0){
                    return redirect()->back()->with('error','Email chưa được đăng kí để khôi phục mật khẩu');
                }else{
                    $token_random = Str::random();
                    $admin = AdminModel::find($admin_id);
                    $admin->admin_token = $token_random;
                    $admin->save();

                    $to_email=$data['admin_email'];
                    $link_reset_pass=url('update_new_pass?email='.$to_email.'&token='.$token_random);
                    $data=array("name"=>$title_mail,"body"=>$link_reset_pass,"email"=>$data['admin_email']);

                    Mail::send('admin.forget_pass_notify',['data'=>$data],function($message) use ($title_mail,$data)
                    {
                        $message->to($data['email'])->subject($title_mail);//send this mail with subject
                        $message->from($data['email'],$title_mail);//send from this mail
                    });
                    return redirect()->back()->with('message','Gửi email thành công, vui lòng vào email để đặt lại mật khẩu');
        }
        
    }
}
}