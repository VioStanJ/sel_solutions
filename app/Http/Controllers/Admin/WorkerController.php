<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRole;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Utils;
use App\Models\Role;
use DB;

class WorkerController extends Controller
{

    public function get(Request $request,$code)
    {
        $worker = Worker::where('code','=',$code)->get()->first();
        $worker->user;

        return response()->json(['worker'=>$worker], 200);
    }

    public function index()
    {
        $workers = Worker::all();

        return view('workers.index',compact('workers'));
    }

    public function create()
    {
        return view('workers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname'=>'required',
            'firstname'=>'required',
            'phone'=>'required|unique:users,id',
            'number'=>'required',
            'type'=>'required',
            'number'=>'required',
            'formation'=>'required',
            'bio'=>'required',
            'image'=>'required|file',
        ]);

        DB::beginTransaction();

        $user = new User();
        $user->firstname = $request->firstname ;
        $user->lastname = $request->lastname ;
        $user->phone = $request->phone ;
        $user->password = bcrypt(time());

        if(!$user->save()){
            return redirect()->back()->withErrors(['Fail on save Customer !']);
        }

        UserInformation::create([
            'card_name'=>$request->type,
            'card_id'=>$request->number
        ]);

        UserRole::create([
            'user_id'=>$user->id,
            'role_id'=>Role::where('name','=','worker')->get()->first()->id
        ]);

        $worker = new Worker();

        $str=rand();

        $worker->user_id = $user->id ;
        $worker->code = "W-".md5($str);
        $worker->formation = $request->formation ;
        $worker->bio = $request->bio ;

        if($request->hasFile('image')){
            // If old image exisit, delete it for replace
            // if(file_exists(public_path($vehicle->image))){
            //     File::delete(public_path($vehicle->image));
            // }

            $store = '/storage/workers';
            Utils::mkdir($store);// Create Directory for Image is directory not exist
            $image = $request->file('image');
            $img_name = 'IMG-'.time().'.'.$image->getClientOriginalExtension();
            $desti = public_path($store);
            $worker->photo = '/storage/workers/'.$img_name;

            $image->move($desti,$img_name); // Save Image to directory
        }

        $worker->save();

        DB::commit();

        return redirect(route('admin.workers.index'));
    }

    public function manage(Request $reqeust,$id)
    {
        # code...
    }
}
