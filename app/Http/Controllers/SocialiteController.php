<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // Les tableaux des providers autorisés
    protected $providers = ["google", "github", "facebook"];

    # redirection vers le provider
    public function redirect(Request $request)
    {
        $provider = $request->provider;

        // On vérifie si le provider est autorisé
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect(); // On redirige vers le provider
        }
        abort(404); // Si le provider n'est pas autorisé
    }

    // Callback du provider
    public function callback(Request $request)
    {
        try {
            $provider = $request->provider;

            // Validate the provider
            if (!in_array($provider, $this->providers)) {
                return response()->json(['error' => 'Provider non supporté.'], 400);
            }

            $providerUser = Socialite::driver($provider)->user();

            $email = $providerUser->getEmail();
            $name = $providerUser->getName();
            $firstName = $name ? explode(' ', $name)[0] : '';
            $lastName = $name ? (explode(' ', $name)[1] ?? '') : '';

            // Check if the user already exists
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => bcrypt(Str::random(10)) // Generate a random password for OAuth users
                ]
            );

            // Retrieve user location data
            $userLocationData = $this->getUserLocation();

            // Ensure the client is associated with the user
            $client = $this->createOrUpdateClient($user, $providerUser, $userLocationData, $firstName, $lastName);

            // Update profile picture if needed
            if ($providerUser->getAvatar()) {
                $client->update(['picture' => $providerUser->getAvatar()]);
            }

            // Assign "client" role if not already assigned
            $role = Role::firstOrCreate(['name' => 'client']);
            $user->assignRole($role);

            // Log in the user
            Auth::login($user);

            return redirect()->intended(route('home'));
        } catch (\Throwable $e) {
            Log::error('Erreur lors de l’enregistrement d’un utilisateur via ' . ($request->provider ?? 'inconnu') . ' : ' . $e->getMessage());
        }
    }


    private function createOrUpdateClient(User $user, $providerUser, array $userLocationData, string $firstName, string $lastName): Client
    {
        try {
            // Create or update the location
            $location = Location::updateOrCreate(
                [
                    'city' => $userLocationData['city'] ?? null,
                    'country' => $userLocationData['country'] ?? null,
                    'continent' => $userLocationData['continent'] ?? null,
                    'latitude' => $userLocationData['latitude'] ?? null,
                    'longitude' => $userLocationData['longitude'] ?? null,
                ]
            );

            // Create or update the client
            return Client::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'sexe' => $providerUser->user['gender'] ?? '',
                    'location_id' => $location->id,
                    'picture' => $providerUser->getAvatar() ?? null,
                    'phone' => $providerUser->user['phone'] ?? null,
                ]
            );
        } catch (\Throwable $th) {
            Log::error('Une erreur s’est produite lors de l’enregistrement du client ou de la localisation : ' . $th);
            throw $th;
        }
    }

    private function getUserLocation()
    {
        try {
            $apiKey = 'd9b01610dc2b44f89ebf22942a004d66';
            $response = Http::get("https://api.geoapify.com/v1/ipinfo?&apiKey={$apiKey}");

            if ($response->successful()) {
                $data = $response->json();

                return [
                    'city' => $data['city']['name'] ?? null,
                    'country' => $data['country']['name_native'] ?? $data['country']['name'] ?? null,
                    'continent' => $data['continent']['name'] ?? null,
                    'latitude' => $data['location']['latitude'] ?? null,
                    'longitude' => $data['location']['longitude'] ?? null,
                ];
            }
        } catch (\Throwable $e) {
            Log::error('Erreur lors de la récupération de la localisation : ' . $e->getMessage());
        }

        return [
            'city' => null,
            'country' => null,
            'continent' => null,
            'latitude' => null,
            'longitude' => null,
        ];
    }
}
