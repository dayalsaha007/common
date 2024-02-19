<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{


            function index(){


                if(Auth::id()){

                    $usertype = Auth::user()->usertype;

                    if($usertype == "0"){
                        return view('backend.dashboard.admin_dashboard');
                    }
                    elseif($usertype == "1"){
                        return view('backend.dashboard.manager_dashboard');
                    }
                    elseif($usertype == "2"){
                        return view('backend.dashboard.user_dashboard');
                    }


                }

            }

            /*--------Logout code-----*/
            function logout(){

                Auth::logout();

                $notification = array(
                    'message' => 'Logout Successfully',
                    'alert-type' => 'error',
                );

                return redirect()->route('login')->with($notification);

            }

        /*--------Profile CHange Blade----*/
            function profile_change(){

                $id = Auth::user()->id;
                $user = User::find($id);

                return view('backend.profile.profile_change', [
                    'user' => $user,
                ]);
            }


        /*--------Profile CHange full logic----*/
            function update_profile_change(Request $request, $user_id){

                if($request->file('image') == null  ){

                    if($request->new_pass == ''){

                        User::findorFail($user_id)->update([

                            'name' => $request->name,
                            'email' => $request->email,
                            'created_at' => Carbon::now(),
                        ]);
                        return response()->json(['status'=>'success', 'message'=>'Name & Email updated successfully']);

                            }
                            else
                            {

                        if( Hash::check($request->old_pass, Auth::user()->password)  ){

                            if ( $request->new_pass == $request->confirm_pass ) {

                                        User::findorFail($user_id)->update([

                                            'name' => $request->name,
                                            'email' => $request->email,
                                            'password' => Hash::make($request->new_pass),
                                            'created_at' => Carbon::now(),
                                        ]);
                                        return response()->json(['status'=>'success', 'message'=>'password updated successfully']);
                                    }
                                    return response()->json(['status'=>'success', 'message'=>'Mis matched Password']);

                                    }
                                else
                                {

                                    return response()->json(['status'=>'success', 'message'=>'Mis matched Password']);
                                }
                        }

                    }
                    else
                    {

                        $image = $request->file('image');
                        $name_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                        Image::make($image)->save('backend/upload/user/' .  $name_name);
                        $save_url = 'backend/upload/user/' .  $name_name;

                        $profile_img = User::find($user_id);
                         $old_image =  $profile_img->image;

                        if($request->new_pass == ''){

                            User::findorFail($user_id)->update([
                                'name' => $request->name,
                                'email' => $request->email,
                                'image' => $save_url,
                                'created_at' => Carbon::now(),
                            ]);

                            if (file_exists($old_image)) {
                                unlink($old_image);
                             }

                            return response()->json(['status'=>'success', 'message'=>'Image updated Successfully!']);

                                }
                                else
                                {

                                    $image = $request->file('image');
                                    $name_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                                    Image::make($image)->save('backend/upload/user/' .  $name_name);
                                    $save_url = 'backend/upload/user/' .  $name_name;

                                    $profile_img = User::find($user_id);
                                    $old_image =  $profile_img->image;


                                    if( Hash::check($request->old_pass, Auth::user()->password)  ){

                                        if ( $request->new_pass == $request->confirm_pass ) {

                                                    User::findorFail($user_id)->update([

                                                        'name' => $request->name,
                                                        'email' => $request->email,
                                                        'image' => $save_url,
                                                        'password' => Hash::make($request->new_pass),
                                                        'created_at' => Carbon::now(),
                                                    ]);

                                                    if (file_exists($old_image)) {
                                                        unlink($old_image);
                                                     }

                                                    return response()->json(['status'=>'success', 'message'=>'Image & password updated!']);
                                                }
                                                return response()->json(['status'=>'success', 'message'=>'Mis matched Password']);

                                                }
                                            else
                                            {

                                                return response()->json(['status'=>'success', 'message'=>'Mis matched Password']);
                                            }

                                        }

                                }

                        }






}
