<div>
  <pre class="mb-5">{{ $errors }}</pre>
  <form wire:submit.prevent="save" class="divide-y divide-gray-200">
    <div class="space-y-4">
      <div class="sm:grid grid-cols-2 gap-4">
        <div>
          <label for="title" class="text-sm font-semibold leading-6 text-gray-900">Title</label>
          <input wire:model.lazy="document.title" type="text" name="title" id="title" maxlength="100" class="shadow-sm focus:ring-slate-500 focus:border-slate-500 block w-full sm:text-sm border-gray-300 rounded-sm mt-2" maxlength="100">
        </div>

        <div class="mt-4 sm:mt-0">
          <div @class(['flex items-center', 'justify-between' => $hashid])>
            <label for="slug" class="text-sm font-semibold leading-6 text-gray-900">Slug</label>
            @if ($hashid)
            <button  wire:click="resetSlug" type="button" class="text-sm font-medium text-gray-700 underline">
              Clear Slug
            </button>
            @endif
          </div>
          <input wire:model.lazy="document.slug" type="text" name="slug" id="slug" maxlength="100" class="shadow-sm focus:ring-slate-500 focus:border-slate-500 block w-full sm:text-sm border-gray-300 rounded-sm mt-2" tabindex="-1">
        </div>
      </div>

      <div wire:ignore class="">
        <label for="content" class="text-sm font-semibold leading-6 text-gray-900">Content</label>
        <div x-title="editor" x-data="editor($wire.entangle('document.content').defer)" class="prose prose-slate lg:prose-lg mt-2">
          <div class="flex flex-wrap p-2 border mb-2 rounded-sm">
            <div class="w-7 h-7">
              <button type="button" @click="heading(2)" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('heading',{ level: 2 }, updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <line x1="40" y1="56" x2="40" y2="176" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="144" y1="116" x2="40" y2="116" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="144" y1="56" x2="144" y2="176" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <path d="M193.9,118.7A24,24,0,0,1,240,128a23.6,23.6,0,0,1-4.1,13.4h0L192,200h48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="heading(3)" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('heading',{ level: 3 }, updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <line x1="40" y1="56" x2="40" y2="176" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="144" y1="116" x2="40" y2="116" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="144" y1="56" x2="144" y2="176" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <path d="M192,108h48l-28,40a28,28,0,1,1-19.8,47.8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="bold()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('bold', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <path d="M64,120h88a40,40,0,0,1,0,80H64V48h76a36,36,0,0,1,0,72" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="italic()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <line x1="152" y1="56" x2="104" y2="200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="64" y1="200" x2="144" y2="200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="112" y1="56" x2="192" y2="56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="bulletList()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('bulletList', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <line x1="88" y1="64" x2="216" y2="64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="88" y1="128" x2="216" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="88" y1="192" x2="216" y2="192" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <circle cx="44" cy="128" r="16" fill="currentColor"></circle>
                  <circle cx="44" cy="64" r="16" fill="currentColor"></circle>
                  <circle cx="44" cy="192" r="16" fill="currentColor"></circle>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="orderedList()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('orderedList', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <line x1="108" y1="128" x2="216" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="108" y1="64" x2="216" y2="64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <line x1="108" y1="192" x2="216" y2="192" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <polyline points="40 60 56 52 56 108" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                  <path d="M41.1,152.6a14,14,0,1,1,24.5,13.2L40,200H68" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="link()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('link', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <path d="M132.5,61.3l9.6-9.7a44.1,44.1,0,0,1,62.3,62.3l-30.3,30.2a43.9,43.9,0,0,1-62.2,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                  <path d="M123.5,194.7l-9.6,9.7a44.1,44.1,0,0,1-62.3-62.3l30.3-30.2a43.9,43.9,0,0,1,62.2,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="image()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('image', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <rect x="32" y="48" width="192" height="160" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></rect>
                  <path d="M32,168l50.3-50.3a8,8,0,0,1,11.4,0l44.6,44.6a8,8,0,0,0,11.4,0l20.6-20.6a8,8,0,0,1,11.4,0L224,184" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                  <circle cx="156" cy="100" r="16" fill="currentColor"></circle>
                </svg>
              </button>
            </div>

            {{-- <div class="w-7 h-7">
              <button type="button" @click="codeBlock()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('codeBlock', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <polyline points="64 88 16 128 64 168" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                  <polyline points="192 88 240 128 192 168" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                  <line x1="160" y1="40" x2="96" y2="216" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                </svg>
              </button>
            </div> --}}

            {{-- <div class="w-7 h-7">
              <button type="button" @click="inlineCode()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('code', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <polyline points="80 96 120 128 80 160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                  <line x1="144" y1="160" x2="176" y2="160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <rect x="32" y="48" width="192" height="160" rx="8.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></rect>
                </svg>
              </button>
            </div> --}}

            {{-- <div class="w-7 h-7">
              <button type="button" @click="blockquote()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('blockquote', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <path d="M108,144H40a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8h60a8,8,0,0,1,8,8v88a40,40,0,0,1-40,40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                  <path d="M224,144H156a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8h60a8,8,0,0,1,8,8v88a40,40,0,0,1-40,40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div> --}}

            {{-- <div class="w-7 h-7">
              <button type="button" @click="attachment()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15" :class="{ 'bg-gray-200' : isActive('attachment', updatedAt) }">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <path d="M96,176l95.8-92.2a28,28,0,0,0-39.6-39.6L54.1,142.1a47.9,47.9,0,0,0,67.8,67.8L204,128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div> --}}

            {{-- <div class="w-7 h-7">
              <button type="button" @click="clearFormatting()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <line x1="91.5" y1="99.5" x2="159.4" y2="167.4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                  <path d="M216,215.8H72.1L35,178.7a15.9,15.9,0,0,1,0-22.6L148.1,43a15.9,15.9,0,0,1,22.6,0L216,88.2a16.2,16.2,0,0,1,0,22.7L111,215.8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div> --}}

            <div class="w-7 h-7">
              <button type="button" @click="undo()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <polyline points="79.8 99.7 31.8 99.7 31.8 51.7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                  <path d="M65.8,190.2a88,88,0,1,0,0-124.4l-34,33.9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div>

            <div class="w-7 h-7">
              <button type="button" @click="redo()" tabindex="-1" class="p-1.5 text-sm hover:bg-gray-200 ease-in-out duration-15">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-4 h-4 text-gray-500">
                  <rect width="256" height="256" fill="none"></rect>
                  <polyline points="176.2 99.7 224.2 99.7 224.2 51.7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                  <path d="M190.2,190.2a88,88,0,1,1,0-124.4l34,33.9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                </svg>
              </button>
            </div>
          </div>

          <div x-ref="element" class="shadow-sm"></div>
        </div>
      </div>
    </div>

    <div @class([
        'flex items-center mt-4 pt-4' , 'justify-end'=> ! $hashid,
        'justify-between' => $hashid
      ])>
      @if ($hashid)
      <button wire:click="delete" type="button" class="underline text-sm text-red-600 hover:text-red-700">
        Delete Document
      </button>
      @endif

      <x-button>
        Save
      </x-button>
    </div>
  </form>
</div>
