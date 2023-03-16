<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateRequest;
use App\Services\TodoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Toast;

class TodoController extends Controller
{
    private $service;

    public function __construct(TodoService $todoService)
    {
        $this->service = $todoService;
    }

    public function index(): View
    {
        return view('list.index', [
            'lists' => $this->service->index(),
        ]);
    }

    public function store(CreateOrUpdateRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        Toast::title('List berhasil Ditambahkan')->autoDismiss(5);

        return redirect()->route('home');
    }

    public function edit($id): View
    {
        return view('list.edit', [
            'data' => $this->service->edit($id),
        ]);
    }

    public function update(CreateOrUpdateRequest $request): RedirectResponse
    {
        $this->service->update([
            'id' => $request->id,
            'name' => $request->input('name'),
        ]);

        Toast::title('List berhasil Diubah')->autoDismiss(5);

        return redirect()->route('home');
    }

    public function search(Request $request): View
    {
        return view(
            'list.index',
            [
                'lists' => $this->service->search(
                    [
                        'cari' => $request->cari,
                    ]
                ),
            ]
        );
    }

    public function delete(Request $request): RedirectResponse
    {
        $this->service->delete([
            'id' => $request->id,
        ]);

        Toast::title('List berhasil Dihapus')->autoDismiss(5);

        return redirect()->route('home');
    }
}
