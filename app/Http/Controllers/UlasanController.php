<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedUlasan;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = $this->fetchUlasanFromGoogle();
        $selectedUlasan = SelectedUlasan::pluck('id_ulasan');

        return view('ulasan.ulasan', [
            'ulasan' => $ulasan,
            'selectedUlasan' => $selectedUlasan
        ]);
    }

    public function select(Request $request)
    {
        $request->validate([
            'selected_ulasan' => 'nullable|array',
            'selected_ulasan.*' => 'string'
        ]);

        $selectedIds = $request->input('selected_ulasan', []);

        // Fetch all reviews again
        $allReviews = $this->fetchUlasanFromGoogle();

        // Filter reviews by selected IDs
        $selectedReviews = $allReviews->filter(function ($review) use ($selectedIds) {
            return in_array($review->time, $selectedIds);
        });

        // Clear previous selections
        SelectedUlasan::truncate();

        // Insert full review data for each selected review
        foreach ($selectedReviews as $review) {
            SelectedUlasan::create([
                'id_ulasan' => $review->time,
                'rating' => $review->rating,
                'text' => $review->text,
                'author_name' => $review->author_name,
                'id_displayed' => 1,
            ]);
        }

    return redirect()->back()->with('success', 'Pilihan disimpan!');
    }

    private function fetchUlasanFromGoogle()
    {
        $response = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJ-4NA1pSdeC4R5ik3KRItaq8&key=AIzaSyBGr_Mzjw025m1jTs-YnbWMXVNeQ1WgCjw');
        $data = json_decode($response);

        return collect($data->result->reviews)->map(function($item) {
            $item->id = $item->time; // Gunakan timestamp sebagai ID
            return $item;
        });
    }
}
