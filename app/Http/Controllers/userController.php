<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Crypt;
use App\User;
use DB;
use Event;
use Illuminate\Session;

class userController extends Controller
{
    public function create(Request $request){
        // Event::fire(new userCreateEvent);//or event(new userCreateEvent);

        return view('user.create');
    }

    public function updateUserPwd(Request $request, $id) {
        try
        {   
            Log::info('this is a test message');

            if(!user::find($id)){
                throw new Exception("用户不存在",1);
            }
    
            return $user->fill([
                'secret' => Crypt::encrypt($request->secret)
            ])->save();
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     *获取用户列表
     *
     */
    public function getList() {
        $list = [];

        return $list;
    }


    /**
     *获取用户详情
     *
     */
    public function userInfo(Request $request, $userId) {
        // $value = session('user_'.$userId);
        $value = $request->session()->get('user_'.$userId);
        // var_dump($value);exit();
        if($request->session()->has('user_'.$userId)){
            session(['user_'.$userId => $userId]);
        }

        return User::findorFail($userId);
    }

    public function upload(Request $request) {

        //验证文件在请求中是否存在
        if($request->hasFile('photo')) {
            //
        }

        //验证文件在上传过程中是否出错
        if($request->file('photo')->isValid()) {
            $destinationPath = app_env('/');
            $request->file('photo')->move($destinationPath, $filname);
        }

    }
}
