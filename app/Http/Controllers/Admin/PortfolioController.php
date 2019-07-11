<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPortfolioRequest;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Portfolio;

class PortfolioController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('portfolio_access'), 403);

        $portfolios = Portfolio::all();

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('portfolio_create'), 403);

        return view('admin.portfolios.create');
    }

    public function store(StorePortfolioRequest $request)
    {
        abort_unless(\Gate::allows('portfolio_create'), 403);

        $portfolio = Portfolio::create($request->all());

        if ($request->input('image', false)) {
            $portfolio->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return redirect()->route('admin.portfolios.index');
    }

    public function edit(Portfolio $portfolio)
    {
        abort_unless(\Gate::allows('portfolio_edit'), 403);

        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        abort_unless(\Gate::allows('portfolio_edit'), 403);

        $portfolio->update($request->all());

        if ($request->input('image', false)) {
            if (!$portfolio->image || $request->input('image') !== $portfolio->image->file_name) {
                $portfolio->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($portfolio->image) {
            $portfolio->image->delete();
        }

        return redirect()->route('admin.portfolios.index');
    }

    public function show(Portfolio $portfolio)
    {
        abort_unless(\Gate::allows('portfolio_show'), 403);

        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function destroy(Portfolio $portfolio)
    {
        abort_unless(\Gate::allows('portfolio_delete'), 403);

        $portfolio->delete();

        return back();
    }

    public function massDestroy(MassDestroyPortfolioRequest $request)
    {
        Portfolio::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
