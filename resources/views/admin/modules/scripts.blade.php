<script src="https://cdn.tiny.cloud/1/w9iyl7wt5s6amqxn1ipizrn4nobnm6w4wr0ayg75z7bvrpma/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'autolink lists link image charmap print preview anchor table media ',
        toolbar: 'undo redo | fontselect fontsizeselect | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |inserttable | cell row column delcell delrow delcol| link image table media code |charmap',
        // Cấu hình xử lý hình ảnh
        images_upload_url: '{{ route('admin.news.upload_image') }}', // Route để xử lý upload hình ảnh
        image_title: true,
        automatic_uploads: true, // Tự động upload hình ảnh khi chèn
        http: //localhost/thanh_cms/public/laravel-filemanager?type=media
            file_picker_callback: function(cb, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = ''

                tinymce.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        console.log("message:", message);
                        console.log("api:", message);
                        if (message && message.content) {
                            cb(message.content);
                        }
                    }
                });
            },
        file_picker_types: 'file image media',
        // file_picker_callback: function(cb, value, meta) {
        //     var input = document.createElement('input');
        //     input.setAttribute('type', 'file');
        //     input.setAttribute('accept', [
        //         'audio/*',
        //         'video/*',
        //         'image/*',
        //         '.doc', '.docx', 'application/msword',
        //         'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        //         '.pdf', 'application/pdf',
        //         '.xls', '.xlsx', 'application/vnd.ms-excel',
        //         'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        //     ].join(','));

        //     input.onchange = function() {
        //         var file = this.files[0];

        //         var xhr, formData;
        //         xhr = new XMLHttpRequest();
        //         xhr.withCredentials = false;
        //         xhr.open('POST', '{{ route('admin.news.upload_media') }}'); // Sử dụng cùng route upload

        //         xhr.onload = function() {
        //             if (xhr.status != 200) {
        //                 cb('', {
        //                     title: file.name,
        //                     text: 'Upload failed: ' + xhr.status
        //                 });
        //                 console.error('HTTP Error: ' + xhr.status + " " + xhr.responseText);
        //                 return;
        //             }
        //             var json;
        //             try {
        //                 json = JSON.parse(xhr.responseText);
        //             } catch (e) {
        //                 cb('', {
        //                     title: file.name,
        //                     text: 'Invalid JSON: ' + xhr.responseText
        //                 });
        //                 console.error('Invalid JSON: ' + xhr.responseText);
        //                 return;
        //             }
        //             if (!json || typeof json.location != 'string') {
        //                 cb('', {
        //                     title: file.name,
        //                     text: 'Invalid JSON structure: ' + xhr.responseText
        //                 });
        //                 console.error('Invalid JSON structure: ' + xhr.responseText);
        //                 return;
        //             }
        //             console.log(json.location);
        //             if (meta.filetype === 'image') {
        //                 cb(json.location, {
        //                     title: file.name
        //                 });
        //             } else if (meta.filetype === 'media' && file.type.startsWith('video/')) {
        //                 cb(json.location, {
        //                     title: file.name
        //                 });
        //             } else if (meta.filetype === 'media' && file.type.startsWith('audio/')) {
        //                 cb(json.location, {
        //                     title: file.name
        //                 });
        //             } else {
        //                 cb(json.location, {
        //                     title: file.name
        //                 }); // Xử lý các file khác (bao gồm cả documents)
        //             }
        //         };

        //         xhr.onerror = function() {
        //             cb('', {
        //                 title: file.name,
        //                 text: 'Upload failed due to a network error.'
        //             });
        //             console.error('Media upload failed due to a network error.');
        //         };

        //         formData = new FormData();
        //         formData.append('file', file, file.name);
        //         formData.append('_token', '{{ csrf_token() }}');
        //         xhr.send(formData);
        //     };
        //     input.click();
        // }
    });
</script>
