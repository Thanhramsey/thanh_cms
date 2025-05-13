<script src="https://cdn.tiny.cloud/1/w9iyl7wt5s6amqxn1ipizrn4nobnm6w4wr0ayg75z7bvrpma/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: '#content',
        plugins: 'autolink lists link image charmap print preview anchor table media code',
        toolbar: 'undo redo | fontselect fontsizeselect | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table code',

        image_title: true,
        automatic_uploads: true,

        // Nếu có route upload ảnh riêng thì giữ nguyên
        images_upload_url: '{{ route('admin.news.upload_image') }}',

        // Cho phép chọn nhiều loại file
        file_picker_types: 'file image media',

        file_picker_callback: function(cb, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.body
                .clientHeight;

            var path_absolute = '/thanh_cms/public/';
            var cmsURL = path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;

            tinymce.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    if (message && message.content) {
                        const fileUrl = message.content;
                        const fileExt = fileUrl.split('.').pop().toLowerCase();

                        if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(fileExt)) {
                            cb(fileUrl, {
                                alt: 'Hình ảnh'
                            });
                        } else if (['mp4', 'webm', 'ogg'].includes(fileExt)) {
                            cb(fileUrl, {
                                alt: 'Video'
                            });
                        } else if (['mp3', 'wav', 'ogg'].includes(fileExt)) {
                            cb(fileUrl, {
                                alt: 'Audio'
                            });
                        } else {
                            cb(fileUrl, {
                                alt: 'File'
                            });
                        }
                    }
                }
            });
        }
    });
</script>
