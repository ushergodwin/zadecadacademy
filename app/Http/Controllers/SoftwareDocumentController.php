<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramSoftware;
use App\Models\SoftwareDocument;
use Illuminate\Http\Request;

class SoftwareDocumentController extends Controller
{
    //
    public function index()
    {
        $programs = Program::with('soft.documents')->get();
        return view('admin.software_documents', compact('programs'));
    }

    public function create()
    {
        $programs = Program::with('soft')->get();
        return view('admin.software_documents.create', compact('programs'));
    }

    public function store(Request $request)
{
    $request->validate([
        'program_software_id' => 'required',
        'document_name' => 'required|string|max:255',
        'document' => 'required|file|mimes:pdf,doc,docx|max:2048'
    ]);

    
    $filename = time() . '.' . $request->document->extension();

    
    $request->document->move(public_path('uploads'), $filename);

    // Store the document information in the database
    SoftwareDocument::create([
        'program_software_id' => $request->program_software_id,
        'document_name' => $request->document_name,
        'document' => $filename
    ]);

    return redirect()->route('admin.software_documents.index')->with('success', 'Software document added successfully.');
}


    public function destroy($id)
    {
        $document = SoftwareDocument::findOrFail($id); 

        if ($document->document) {
            $documentPath = public_path('uploads/' . $document->document);
            if (file_exists($documentPath)) {
                unlink($documentPath); 
            }
        }

        // Delete the document from the database
        $document->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Software document deleted successfully.');
    }

    public function getSoftwaresByProgram(Program $program)
    {
        return response()->json($program->soft);
    }

    public function showDocuments($id)
    {
        // Fetch the software by ID and paginate its documents
        $software = ProgramSoftware::findOrFail($id);
        $documents = $software->documents()->paginate(6); 

        // Pass the software and its paginated documents to the view
        return view('admin.software.documents', compact('software', 'documents'));
    }

}
