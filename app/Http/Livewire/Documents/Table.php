<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $title = '';

    protected $queryString = [
        'title' => [
            'except' => '',
        ],
    ];

    public function render()
    {
        return view('livewire.documents.table', [
            'documents' => Document::query()
                ->when(strlen($this->title) >= 3, fn ($q) => $q->titleLike($this->title))
                ->latest()
                ->paginate(12),
        ]);
    }

    public function updatedTitle($value)
    {
        if (empty($value)) {
            $this->resetPage();
        }
    }
}
