<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DB;


class ProfileUpdateController extends Controller
{

   public function ProfileUpdate(Request $request)
   {   
        $user = User::findOrFail(Auth::user()->id);
        if(isset($request->photo)){
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('profile-photos'), $imageName);
            $profile_photo_path = 'profile-photos/'.$imageName;
            $user->profile_photo_path = $profile_photo_path;
            $user->avatar_selected = 0;
            UserAvatar::where('user', Auth::user()->id)->where('is_selected', 1)->update(['is_selected' => 0]);
            $user->save();
        } else {
            if(!Hash::check($request->current_password, rtrim($user->password))){
                return back()->with('error','Current Password is invalid!');
            }
            if(strlen($request->password) < 9){
                return back()->with('error','Password is too short! Please use a minimum of 9 characters');
            }
            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $user->update($data);
            $user->save();
        }
        return back()->with('success','You have successfully updated profile.'); 
        // $id = $request->input('id'); 
        // $first_name = $request->input('first_name');
        // $last_name = $request->input('last_name');
        // $email = $request->input('email');
        // if($request->photo == null){
        //     DB::update('update users set first_name = ?,last_name=?,email=? where id = ?',[$first_name,$last_name,$email,$id]);
        // } else {
        //     $imageName = time().'.'.$request->photo->extension();  
            // $request->photo->move(public_path('profile-photos'), $imageName);
            // $profile_photo_path = 'profile-photos/'.$imageName;  
        //     DB::update('update users set first_name = ?,last_name=?,email=?,profile_photo_path=? where id = ?',[$first_name,$last_name,$email,$profile_photo_path,$id]);
        // }
   }
   public function Profile_Detail_Update(Request $request){
        // $request->all();
        // return "ok";
        // $id=$request->id;
        // $first_name=$request->first_name;
        // $last_name=$request->last_name;
        // $email=$request->email;
        // $user_name=$request->user_name;
        // $current_password=$request->current_password;
        $success=false;
        $is_student = Auth::user()->hasRole('student');

            $data = [
                "id" => $request->id,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "user_name" => $request->user_name,
                "email" => $is_student ? $request->user_name : $request->email,
                "current_password" => $request->current_password,
            ];
        
       if(!$is_student)
       {
        $currentEmail = $request->user()->email;
        $newEmail = $request->email;
       }
       
        $currentUsername = $request->user()->user_name;
        $newUsername = $request->user_name;
        $error=[];
        $message='';
        
          // Check if the new username is different from the current one
          if ($currentUsername !== $newUsername) {
            // Check if the new username already exists in the database
            $username_exit = User::where("user_name", $newUsername)->count();
            
            if ($username_exit > 0) {
                // username exists, check if it belongs to another user
                $userWithNewUsername = User::where("user_name", $newUsername)->first();
                
                if ($userWithNewUsername->id !== $request->user()->id) {
                    // username belongs to another user, return error
                    // return response()->json(['success' => false, 'message' => 'Duplicate username address'], 422);
                    $error['user_name']="Username already exists";
                } 
                else{
                    $succes=true;
                    
                }
            }
           
        }
       
        // Check if the new email is different from the current one
        else if (!$is_student && $currentEmail !== $newEmail) {
            // Check if the new email already exists in the database
            $email_exit = User::where("email", $newEmail)->count();
            
            if ($email_exit > 0) {
                // Email exists, check if it belongs to another user
                $userWithNewEmail = User::where("email", $newEmail)->first();
                
                if ($userWithNewEmail->id !== $request->user()->id) {
                    // Email belongs to another user, return error
                    // return response()->json(['success' => false, 'message' => 'Duplicate email address'], 422);
                    $error['email']="Email already exists";
                } 
                else{
                    $succes=true;
                    
                }
            }
           
        }
        
        // Check if the current password provided is correct
        if (Hash::check($request->current_password, $request->user()->password)) {
          
            // Update the user's email address
            if(!$error){
                
                    $success=true;  
                    $request->user()->first_name = $data['first_name'];
                    $request->user()->last_name = $data['last_name'];
                    $request->user()->user_name = $newUsername;
                    $request->user()->email = $is_student ? $newUsername : $newEmail;
                    $request->user()->save();
                    $message="Your Profile has been updated successfully";
                
            }
            // return response()->json(['success' => true, 'message' => 'Your Profile has been updated successfully']);
        } else {
            // Current password is invalid
            $error['password']="Current Password is invalid!";
            // return response()->json(['success' => false, 'message' => 'Current Password is invalid!']);
        }
       return [
        'success'=>$success,
        'errors'=>$error,
        'message'=>$message,
       ];
   }

   public function RemoveProfilePhoto(Request $request)
   {   
        $id = $request->id;
        $profile_photo_path = null;
        DB::update('update users set profile_photo_path=? where id = ?',[$profile_photo_path,$id]);
        return response()->json([
            'message' => "Profile photo removed"
        ], 200);
   }
   public function Updatepassword(Request $request)
   {   
        $id = $request->id; 
        $currentpassword =$request->currentpassword;
        $newpassword =  $request->newpassword;
        $confimrpassword = $request->confirmpassword; 
        $success=false;
        $message="";
        // Hash::make($request->password),
        if($newpassword == $confimrpassword){
            $user = User::findOrFail($id);
            if(Hash::check($request->currentpassword, $user->password)){
                DB::update('update users set password=? where id = ?',[Hash::make($request->newpassword),$id]);
                return response()->json(['success'=>true,'message'=>'Password has been changed successfully']);
            } else {
                return response()->json(['success'=>false, 'message' => 'Current Password is invalid!']);
            }
        } else {
            return response()->json(['success'=>false, 'message' => 'Confirm password not matched']);
        }
   }
}


