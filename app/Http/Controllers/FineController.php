<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index()
    {
        $fines = Fine::with(['borrowing.member', 'borrowing.book'])->latest()->paginate(10);
        return view('admin.fines.index', compact('fines'));
    }

    public function show(Fine $fine)
    {
        $fine->load(['borrowing.member', 'borrowing.book']);
        return view('admin.fines.show', compact('fine'));
    }

    public function edit(Fine $fine)
    {
        return view('admin.fines.edit', compact('fine'));
    }

    public function update(Request $request, Fine $fine)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid',
            'notes' => 'nullable|string',
        ]);

        if ($validated['status'] === 'paid' && $fine->status === 'unpaid') {
            $validated['paid_at'] = now();
        } elseif ($validated['status'] === 'unpaid') {
            $validated['paid_at'] = null;
        }

        $fine->update($validated);

        return redirect()->route('fines.index')->with('success', 'Data denda berhasil diperbarui!');
    }

    public function destroy(Fine $fine)
    {
        $fine->delete();
        return redirect()->route('fines.index')->with('success', 'Data denda berhasil dihapus!');
    }
    
    public function pay(Fine $fine)
    {
        if ($fine->status === 'paid') {
            return back()->with('error', 'Denda sudah dibayar sebelumnya!');
        }
        
        $fine->update([
            'status' => 'paid',
            'paid_at' => now(),
        ]);
        
        return back()->with('success', 'Pembayaran denda berhasil dicatat!');
    }
}
