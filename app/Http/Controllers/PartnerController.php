<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerController extends Controller
{
    //
    public function index(){
        $partners = Partner::all();
    
        return view('admin.partners', compact('partners'));
    }

    public function store(Request $request){
        try {
            //code...
            $request->validate([
                'name' => 'required|string',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Handle the file upload
            if ($request->hasFile('logo')) {
                $filename = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('uploads'), $filename);


                // Create a new record in the database
                Partner::create([
                    'name' => $request->name,
                    'logo' => $filename
                ]);

                return redirect()->route('admin.partners')->with('success', 'Partner added successfully.');
            }

            return redirect()->route('admin.partners')->with('error', 'Failed to upload logo.');
        } catch (\Exception $e) {
            //throw $e;
            return response()->json($e->getMessage() , Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function partnerDelete($id)
    {
        $partner = Partner::findOrFail($id);

        $partner->delete();

        return redirect()->route('admin.partners')->with('success', 'Partners deleted successfully.');
    }
}
