<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index()
    {
        $admin= Admin::all();
        return view('admin.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.create');
    }

     public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'message' => 'nullable|string',
        'image' => 'nullable|image',
        'video' => 'nullable|mimes:mp4,mov,avi',
        'music' => 'nullable|mimes:mp3,mpeg,wav',
    ]);

    // Simpan file upload ke storage/app/public/uploads
    foreach (['image', 'video', 'music'] as $field) {
        if ($request->hasFile($field)) {
            $path = $request->file($field)->store('uploads', 'public');
            $data[$field] = $path; // simpan path relatif ke DB
        }
    }

    Admin::create($data);

    return redirect()->route('admin.index')->with('success', 'Gift berhasil ditambahkan!');
}

    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image',
            'video' => 'nullable|mimetypes:video/mp4,video/mov,video/avi',
            'music' => 'nullable|mimetypes:audio/mpeg'
        ]);

        foreach (['image', 'video', 'music'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('admin.create', 'public');
            }
        }
        $admin->update($data);
        return redirect()->route('admin.index')->with('success', 'Gift berhasil diperbarui 💕');
    }

    public function destroy(Admin $admin)
    {
        foreach (['image', 'video', 'music'] as $field) {
           if (!empty($admin->$field)) {
            $path = public_path($admin->$field);

              if (file_exists($path)) {
                @unlink($path); // pakai @ agar tidak error jika unlink gagal
            }
            }
        }

        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Gift berhasil dihapus 🗑️');
    }

    public function show($id)
    {
        $admin = Admin::findOrfail($id);
        return view('admin.show', compact('admin'));
    }
}
