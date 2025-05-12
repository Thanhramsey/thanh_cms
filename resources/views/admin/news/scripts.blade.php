<script src="https://cdn.tiny.cloud/1/w9iyl7wt5s6amqxn1ipizrn4nobnm6w4wr0ayg75z7bvrpma/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table media | code',
        // Cấu hình xử lý hình ảnh
        images_upload_url: '{{ route('admin.news.upload_image') }}', // Route để xử lý upload hình ảnh
        automatic_uploads: true, // Tự động upload hình ảnh khi chèn
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{ route('admin.news.upload_image') }}'); // Route để xử lý upload hình ảnh

            xhr.onload = function() {
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                var json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            formData.append('_token', '{{ csrf_token() }}'); // Thêm CSRF token

            xhr.send(formData);
        }
    });
</script>
