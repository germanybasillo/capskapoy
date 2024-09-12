<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Selectbed;
use Illuminate\View\View;

class BedSelected extends Controller
{
    public function index(): View
    {
        return view('bedselected.view', [
            'selectbeds' => Selectbed::all()
        ]);
    }

    public function create(): View
    {
        return view('bedselected.add');
    }

    public function show(string $id): View
    {
        return view('bedselected.edit', [
        'selectbed' => Selectbed::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'bed_no' => 'required|string',
            'daily_rate' => 'required|string',
            'monthly_rate' => 'required|string',
            'bed_status' => 'required|in:available,occupied',
            ]
        );
        $selectbed= new Selectbed ($request->all());
        $selectbed->save();
        return redirect('/selectbeds')->with('success',"BedSelected Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
            ]);
    
        $selectbed = Selectbed::find($id);
        $selectbed->update($request->all());
    
        return redirect('/selectbeds')->with('success',"BedSelected Data Has Been updated");
    }

    public function destroy($id)
    {
      $selectbed = Selectbed::find($id);
      $selectbed->delete();
      return redirect('/selectbeds')
        ->with('success', 'BedSelected info deleted successfully');
    }
}