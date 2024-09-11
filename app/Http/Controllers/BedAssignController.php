<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bedassign;
use App\Models\Room;
use App\Models\Bed;
use App\Models\Tenantprofile; 

class BedAssignController extends Controller
{
    public function index(): View
    {
        return view('bedassign.view', [
            'bedassigns' => Bedassign::all(),
        ]);
    }

    public function create(): View
    {
        return view('bedassign.add', [
            'tenantprofiles' => Tenantprofile::all(),
            'rooms' => Room::all(),
            'beds' => Bed::all(),// Pass the tenant profiles to the view
        ]);
    }

    public function show(string $id): View
    {
        return view('bedassign.edit', [
            'bedassign' => Bedassign::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'tenantprofile_id' => 'required|exists:tenantprofiles,id|unique:bedassigns,tenantprofile_id',
                'room_id' => 'required|exists:rooms,id|unique:bedassigns,room_id',
                'bed_id'  => 'required|exists:beds,id|unique:bedassigns,bed_id',  
            ]
        );
        $bedassign= new Bedassign($request->all());
        $bedassign->save();
        return redirect('/bedassigns')->with('sucess',"Bed-Assigns Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'tenantprofile_id' => 'required|exists:tenantprofiles,id|unique:bedassigns,tenantprofile_id',
                'room_id' => 'required|exists:rooms,id|unique:bedassigns,room_id',
                'bed_id'  => 'required|exists:beds,id|unique:bedassigns,bed_id',
            ]);
    
        $bedassign = Bedassign::find($id);
        $bedassign->update($request->all());
    
        return redirect('/bedassigns')->with('sucess',"Bed-Assigns Data Has Been updated");
    }

    public function destroy($id)
    {
      $bedassign = Bedassign::find($id);
      $bedassign->delete();
      return redirect('/bedassigns')
        ->with('success', 'Bed-Assigns '.$id.'info deleted successfully');
    }
}

