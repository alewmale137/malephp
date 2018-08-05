<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User as UserMod;
use App\Model\Shop as ShopMod;
use App\Model\Product as ProMod;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'name' => 'My Name',
            'surname' => 'My SurName',
            'email' => 'myemail@gmail.com'
        ];

       /* $item = [
            'item1' => 'My Value1',
            'item2' => 'My Value2'
        ];

        $results = [
            'data' => $data,
            'item' => $item
        ];
        return view('test', $results);
*/

        /*$mods = UserMod::where('active', 1)
                ->orderBy('age', 'desc') 
                ->take(60)
                ->get();*/
                ////////////////////
        /*$mods = UserMod::where('active', 1)
                ->where('city','bangkok')
                ->orderBy('name', 'desc') 
                //->take(60)
                ->get();*/
//////////////////

        //$mods = UserMod::find([1, 2, 3]);
        //$mods = UserMod::all();
    
    /*   foreach ($mods as $item) {
           // echo $item->name;
            echo $item->city." ".$item->name." ".$item->surname." ".$item->age."<br />";

        }*/
      /*  $count = UserMod::where('active', 1)->count();
        echo "Total rows : ".$count;*/
        ////////////

        //return "Hello";
        //return view('test');
       /* return view('test')
                    ->with('nameza', 'My Name is S')
                    ->with('email','male@hothot.com');*/

       /* $user = UserMod::find(1);
         $mods = UserMod::all();
        return view('test', compact('data','user','mods'));*/

        //return view('admin.layouts.template');
        //return view('admin.user.lists');
        
        $mods = UserMod::orderby('id','desc')->paginate(10);
        return view('admin.user.lists',compact('mods'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //เซฟดาต้าเบส
        //dd($request);
        //exit;
        /*$mod = new UserMod;
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();*/

       /* $mod = new UserMod;
        $mod->email    = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        $mod->mobile   = $request->mobile;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();*/

        request()->validate([
            'name' => 'required|min:2|max:50', //ต้องใส่ค่าถึงจะให้ผ่าน
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'age' => 'required|numeric',
            'confirm_password' => 'required|min:6|max:20|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);


        $mod = new UserMod;
        $mod->email    = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        $mod->mobile   = $request->mobile;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();
        return redirect('admin/users')
                    ->with('success', 'User ['.$request->name.'] created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$mod = UserMod::find($id);
        echo $mod->name." ".$mod->city."<br />";*/

        /*$shop = UserMod::find($id)->shop;
        echo $shop->name." ".$shop->user_id;*/

        //$user = UserMod::find($id);
        //echo $mod->shop->name;

        /*$mod = ShopMod::find($id);
        echo $mod->name."<br/>";*/

        /*$products = ShopMod::find($id)->products;
        //echo $products;
        foreach ($products as $product) {
            echo $product->name."<br />";
        }*/

        /*
        $products = ProMod::find($id);
        echo $products->name." /// ";
        echo $products->shop."///";
        echo $products->shop->name;*/

 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UserMod::find($id);
        return view('admin.user.edit',compact('item'));
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
        
        /*$mod = UserMod::find($id);           
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();
        echo "Update Success";*/

         request()->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|numeric',
            'age' => 'required|numeric',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);

        $mod = UserMod::find($id);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        //$mod->email    = $request->email;
        $mod->mobile   = $request->mobile;
        $mod->surname  = $request->surname;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();
        
        //view('admin.user.create')

        return redirect('admin/users')
                    ->with('success', 'User ['.$request->name.'] updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mod = UserMod::find($id);
        $mod->delete();
        echo "Delete Success";
    }
   
       
       
    


}
