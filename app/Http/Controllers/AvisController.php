<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use Carbon\Carbon;

class AvisController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all');

        // Définir les dates de filtre
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfThreeMonthsAgo = Carbon::now()->subMonths(3)->startOfMonth();

        // Appliquer les filtres
        $query = Avis::query();

        switch ($filter) {
            case 'today':
                $query->whereDate('created_at', $today);
                break;
            case 'week':
                $query->whereBetween('created_at', [$startOfWeek, $today]);
                break;
            case 'month':
                $query->whereBetween('created_at', [$startOfThreeMonthsAgo, $today]);
                break;
            default:
                // Aucun filtre spécifique, afficher tous les avis
                break;
        }

        $avis = $query->orderBy('created_at', 'desc')->get();

        return view('dashboard.avis.index', compact('avis'));
    }
}
