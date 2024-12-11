<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class NameController extends Controller
{
    public function index()
    {
        $names = Name::all();
        return view('index', compact('names'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->input('name');
        $message = "Bienvenue Cher " .$name;
        $qrCodePath = 'qrcodes/' . uniqid() . '.svg';

        // Génération du QR code
        QrCode::size(200)->generate($message, public_path($qrCodePath));

        // Enregistrement dans la base de données
        Name::create([
            'name' => $name,
            'qr_code_path' => $qrCodePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Nom et QR code générés avec succès.');
    }
}
