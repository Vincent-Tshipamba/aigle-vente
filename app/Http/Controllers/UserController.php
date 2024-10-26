<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->with(['roles'])->get();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function updateUserRole(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');
        $assign = $request->input('assign');
        $user = User::find($userId);
      
        if ($assign === "true") {
            $user->roles()->attach($roleId);
        } else {
            $user->roles()->detach($roleId);
        }

        return response()->json(['message' => 'User role updated successfully']);
    }

    public function deleteUserRole(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');

        $user = User::find($userId);
        $user->roles()->detach($roleId);

        return response()->json(['message' => 'User  role deleted successfully']);
    }

    public function sendMail($username, $email, $password)
    {
        // Créer une instance de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurer le serveur SMTP
            $mail->isSMTP(); // Utiliser SMTP
            $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de Gmail
            $mail->SMTPAuth = true; // Activer l'authentification SMTP
            $mail->Username = 'tshipambalubobo80@gmail.com'; // Votre adresse Gmail
            $mail->Password = "xtry kfmv wqyp wgwt"; // Mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Sécurisé par STARTTLS
            $mail->Port = 587; // Port TLS

            // Destinataires
            $mail->setFrom('tshipambalubobo80@gmail.com', 'Vincent Tshipamba');
            $mail->addAddress($email); // Adresse du destinataire
            // Contenu
            $mail->isHTML(true); // Format d'email HTML
            $mail->Subject = 'Bienvenue en tant qu\'utilisateur sur le Sogebox Dashboard !';
            $mail->Body = '
            <section style="max-width: 32rem; padding: 2rem 1.5rem; margin: auto; background-color: #ffffff; color: #333;">
                <header>
                    <a href="#">
                        SOGEREF
                    </a>
                </header>

                <main style="margin-top: 1rem;">
                    <h2 style="margin-top: 1rem; color: #4a5568;">Bonjour ' . $username . '🤗</h2>

                    <p style="margin-top: 0.5rem; text-align: justify; line-height: 1.75; color: #4a5568; ">
                        Félicitations ! Vous êtes maintenant un administrateur sur notre plateforme d\'administration. Vous pouvez vous connecter à votre compte en utilisant les informations suivantes :
                    </p>

                    <p style="margin-top: 0.5rem; line-height: 1.75; color: #4a5568;">
                        <span style="font-weight: 700;">Nom d\'utilisateur : </span> ' . $username . '<br>
                        <span style="font-weight: 700;">Mot de passe : </span> ' . $password . '<br>
                        <span style="font-weight: 700;">URL de connexion : </span> <a href="http://127.0.0.1:8000/login" style="text-decoration: underline; color: #3182ce;">Se connecter</a>
                    </p>

                    <p style="margin-top: 0.5rem; text-align: justify; line-height: 1.75; color: #4a5568; ">
                        Surtout, n\'hésitez pas à nous contacter en cas de difficultés de connexion 😊
                    </p>

                    <p style="margin-top: 1rem; color: #4a5568;">
                        Merci, <br>
                        L\'équipe Sogeref
                    </p>
                </main>

                <footer style="margin-top: 2rem; text-align: center;">
                    <p style="margin-top: 1.5rem; color: #6b7280">
                        Ce courriel a été envoyé à <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">' . $email . '</a>.
                        Si vous préférez ne pas recevoir ce type d\'e-mail, vous pouvez <a href="#" style="color: #1c64f2; ">gérer vos préférences en matière d\'e-mail.</a>.
                    </p>
                    <p style="margin-top: 0.75rem; color: #6b7280">© ' . date('Y') . ' Sogeref. Tous les droits sont réservés.</p>
                </footer>
            </section>
            ';

            // Envoyer l'email
            $mail->send();
        } catch (Exception $e) {
            return response()->json(['error', $mail->ErrorInfo]);
        }
    }

    public function genererPassword($length = 12)
    {
        // Assurez-vous que la longueur minimale est respectée
        if ($length < 8) {
            $length = 8;
        }

        // Définir les ensembles de caractères
        $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
        $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digitChars = '0123456789';
        $specialChars = '!@#$%^&*';

        // Assurer qu'on inclut au moins un caractère de chaque ensemble
        $password = [
            $lowercaseChars[random_int(0, strlen($lowercaseChars) - 1)],
            $uppercaseChars[random_int(0, strlen($uppercaseChars) - 1)],
            $digitChars[random_int(0, strlen($digitChars) - 1)],
            $specialChars[random_int(0, strlen($specialChars) - 1)],
        ];

        // Compléter le mot de passe avec des caractères aléatoires
        $allChars = $lowercaseChars . $uppercaseChars . $digitChars . $specialChars;
        for ($i = 4; $i < $length; $i++) {
            $password[] = $allChars[random_int(0, strlen($allChars) - 1)];
        }

        // Mélanger les caractères pour éviter un ordre prévisible
        shuffle($password);

        // Convertir le tableau en chaîne de caractères
        return implode('', $password);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8'
            ],
            [
                'name.required' => 'Veuillez saisir un nom d\'utilisateur.',
                'email.required.email' => 'Veuillez saisir une adresse mail valide.',
                'email.unique' => 'Cette adresse mail a deja ete prise.',
            ]
        );

        try {
            // Créer l'utilisateur
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            if ($request->input('mail')) {
                try {
                    $this->sendMail($validatedData['name'], $validatedData['email'], $validatedData['password']);
                    return back()->with('success', 'L\'utilisateur a été créé avec succès ! Un email a été envoyé à ' . $validatedData['name'] . ' avec les détails du compte.');
                } catch (\Throwable $th) {
                    return back()->with('error', $th->getMessage());
                }
            }
            // Retourner une réponse de succès
            return back()->with('success', 'Utilisateur créé avec succès et rôle attribué.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur s\'est produite lors de la création de l\'utilisateur: ' . $th->getMessage());
        }
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,id',
        ]);

        try {
            // Détache tous les rôles existants
            $user->roles()->detach();

            // Attribue le nouveau rôle
            $user->roles()->attach($request->role);

            return back()->with('success', 'Le rôle de l\'utilisateur a été mis à jour avec succès !');
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur s\'est produite lors de la mise à jour du rôle de l\'utilisateur : ' . $th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->with('success', 'L\'utilisateur a été rétiré avec succès ! ');
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur s\'est produite lors de la suppression de l\'utilisateur');
        }
    }

    public function destroyUser(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting user: ' . $e->getMessage()], 500);
        }
    }
}