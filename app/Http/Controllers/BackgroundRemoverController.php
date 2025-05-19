<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BackgroundRemoverController extends Controller
{
    public function index()
    {
        return view('background-remover.index');
    }

    public function removeBackground(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $imagePath = public_path('uploads/' . $imageName);

        // Gunakan API Remove.bg untuk menghapus background
        // Anda perlu mendaftar di remove.bg untuk mendapatkan API key
        $apiKey = env('REMOVE_BG_API_KEY', '');
        
        try {
            // Gunakan metode attach() untuk mengirim file dan nonaktifkan verifikasi SSL
            $response = Http::withHeaders([
                'X-Api-Key' => $apiKey,
            ])->withOptions([
                'verify' => false, // Nonaktifkan verifikasi SSL
            ])->attach(
                'image_file', 
                file_get_contents($imagePath), 
                $imageName
            )->post('https://api.remove.bg/v1.0/removebg', [
                'size' => 'auto',
                'format' => 'png',
            ]);

            if ($response->successful()) {
                $resultName = 'no-bg-' . $imageName;
                file_put_contents(public_path('results/' . $resultName), $response->body());
                
                return view('background-remover.result', [
                    'originalImage' => 'uploads/' . $imageName,
                    'resultImage' => 'results/' . $resultName,
                    'downloadUrl' => asset('results/' . $resultName)
                ]);
            } else {
                return back()->with('error', 'Gagal menghapus background: ' . $response->body());
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}