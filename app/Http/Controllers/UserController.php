<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::get();
        return view('user', compact('users'));
    }
        
    public function export(Request $request)
    {
        $request->validate([
            'columns' => 'required|array',
        ]);
        $columns = $request->input('columns');
        return Excel::download(new UsersExport($columns), 'users.xlsx');
    }

    public function import(Request $request) 
    {
        $validator= Validator::make($request->all(),[
            'file' => 'required|mimes:xlsx,xls',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('user')->with('error','PLEASE CHOOSE FILE FIRST');;
        }
        Excel::import(new UsersImport,request()->file('file'));
        return back();
    }

}