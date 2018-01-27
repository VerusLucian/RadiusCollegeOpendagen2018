<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OpinionsController extends Controller
{

    public function index()
    {
        $opinions = Opinion::all();
        return view('opinions')
            ->with('opinions', $opinions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'   => 'required|string|max:255',
            'name'          => 'required|string',
            'rating'        => 'required|numeric|min:1|max:5'
        ]);

        $opinion = new Opinion();
            $opinion->description = $request->description;
            $opinion->name = $request->name;
            $opinion->rating = $request->rating;
        $opinion->save();

        Session::flash('msg', 'You successfully submitted your opinion. Thank you.');
        return redirect('/');
    }
}
