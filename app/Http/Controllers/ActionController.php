<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;

class ActionController extends Controller
{
    public function visitProfile($userId)
    {
        Action::create([
            'user_id' => $userId,
            'action_type' => 'visit_profile',
            'performed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Profil visité enregistré.');
    }

    public function makeCall($userId)
    {
        Action::create([
            'user_id' => $userId,
            'action_type' => 'make_call',
            'performed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Appel enregistré.');
    }
}
