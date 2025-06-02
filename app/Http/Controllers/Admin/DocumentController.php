<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentCategories = \App\Models\Category::where('module', 'document')->get();
        return view('admin.documents.create', compact('documentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'so_van_ban' => 'nullable|string|max:255',
            'trich_yeu' => 'nullable|string',
            'ngay_ban_hanh' => 'nullable|date',
            'co_quan_ban_hanh' => 'nullable|string|max:255',
            'ghi_chu' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,docx|max:10240',
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $documentData = $request->except('file');

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents', 'public');
            $documentData['file_path'] = $filePath;
        }

        Document::create($documentData);

        return redirect()->route('admin.documents.index')->with('success', 'Tài liệu đã được thêm.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $documentCategories = \App\Models\Category::where('module', 'document')->get();
        return view('admin.documents.edit', compact('document', 'documentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'so_van_ban' => 'nullable|string|max:255',
            'trich_yeu' => 'nullable|string',
            'ngay_ban_hanh' => 'nullable|date',
            'co_quan_ban_hanh' => 'nullable|string|max:255',
            'ghi_chu' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,docx|max:10240',
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $documentData = $request->except('file');

        if ($request->hasFile('file')) {
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            $filePath = $request->file('file')->store('documents', 'public');
            $documentData['file_path'] = $filePath;
        }

        $document->update($documentData);

        return redirect()->route('admin.documents.index')->with('success', 'Tài liệu đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }
        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Tài liệu đã được xóa.');
    }
}