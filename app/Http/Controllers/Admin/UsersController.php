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
        $mods = UserMod::paginate(10);
        return view('admin.user.lists',compact('mods'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $mod = new UserMod;
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();


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
        //
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
        
        $mod = UserMod::find($id);           
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();
        echo "Update Success";

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
