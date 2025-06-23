<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $portfolios = Portfolio::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Admin/Portfolios/Index', [
            'portfolios' => $portfolios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Portfolios/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('portfolio', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portafolio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio): Response
    {
        return Inertia::render('Admin/Portfolios/Show', [
            'portfolio' => $portfolio,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio): Response
    {
        return Inertia::render('Admin/Portfolios/Edit', [
            'portfolio' => $portfolio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($portfolio->image) {
                Storage::disk('public')->delete('portfolio/' . $portfolio->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('portfolio', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portafolio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete image if exists
        if ($portfolio->image) {
            Storage::disk('public')->delete('portfolio/' . $portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portafolio eliminado exitosamente.');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(Portfolio $portfolio)
    {
        $portfolio->update(['is_active' => !$portfolio->is_active]);

        return back()->with('success', 'Estado del portafolio actualizado.');
    }
} 