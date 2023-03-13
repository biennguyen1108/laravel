<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
class MenuController extends Controller
{
    public function create(){
        return view('admin.menu.add',[
            'title'=> 'thêm danh mục mới'
        ]);
    }
}
