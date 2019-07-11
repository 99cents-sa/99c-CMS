<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Portfolio;

class PortfolioApiController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();

        return $portfolios;
    }

    public function store(StorePortfolioRequest $request)
    {
        return Portfolio::create($request->all());
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        return $portfolio->update($request->all());
    }

    public function show(Portfolio $portfolio)
    {
        return $portfolio;
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return response("OK", 200);
    }
}
