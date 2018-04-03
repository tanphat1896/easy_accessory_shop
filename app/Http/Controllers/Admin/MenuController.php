<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index() {
        $items = Menu::all();

        return view('admin.content.menu.index', compact('items'));
    }

    public function store(Request $request) {

    }

    public function destroy($id) {

    }
}
