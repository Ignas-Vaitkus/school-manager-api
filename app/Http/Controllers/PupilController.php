<?php

namespace App\Http\Controllers;

use App\Models\Pupil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PupilController extends Controller
{
    public function index(Request $request)
    {
        return Pupil::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:11',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'grade' => 'required|max:12',
            'parent_id' => 'required',
            'school_code' => 'required|digits:9',
        ]);
        return Pupil::create($request->all());
    }

    public function show($id, Request $request)
    {
        return Pupil::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|digits:11',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'grade' => 'required|max:12',
            'school_code' => 'digits:9',
        ]);
        $Pupil = Pupil::find($id);
        $Pupil->update($request->all());
        return $Pupil;
    }

    public function destroy($id)
    {
        return Pupil::destroy($id) === 0
            ? response(["status" => "failure"], 404)
            : response(["status" => "success"], 200);
    }

    public function unapproved($id)
    {
        if ($id) {
            return Pupil::where('approved', 0)
                ->where('parent_id', $id)
                ->get();
        }

        return Pupil::where('approved', 0)
            ->get();
    }
}
