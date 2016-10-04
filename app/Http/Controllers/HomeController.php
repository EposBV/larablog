<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use App\Item;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
//use Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $useritems = Auth::user()->getUserItems()->orderby('task')->get();
        return view('home', ['useritems' => $useritems]);
        
    }

    // change checkbox
    public function indexChangeCheckbox()
    {
        $id     = Input::get('id');
        $item   = Item::findOrFail($id);
        
        $item->mark();
        
        return redirect()->to('/');        
    }
    
    public function deleteTask($taskid)
    {
        $task = Item::find($taskid);
        $task->delete();
        
        return redirect()->to('/');
        
    }
    
    public function newTask()
    {
        return view('newtask');
    }    

    public function insertNewTask()
    {
        // do validation
        $rules = array
        (
            'task' => 'required|min:3|max:255'
        );
        $validator = Validator::make(Input::all(),$rules);
        
        // show errors if there are
        if ($validator->fails())
        {
            return redirect()->to('/newTask')->withErrors($validator);
        }
        
        // get logged in userid 
        $userid = Auth::user()->id;
        
        // check if edit of insert mode
        if (Input::get('taskid') > 0)
        {
            // find right item
            $task = Item::find(Input::get('taskid'));
        }
        else
        {
            // make new item and set $task defailt done
            $task = new Item;
            $task->done = false;
        }
        // fill necesary fields
        $task->task = Input::get('task');
        $task->owner_id = $userid;
        $task->save();
        
        // go back to page
        return redirect()->to('/');
        
    }
    
    
    public function gotoTask($taskid)
    {
        $task = Item::find($taskid);
        
     //   dd($task);
        return view('newtask', ['task' => $task]);
    }
    
    
    public function editTask()
    {
        echo "ddd";
    }
}
