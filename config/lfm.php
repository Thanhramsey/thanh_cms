<?php

/*
|--------------------------------------------------------------------------
| Documentation for this config :
|--------------------------------------------------------------------------
| online  => http://unisharp.github.io/laravel-filemanager/config
| offline => vendor/unisharp/laravel-filemanager/docs/config.md
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
     */
    'nav-back'          => 'Back',
    'nav-new'           => 'New Folder',
    'nav-upload'        => 'Upload',
    'nav-thumbnails'    => 'Thumbnails',
    'nav-list'          => 'List',
    'nav-sort'          => 'Sort',
    'nav-sort-alphabetic' => 'Sort By Alphabets',
    'nav-sort-time'     => 'Sort By Time',

    'menu-rename'       => 'Rename',
    'menu-delete'       => 'Delete',
    'menu-view'         => 'Preview',
    'menu-download'     => 'Download',
    'menu-resize'       => 'Resize',
    'menu-crop'         => 'Crop',
    'menu-move'         => 'Move',
    'menu-multiple'     => 'Multi-selection',

    'title-page'        => 'File Manager',
    'title-panel'       => 'Laravel FileManager',
    'title-upload'      => 'Upload File(s)',
    'title-view'        => 'View File',
    'title-user'        => 'Files',
    'title-share'       => 'Shared Files',
    'title-item'        => 'Item',
    'title-size'        => 'Size',
    'title-type'        => 'Type',
    'title-modified'    => 'Modified',
    'title-action'      => 'Action',

    'type-folder'       => 'Folder',

    'message-empty'     => 'Folder is empty.',
    'message-choose'    => 'Choose File(s)',
    'message-delete'    => 'Are you sure you want to delete this item?',
    'message-name'      => 'Folder name:',
    'message-rename'    => 'Rename to:',
    'message-extension_not_found' => 'Please install gd or imagick extension to crop, resize, and make thumbnails of images.',
    'message-drop'      => 'Or drop files here to upload',

    'error-rename'      => 'File name already in use!',
    'error-file-name'   => 'File name cannot be empty!',
    'error-file-empty'  => 'You must choose a file!',
    'error-file-exist'  => 'A file with this name already exists!',
    'error-file-size'   => 'File size exceeds server limit! (maximum size: :max)',
    'error-delete-folder' => 'You cannot delete this folder because it is not empty!',
    'error-folder-name' => 'Folder name cannot be empty!',
    'error-folder-exist' => 'A folder with this name already exists!',
    'error-folder-alnum' => 'Only alphanumeric folder names are allowed!',
    'error-folder-not-found' => 'Folder  not found! (:folder)',
    'error-mime'        => 'Unexpected MimeType: ',
    'error-size'        => 'Over limit size:',
    'error-instance'    => 'The uploaded file should be an instance of UploadedFile',
    'error-invalid'     => 'Invalid upload request',
    'error-other'       => 'An error has occured: ',
    'error-too-large'   => 'Request entity too large!',

    'btn-upload'        => 'Upload File(s)',
    'btn-uploading'     => 'Uploading...',
    'btn-close'         => 'Close',
    'btn-crop'          => 'Crop',
    'btn-copy-crop'     => 'Copy & Crop',
    'btn-crop-free'     => 'Free',
    'btn-cancel'        => 'Cancel',
    'btn-confirm'       => 'Confirm',
    'btn-resize'        => 'Resize',
    'btn-resize-copy'   => 'Copy & Resize',
    'btn-open'          => 'Open Folder',

    'resize-ratio'      => 'Ratio:',
    'resize-scaled'     => 'Image scaled:',
    'resize-true'       => 'Yes',
    'resize-old-height' => 'Original Height:',
    'resize-old-width'  => 'Original Width:',
    'resize-new-height' => 'Height:',
    'resize-new-width'  => 'Width:',

    'use_package_routes'       => true,

    /*
    |--------------------------------------------------------------------------
    | Shared folder / Private folder
    |--------------------------------------------------------------------------
    |
    | If both options are set to false, then shared folder will be activated.
    |
     */

    'allow_private_folder'     => true,

    // Flexible way to customize client folders accessibility
    // If you want to customize client folders, publish tag="lfm_handler"
    // Then you can rewrite userField function in App\Handler\ConfigHandler class
    // And set 'user_field' to App\Handler\ConfigHandler::class
    // Ex: The private folder of user will be named as the user id.
    'private_folder_name'      => UniSharp\LaravelFilemanager\Handlers\ConfigHandler::class,

    'allow_shared_folder'      => true,

    'shared_folder_name'       => 'shares',

    /*
    |--------------------------------------------------------------------------
    | Folder Names
    |--------------------------------------------------------------------------
     */

    'folder_categories'        => [
        'file'  => [
            'folder_name'  => 'files',
            'startup_view' => 'list',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime'   => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'application/pdf',
                'text/plain',
                'video/mp4',
                'video/webm',
                'video/ogg',
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',
            ],
        ],
        'image' => [
            'folder_name'  => 'photos',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime'   => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
            ],
        ],
        'media'  => [
            'folder_name'  => 'medias',
            'startup_view' => 'list',
            'max_size'     => 500000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime'   => [
                'video/mp4',
                'video/webm',
                'video/ogg',
                'audio/mpeg',   // mp3
                'audio/ogg',
                'audio/wav',
            ],
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
     */

    'paginator' => [
        'perPage' => 30,
    ],

    /*
    |--------------------------------------------------------------------------
    | Upload / Validation
    |--------------------------------------------------------------------------
     */

    'disk'                     => 'public',

    'base_directory' => 'public',

    'url_prefix' => 'thanh_cms/public/storage',


    'rename_file'              => false,

    'rename_duplicates'        => false,

    'alphanumeric_filename'    => false,

    'alphanumeric_directory'   => false,

    'should_validate_size'     => false,

    'should_validate_mime'     => true,

    // behavior on files with identical name
    // setting it to true cause old file replace with new one
    // setting it to false show `error-file-exist` error and stop upload
    'over_write_on_duplicate'  => false,

    // mimetypes of executables to prevent from uploading
    'disallowed_mimetypes' => ['text/x-php', 'text/html', 'text/plain'],

    // extensions of executables to prevent from uploading
    'disallowed_extensions' => ['php', 'html'],

    // Item Columns
    'item_columns' => ['name', 'url', 'time', 'icon', 'is_file', 'is_image', 'thumb_url'],

    /*
    |--------------------------------------------------------------------------
    | Thumbnail
    |--------------------------------------------------------------------------
     */

    // If true, image thumbnails would be created during upload
    // 'should_create_thumbnails' => true,
    'should_create_thumbnails' => true,
    'thumb_folder_name'        => 'thumbs',

    // Create thumbnails automatically only for listed types.
    'raster_mimetypes'         => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
    ],

    'thumb_img_width'          => 200, // px

    'thumb_img_height'         => 200, // px

    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
     */

    'file_type_array'          => [
        'pdf'  => 'Adobe Acrobat',
        'doc'  => 'Microsoft Word',
        'docx' => 'Microsoft Word',
        'xls'  => 'Microsoft Excel',
        'xlsx' => 'Microsoft Excel',
        'zip'  => 'Archive',
        'gif'  => 'GIF Image',
        'jpg'  => 'JPEG Image',
        'jpeg' => 'JPEG Image',
        'png'  => 'PNG Image',
        'ppt'  => 'Microsoft PowerPoint',
        'pptx' => 'Microsoft PowerPoint',
        'video/mp4',
        'video/webm',
        'video/ogg',
        'audio/mpeg',   // mp3
        'audio/ogg',
        'audio/wav',
    ],

    /*
    |--------------------------------------------------------------------------
    | php.ini override
    |--------------------------------------------------------------------------
    |
    | These values override your php.ini settings before uploading files
    | Set these to false to ingnore and apply your php.ini settings
    |
    | Please note that the 'upload_max_filesize' & 'post_max_size'
    | directives are not supported.
     */
    'php_ini_overrides'        => [
        'memory_limit' => '256M',
    ],
];
