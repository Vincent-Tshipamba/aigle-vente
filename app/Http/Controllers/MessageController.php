<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\User;
use App\Models\Seller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of conversations for the authenticated user.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $userId = Auth::id();

        // Récupérer les conversations où l'utilisateur connecté est l'expéditeur ou le destinataire
        $messages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver']) // Charger les relations avec les utilisateurs
            ->orderBy('created_at', 'asc') // Trier par date de création
            ->get();

        // Obtenir la liste des contacts uniques avec qui l'utilisateur a une conversation
        $contacts = User::whereIn('id', $messages->pluck('sender_id')->merge($messages->pluck('receiver_id'))->unique())
            ->where('id', '!=', $userId)
            ->get();

        return view('seller.messages.index', compact('messages', 'contacts', 'userId'));
    }

    /**
     * Display the conversation between the authenticated user and another user.
     */
    public function showConversation($contactId)
    {
        $userId = Auth::id();

        $messages = Message::where(function ($query) use ($userId, $contactId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $contactId);
        })
            ->orWhere(function ($query) use ($userId, $contactId) {
                $query->where('sender_id', $contactId)
                    ->where('receiver_id', $userId);
            })
            ->with(['sender', 'receiver', 'product.photos'])
            ->orderBy('created_at', 'asc')
            ->get();

        $contact = User::findOrFail($contactId);

        return response()->json([
            'messages' => $messages,
            'contact' => $contact,
        ]);
    }



    public function store(Request $request, $seller_id)
    {
        
        try {
            Log::info('ID du vendeur reçu : ' . $seller_id);
            $seller = User::find($seller_id);
            if (!$seller) {
                return response()->json(['error' => 'Le vendeur sélectionné est invalide.'], 400);
            }

            // Create the message
            $data = Message::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $seller_id,
                'message' => $request->input('message'),
                'is_read' => false,
                'product_id' => $request->product_id,
            ]);

            
            $data->load('sender'); 

            // Broadcast the event
            broadcast(new MessageSent($data))->toOthers();

            // Return response including the sender details
            return response()->json([
                'status' => 'Message sent!',
                'message' => $data->message,
                'sender' => [
                    'id' => $data->sender->id,
                    'profile_picture_url' => $data->sender->profile_picture_url ?? 'https://placehold.co/200x200'

                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur dans sendToSeller: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi du message.',
                'error_details' => $e->getMessage() // Ajoutez ici les détails de l'erreur
            ], 500);        }
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

    public function sendMessage(Request $request, $user_id)
    {
        try {
            Log::info('ID du vendeur reçu : ' . $user_id);
          

            $seller = User::find($user_id);
            if (!$seller) {
                return response()->json(['error' => 'Le vendeur sélectionné est invalide.'], 400);
            }

            $data = Message::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $user_id,
                'message' => $request->input('message'),
                'is_read' => false,
                'product_id' => $request->product_id,
            ]);

            broadcast(new MessageSent($data))->toOthers();

            return response()->json(['success' => true, 'message' => 'Votre message a été envoyé.']);
        } catch (\Exception $e) {
            Log::error('Erreur dans sendTomessage: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Erreur lors de l\'envoi du message.'], 500);
        }
    }

}
