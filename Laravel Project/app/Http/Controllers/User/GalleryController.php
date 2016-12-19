<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Models\Category;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function addCatAction()
    {
        return view('user.categories.add_categories');
    }

    public function addCategory(Request $request)
    {
        if ($request->catname == '')
            return redirect()->route('add_category')->with('error', 'Input Field Empty');
        $data = [
            'cname' => $request->catname
        ];
        $result = Category::create($data);
        if ($result) {
            return redirect()->route('add_category')->with('success', 'Category added Successfully');
        } else {
            return redirect()->route('add_category')->with('error', 'Category could not be added');
        }
    }
}
