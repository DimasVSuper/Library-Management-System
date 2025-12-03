<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(10);
        return view('admin.user.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive,suspended',
            'notes' => 'nullable|string',
        ]);

        $validated['join_date'] = now();
        Member::create($validated);

        return redirect()->route('user.index')->with('success', 'Member berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $user)
    {
        return view('admin.user.show', ['member' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $user)
    {
        return view('admin.user.edit', ['member' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive,suspended',
            'notes' => 'nullable|string',
        ]);

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'Member berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Member berhasil dihapus!');
    }
}
