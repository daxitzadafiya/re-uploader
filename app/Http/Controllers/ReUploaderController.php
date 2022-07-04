<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ReUploaderController extends Controller
{
    public function store(Request $request)
    {
        $fileName = $request['ax_file_input']->store('images', ['disk' => 'public']);

        User::create([
            "image" => $fileName
        ]);
    }
}
