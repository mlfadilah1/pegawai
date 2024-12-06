<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $pegawais = Pegawai::with('user')
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                });
            })
            ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
            ->paginate(10);


        return view('welcome', compact('pegawais'));
    }

    public function tambah()
    {
        return view('welcome');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'tanggal_lahir' => 'required|date',
            'telepon' => 'nullable',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|max:2048'
        ]);

        // Membuat user baru tanpa menyimpan foto
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'Pegawai'
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            // Set nama file foto dengan nama pengguna dan ekstensi file asli
            $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();

            // Simpan foto baru di folder 'public/users'
            $folderPath = "public/fotos/";
            $request->file('foto')->storeAs($folderPath, $foto);
        }

        // Membuat data pegawai yang terkait dengan user yang baru dibuat
        Pegawai::create([
            'user_id' => $user->id, // Menyimpan ID user ke pegawai
            'telepon' => $request->telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'foto' => $foto ?? null, // Menyimpan foto hanya di tabel pegawais
        ]);

        return redirect()->route('welcome')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit($id)
    {
        try {
            // Retrieve the employee (pegawai) record by ID along with the associated user data
            $pegawai = Pegawai::with('user')->findOrFail($id);

            return view('edit', compact('pegawai'));
        } catch (\Exception $e) {
            return redirect()->route('pegawai.index')->with('danger', 'Pegawai tidak ditemukan.');
        }
    }



    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tanggal_lahir' => 'required|date',
            'telepon' => 'nullable',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|max:2048'
        ]);

        try {
            // Find the employee (pegawai) data by ID
            $pegawai = Pegawai::findOrFail($id);
            $user = $pegawai->user;

            // Update user data
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            // Prepare data for updating employee (pegawai) details
            $data = [
                'telepon' => $request->telepon,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat
            ];

            // If there is a new photo, upload it
            if ($request->hasFile('foto')) {
                // Set the photo file name and store it
                $foto = $request->name . '.' . $request->file('foto')->getClientOriginalExtension();
                $folderPath = "public/fotos/";
                $request->file('foto')->storeAs($folderPath, $foto);

                // Add the photo path to the data array
                $data['foto'] = $foto;
            }

            // Update the employee (pegawai) data
            $pegawai->update($data);

            return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('pegawai.edit', $id)->with('danger', 'Data pegawai gagal diperbarui: ' . $e->getMessage());
        }
    }


    public function destroy(pegawai $pegawai)
    {
        $pegawai->user->delete();
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
