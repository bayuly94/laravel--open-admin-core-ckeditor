<?php

namespace OpenAdminCore\Admin\CKEditor;

use OpenAdminCore\Admin\Extension;

class CKEditor extends Extension
{
    public $name = 'ckeditor';

    public $views = __DIR__.'/../resources/views';

    //public $assets = __DIR__.'/../resources/assets';

    public function assets()
    {
        return base_path('vendor/ckeditor/ckeditor');
    }
}
