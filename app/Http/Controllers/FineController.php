<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FineController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $search = $request->get('search', '');

        $fines = Cache::tags(['fines'])->remember("fines_index_page_{$page}_search_{$search}", 600, function () use ($request) {
            $query = Fine::with(['borrowing.member', 'borrowing.book']);

            if ($request->has('search')) {
                $search = $request->search;
                $query->whereHas('borrowing', function ($q) use ($search) {
                    $q->whereHas('member', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })->orWhereHas('book', function ($q) use ($search) {
                        $q->where('title', 'like', "%{$search}%");
                    });
                });
            }

            return $query->latest()->paginate(10);
        });

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

        Cache::tags(['fines'])->flush();

        return redirect()->route('fines.index')->with('success', 'Data denda berhasil diperbarui!');
    }

    public function destroy(Fine $fine)
    {
        $fine->delete();
        Cache::tags(['fines'])->flush();
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
        
        Cache::tags(['fines'])->flush();
        
        return back()->with('success', 'Pembayaran denda berhasil dicatat!');
    }
}
