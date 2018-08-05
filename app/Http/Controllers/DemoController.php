<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BladeExport;
use App\User as UserMod; 

class DemoController extends Controller
{
    public function index()
    {
        
        return "Method GET: Index";
    }

    public function demotwo()
    {
        return "Method POST: demotwo";
    }

    public function demothree()
    {
        return "Method GET, POST : demothree";
    }

    public function demofour()
    {
        return "Method GET, POST, PUT/PATCH, DELETE : demofour";
    }

    public function testlinenoti()
    {
        $line_noti_token = "OOWEOLDfTFvmwrIwKDj28abJ2ZGecE1YiLKgJFewKqR";
        
        $message = array(
          'message' => "สวัสดีวันอาทิตย์",//required message
          'stickerPackageId'=> 3 ,
          'stickerId'=> 235
        );
        
        notify_message($message,$line_noti_token);
        
        return 'ok';
    }

    public function testexcel(){
        $user = UserMod::all();
        //dd($user);
        //$a = array('xx','yy');
        return \Excel::download(new BladeExport( $user), 'invoicesmimi.csv');
 }


}
