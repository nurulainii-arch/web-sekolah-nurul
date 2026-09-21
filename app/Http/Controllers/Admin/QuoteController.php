<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function edit()
    {
        $quote = Quote::first();
        return view('admin.quote.edit', compact('quote'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'isi'   => 'required|string',
            'tokoh' => 'required|string|max:255',
        ]);

        $quote = Quote::first();

        if ($quote) {
            $quote->update($request->only('isi', 'tokoh'));
        } else {
            Quote::create($request->only('isi', 'tokoh'));
        }

        return redirect()->route('admin.quote.edit')->with('success', 'Quote berhasil diperbarui!');
    }
}