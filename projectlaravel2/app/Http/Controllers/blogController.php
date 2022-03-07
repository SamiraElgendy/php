<?php

namespace App\Http\Controllers;
use App\Models\blog;
use Illuminate\Http\Request;

class blogController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $data = blog::join('users','users.id','=','posts.users_id')->select('posts.*','users.name as UserName')->get();


        return view('blog.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request,[
            "description" => "required|min:50",
            "image"   => "required|image|mimes:png,jpg,JPG,PNG"
          ]);


         $FinalName = time().rand().'.'.$request->image->extension();

        if($request->image->move(public_path('images'),$FinalName)){


        $data['users_id'] = auth()->user()->id;
        $data['image'] = $FinalName;

        $op =  blog::create($data);

    

       if($op){
           $Message = "Raw Inserted";
       }else{
           $Message = "Error Try Again";
       }
    }else{
        $Message = "Error In Uploading Try Again ";
    }
        session()->flash('Message',$Message);

        return redirect(url('/Blog'));



    }

    public function show($id)
    {
    	$post = blog::find($id);
        return view('blog.show', compact('blog'));
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $data = blog::find($id);

       return view('blog.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request,[
            "description" => "required|min:50",
            "image"   => "nullable|image|mimes:png,jpg,JPG,PNG"
          ]);

          # Fetch Raw Data ....
          $rawData = blog::find($id);


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

         $op = blog::where('id',$id)->update($data);

         if($op){
             $message = "Raw Updated";
         }else{
             $message = "Error Try Again";
         }

         session()->flash('Message',$message);
        return redirect(url('/Blog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    



}
