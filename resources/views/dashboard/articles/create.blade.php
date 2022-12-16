<x-dashboard-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>

    
    <div class="flex">

        <div class="w-2/3 pr-10">

            <div class="flex justify-start buttons-mr mt-4">
                <a href="/dashboard/articles">   
                    <button>
                        <i class="fa-solid fa-arrow-left"></i>
                        Back to articles
                    </button>
                </a>
            </div>
            <h2>Create a new article </h2>
            <x-alerts/>

            <div id="editor" class="!text-black !bg-red-500"></div>
    
            <form action="/dashboard/articles/store" method="POST">
                @csrf
                <input type="hidden" id="inputSlug" name="slug" value="{{old('slug')}}">

                <div class="form-block">
                    <label for="name">Article title</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        placeholder="Article title" 
                        value="{{old('name')}}" 
                        oninput="window.updateSlug(this, 'slug', 'inputSlug')"
                    >
                    <p class="text-slug">Slug: <span id="slug">enter-text</span></p>
                    @error('title')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="form-block">
                    <label for="caption">Caption</label>
                    <input 
                        type="text" 
                        id="caption" 
                        name="caption" 
                        placeholder="Caption" 
                        value="{{old('caption')}}" 
                    >
                    @error('caption')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="form-block">
                    <label for="teaser">Teaser</label>
                    <input 
                        type="text" 
                        id="teaser" 
                        name="teaser" 
                        placeholder="Teaser" 
                        value="{{old('teaser')}}" 
                    >
                    @error('teaser')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                @if(count($categories) > 0)
                    <div class="form-block">
                        <label for="category_id">Category</label>
                        <select name="category_id">
                            <option value="" class="block w-full" disabled selected>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : null}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-error">You must a category for this industry.</p>
                        @enderror
                    </div>
                @endif
                <div class="form-block">
                    <label for="description">Article body</label>
                    <textarea 
                        id="body-ckeditor" 
                        name="body" 
                        rows="4" 
                        placeholder="Main article body"
                    >{{old('body')}}</textarea>
                </div>

                <div class="form-block">
                    <label for="tags">Tags (separated with a comma 'tag one, tag two')</label>
                    <input 
                        type="text" 
                        id="tags" 
                        name="tags" 
                        placeholder="Tags" 
                        value="{{old('tags')}}"
                        onkeypress="return /[0-9a-zA-Z, ]/i.test(event.key)"
                    >
                    @error('tags')
                        <p class="text-error">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="form-block">
                    <label for="status">Visibility</label>
                    <select id="status" name="status">
                        <option value="public" class="block w-full" {{old('status') == 'public' ? 'selected' : null}}>Public</option>
                        <option value="private" class="block w-full" {{old('status') == 'private' ? 'selected' : null}}>Private</option>
                        <option value="unlisted" class="block w-full" {{old('status') == 'unlisted' ? 'selected' : null}}>Unlisted</option>
                    </select>
                    @error('status')
                        <p class="text-error">You must set your visibility status.</p>
                    @enderror

                </div>
                
                <div class="form-block">
                    <button type="submit">
                        <i class="fa-regular fa-save"></i>
                        Save changes
                    </button>
                </div>
            </form>   
        
        </div>

        <div class="w-1/3">
        </div>

    </div>

    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    // 'exportPDF','exportWord', '|',
                    // 'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 
                    // 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 
                    // 'todoList', 
                    '|',
                    // 'outdent', 'indent', '|',
                    // 'undo', 'redo',
                    // '-',
                    // 'fontSize', 'fontFamily', 
                    'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    // 'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 
                    // 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    // 'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        });

    </script>
    
</x-dashboard-layout>
