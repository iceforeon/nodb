<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\HTMLToMarkdown\HtmlConverter;
use Livewire\Component;

class Form extends Component
{
    public $hashid;

    public Document $document;

    protected function rules()
    {
        return [
            'document.title' => ['required', 'string', 'max:100'],
            'document.slug' => ['nullable', 'string'],
            'document.content' => ['nullable', 'string'],
        ];
    }

    public function mount()
    {
        $this->document = $this->hashid
            ? Document::findOr($this->hashid, fn () => abort(404))
            : (new Document);

        $this->document->content = $this->document->content
            ? $this->markdownToHtml($this->document->content)
            : null;
    }

    public function render()
    {
        return view('livewire.documents.form');
    }

    public function save()
    {
        $this->validate();

        Document::updateOrCreate([
            'hashid' => $this->document->hashid,
        ], [
            'title' => $this->document->title,
            'slug' => $this->document->slug,
            'content' => $this->document->content
                ? $this->htmlToMarkdown($this->document->content)
                : null,
        ]);

        $this->redirectRoute('documents.index');
    }

    public function htmlToMarkdown($content)
    {
        return (new HtmlConverter(['header_style' => 'atx']))
            ->convert($content);
    }

    public function markdownToHtml($content)
    {
        return (new GithubFlavoredMarkdownConverter())
            ->convert($content)
            ->getContent();
    }

    public function delete()
    {
        Document::findOr($this->hashid, fn () => abort(404))
            ->delete();

        $this->redirectRoute('documents.index');
    }

    public function resetSlug()
    {
        $this->document->slug = null;
    }
}
