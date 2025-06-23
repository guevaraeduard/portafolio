<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Inertia\Inertia;
use Inertia\Response;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio page with active projects
     */
    public function index(): Response
    {
        $portfolios = Portfolio::active()
            ->ordered()
            ->get();

        return Inertia::render('Portafolio', [
            'portfolios' => $portfolios,
        ]);
    }
} 