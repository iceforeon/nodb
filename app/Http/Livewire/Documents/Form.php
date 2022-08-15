<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use Illuminate\Validation\Rule;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\HTMLToMarkdown\HtmlConverter;
use Livewire\Component;

class Form extends Component
{
    public $slug;

    public Document $document;

    protected function rules()
    {
        return [
            'document.title' => [
                'required', 'string', 'max:255',
            ],
            'document.slug' => [
                'required', 'string', Rule::unique('documents')->ignore($this->document),
            ],
            'document.content' => [
                'nullable', 'string',
            ],
        ];
    }

    public function mount()
    {
        $this->document = $this->slug
            ? Document::findOr($this->slug, fn () => abort(404))
            : (new Document);

        $this->document->content = $this->document->content
            ? $this->contentMarkdownToHtml()
            : null;
    }

    public function render()
    {
        return view('livewire.documents.form');
    }

    public function save()
    {
        Document::updateOrCreate([
            'slug' => $this->document->slug,
        ], [
            'title' => $this->document->title,
            'content' => $this->contentHtmlToMarkdown(),
        ]);

        $this->redirectRoute('documents.index');
    }

    public function contentHtmlToMarkdown()
    {
        return (new HtmlConverter(['header_style' => 'atx']))
            ->convert($this->document->content);
    }

    public function contentMarkdownToHtml()
    {
        return (new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]))
            ->convert($this->document->content)
            ->getContent();
    }

    public function delete()
    {
        if ($document = Document::findOr($this->slug, fn () => abort(404))) {
            $document->delete();
        }

        $this->redirectRoute('documents.index');
    }

    public function updatedDocumentTitle($value)
    {
        $this->document->slug = str($value)->slug()->toString();
    }
}
