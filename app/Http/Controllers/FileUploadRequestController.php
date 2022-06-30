<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FileUploadRequestController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('fileUpload');
    }

    public function store(FileUploadRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('uploads', $fileName); // store file with original name
        // $file->store('uploads); // store file with random name
        return back()
            ->with('success', 'Arquivo enviado com sucesso.');
    }
}