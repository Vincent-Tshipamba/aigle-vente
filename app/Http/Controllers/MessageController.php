<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of conversations for the authenticated user.
     */
    public function index()
    {
        $conversations = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->with(['sender', 'receiver'])
            ->latest()
            ->get()
            ->unique(function ($message) {
                return $message->sender_id < $message->receiver_id
                    ? $message->sender_id . '-' . $message->receiver_id
                    : $message->receiver_id . '-' . $message->sender_id;
            });

        // Check if there are any conversations to display the first user
        $user = null;
        if ($conversations->isNotEmpty()) {
            $user = $conversations->first()->receiver; // Get the first receiver
        }

        // Pass an empty collection to `$messages`
        $messages = collect();

        return view('seller.messages.index', compact('conversations', 'messages', 'user'));
    }




    /**
     * Display the conversation between the authenticated user and another user.
     */
    public function show(User $user)
    {
        // Check if the user exists and is authenticated
        if (!$user || ($user->id !== Auth::id() && !Message::where('receiver_id', $user->id)->where('sender_id', Auth::id())->exists())) {
            return redirect()->route('seller.shop.message.index')->with('error', 'User not found or no messages available.');
        }

        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)->where('receiver_id', Auth::id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

        return view('seller.messages.show', compact('messages', 'user'));
    }


    /**
     * Store a newly created message in storage.
     */
    /**
     * Store a newly created message in storage.
     */
    public function store(StoreMessageRequest $request, User $user)
    {
        // Create the message
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'message' => $request->input('message'),
            'is_read' => false,
        ]);

        // You can also fetch the user data if you want to return it
        $message->load('sender'); // Assuming you have a relationship defined

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
            'data' => $message, // Include the message data in the response
        ]);
    }


    /**
     * Mark a message as read.
     */
    public function markAsRead(Message $message)
    {
        // Ensure the authenticated user is the receiver
        if ($message->receiver_id === Auth::id()) {
            $message->markAsRead();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy(Message $message)
    {
        // Ensure only the sender or receiver can delete the message
        if ($message->sender_id === Auth::id() || $message->receiver_id === Auth::id()) {
            $message->delete();
        }

        return redirect()->back()->with('success', 'Message deleted successfully!');
    }
}
