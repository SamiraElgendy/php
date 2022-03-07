<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;


class userController extends Controller
{
    //

    public  function __construct(){

$this->middleware('isLogin',['except' => ['create','store','login','doLogin']]);
}


    public function index(){


     // code'
      $data =  Users::get();

      return view('User.index',['data' => $data]);

    }




    public function create(){
       return view('User.create');
   }


    public function store(Request $request){

     $data =    $this->validate($request,[
             "name"     => "required",
             "email"    => "required|email",
             "password" => "required|min:6|max:10",
             "image"   => "nullable|image|mimes:png,jpg,JPG,PNG"
         ]);



         $data['password'] = bcrypt($data['password']);
         $FinalName = time().rand().'.'.$request->image->extension();

         if($request->image->move(public_path('images'),$FinalName)){
 
 
        
         $data['image'] = $FinalName;

       $op =   Users::create($data);

       if($op){
           $Message = "Raw Inserted";
       }else{
           $Message = "Error Try Again";
       }
    }else{
        $Message = "Error In Uploading Try Again ";
    }

        session()->flash('Message',$Message);

        return redirect(url('/User'));

    }




    public function edit($id){
        // code .....
      $data =   Users::where('id',$id)->get();

      //    $data =   Users::find($id);  dd($data->name);

       return view('user.edit',['data' => $data]);
    }



    public function update(Request $request){
        // code .....

        $data =    $this->validate($request,[
             "name"     => "required",
             "email"    => "required|email",
             "id"       => "required|numeric",
             "image"   => "nullable|image|mimes:png,jpg,JPG,PNG"
         ]);

         $rawData = Users::find($id);
         if(request()->hasFile('image')){

            $FinalName = time().rand().'.'.$request->image->extension();

             if($request->image->move(public_path('images'),$FinalName)){

                   unlink(public_path('images/'.$rawData->image));

                }else{
                    $FinalName = $rawData->image;
                }

         }else{
             $FinalName = $rawData->image;
         }



         $data['image'] =  $FinalName;
         $op =   Users::where('id',$data['id'])->update($data);
        if($op){
           $Message = "Raw Updated";
       }else{
           $Message = "Error Try Again";
       }

        session()->flash('Message',$Message);

        return redirect(url('/User'));
    }





    public function destroy($id){
        // code ....

       $op =   Users::where('id',$id)->delete();

       if($op){
           $Message = "Raw Removed";
       }else{
           $Message = "Error Try Again";
       }

        session()->flash('Message',$Message);

        return redirect(url('/User'));

    }





   public function login(){
       // code

       return view('User.login');
   }


   public function doLogin(Request $request){
       // code .....
       $data =    $this->validate($request,[
             "email"    => "required|email",
             "password" => "required|min:6|max:10",
             "image"   => "nullable|image|mimes:png,jpg,JPG,PNG"
         ]);



         if(auth()->attempt($data)){     // auth('web')->

           return redirect(url('/User'));

         }else{

            $message = "Error in Email || password try Again";
            session()->flash('Message',$message);
            return redirect(url('/Login'));
         }
   }




   public function logOut(){
       // code  .....
       auth()->logout();
       return redirect(url('/Login'));
   }





}