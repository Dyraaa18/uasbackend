<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    // Public method to display doctors
    public function publicIndex()
    {
        $doctors = Doctor::all();
        return view('doctor', compact('doctors'));
    }

    // Admin panel to manage doctors
    public function adminIndex()
    {
        $doctors = Doctor::all();
        return view('admin.doctors', compact('doctors'));
    }

    // Store new doctor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'specialization' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);

         // Proses upload gambar
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->specialization = $request->specialization;
        $doctor->image = $imageName; // Simpan nama file gambar ke dalam field image

        $doctor->save();

        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil ditambahkan');
    }

    // Update existing doctor
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'specialization' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);

        $doctor = Doctor::findOrFail($id);

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($doctor->image) {
                Storage::delete('public/images/' . $doctor->image);
            }
            
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $doctor->image = $imageName;
        }

        // Update data dokter
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->specialization = $request->specialization;

        $doctor->save();

        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil diperbarui');
    }

    // Delete doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil dihapus');
    }
}
