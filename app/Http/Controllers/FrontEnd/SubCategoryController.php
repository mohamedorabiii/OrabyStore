<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class SubCategoryController extends Controller
{
    public function index($id = null)
    {
        $subcategries = Subcategory::where('status',1)->get();
        return view('subcategories', compact('subcategries'));
    }
}
