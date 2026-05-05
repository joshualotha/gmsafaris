<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        if ($request->filled('filter')) {
            if ($request->filter === 'unread') {
                $query->unread();
            } elseif ($request->filter === 'read') {
                $query->where('is_read', true);
            }
        }

        $messages = $query->recent()->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        if (!$contactMessage->is_read) {
            $contactMessage->markAsRead();
        }

        return view('admin.messages.show', compact('contactMessage'));
    }

    public function updateNotes(Request $request, ContactMessage $contactMessage)
    {
        $validated = $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $contactMessage->update($validated);

        return back()->with('success', 'Notes updated successfully.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
