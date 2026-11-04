@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .note-editor.note-frame {
            border-color: #cbd5e1 !important;
            border-radius: 0.75rem !important;
            overflow: hidden;
            background-color: #ffffff;
        }
        .note-editor.note-frame .note-toolbar {
            background-color: #f8fafc !important;
            border-bottom: 1px solid #e2e8f0 !important;
            padding: 8px 12px !important;
        }
        .note-editor.note-frame .note-editing-area .note-editable {
            background-color: #ffffff !important;
            color: #0f172a !important;
            font-family: 'Poppins', sans-serif !important;
            font-size: 0.925rem !important;
            line-height: 1.75 !important;
            padding: 16px !important;
        }
        .note-editor.note-frame .note-statusbar {
            background-color: #f8fafc !important;
            border-top: 1px solid #e2e8f0 !important;
        }
        .note-editor .note-editable ul {
            list-style-type: disc !important;
            padding-left: 1.5rem !important;
            margin-bottom: 1rem !important;
        }
        .note-editor .note-editable ol {
            list-style-type: decimal !important;
            padding-left: 1.5rem !important;
            margin-bottom: 1rem !important;
        }
        .note-editor .note-editable blockquote {
            border-left: 4px solid #D4AF37 !important;
            padding-left: 1rem !important;
            color: #475569 !important;
            font-style: italic !important;
            margin: 1rem 0 !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof $ !== 'undefined' && $.fn.summernote) {
                $('.summernote-editor').summernote({
                    tabsize: 2,
                    height: 340,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            }
        });
    </script>
@endpush
