<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Avis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ID de l'utilisateur connecté

        // Dates de référence
        $now = new \DateTime(); // Date et heure actuelles
        $startOfMonth = new \DateTime('first day of this month 00:00:00');
        $startOfYear = new \DateTime('first day of January this year 00:00:00');

        // Nombre de visites
        $visitesMensuel = Action::where('user_id', $userId)
            ->where('action_type', 'visit_profile')
            ->where('action_time', '>=', $startOfMonth->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();
        
        $visitesAnnuel = Action::where('user_id', $userId)
            ->where('action_type', 'visit_profile')
            ->where('action_time', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();

        // Nombre d'appels
        $appelsMensuel = Action::where('user_id', $userId)
            ->where('action_type', 'make_call')
            ->where('action_time', '>=', $startOfMonth->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();
        
        $appelsAnnuel = Action::where('user_id', $userId)
            ->where('action_type', 'make_call')
            ->where('action_time', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();

        // Nombre d'avis
        $avisMensuel = Avis::where('user_id', $userId)
            ->where('created_at', '>=', $startOfMonth->format('Y-m-d H:i:s'))
            ->where('created_at', '<=', $now->format('Y-m-d H:i:s'))
            ->count();
        
        $avisAnnuel = Avis::where('user_id', $userId)
            ->where('created_at', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('created_at', '<=', $now->format('Y-m-d H:i:s'))
            ->count();

        // Visites par mois pour Chart.js
        $visitesParMois = Action::where('user_id', $userId)
            ->where('action_type', 'visit_profile')
            ->where('action_time', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->get()
            ->groupBy(function ($action) {
                return (new \DateTime($action->action_time))->format('Y-m'); // "2024-09"
            })
            ->map->count();

        // Préparation des données pour Chart.js
        $labels = $visitesParMois->keys()->toArray();
        $data = $visitesParMois->values()->toArray();

      
        return view('dashboard.client', compact(
            'visitesMensuel', 'visitesAnnuel',
            'appelsMensuel', 'appelsAnnuel',
            'avisMensuel', 'avisAnnuel',
            'labels', 'data'
        ));
    }

    public function admin()
    {
      

        // Dates de référence
        $now = new \DateTime(); // Date et heure actuelles
        $startOfMonth = new \DateTime('first day of this month 00:00:00');
        $startOfYear = new \DateTime('first day of January this year 00:00:00');

        // Nombre de visites
        $visitesMensuel = Action::where('action_type', 'visit_profile')
            ->where('action_time', '>=', $startOfMonth->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();
        
        $visitesAnnuel = Action::where('action_type', 'visit_profile')
            ->where('action_time', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();

        // Nombre d'appels
        $appelsMensuel = Action::where('action_type', 'make_call')
            ->where('action_time', '>=', $startOfMonth->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();
        
        $appelsAnnuel = Action::where('action_type', 'make_call')
            ->where('action_time', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->count();

        // Nombre d'avis
        $avisMensuel = Avis::where('created_at', '>=', $startOfMonth->format('Y-m-d H:i:s'))
            ->where('created_at', '<=', $now->format('Y-m-d H:i:s'))
            ->count();
        
        $avisAnnuel = Avis::where('created_at', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('created_at', '<=', $now->format('Y-m-d H:i:s'))
            ->count();

        // Visites par mois pour Chart.js
        $visitesParMois = Action::where('action_type', 'visit_profile')
            ->where('action_time', '>=', $startOfYear->format('Y-m-d H:i:s'))
            ->where('action_time', '<=', $now->format('Y-m-d H:i:s'))
            ->get()
            ->groupBy(function ($action) {
                return (new \DateTime($action->action_time))->format('Y-m'); // "2024-09"
            })
            ->map->count();

        // Préparation des données pour Chart.js
        $labels = $visitesParMois->keys()->toArray();
        $data = $visitesParMois->values()->toArray();

      
        return view('dashboard.client', compact(
            'visitesMensuel', 'visitesAnnuel',
            'appelsMensuel', 'appelsAnnuel',
            'avisMensuel', 'avisAnnuel',
            'labels', 'data'
        ));
    }
}
