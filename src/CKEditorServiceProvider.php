<?php

namespace OpenAdminCore\Admin\CKEditor;

use Illuminate\Support\ServiceProvider;
use OpenAdminCore\Admin\Admin;
use OpenAdminCore\Admin\Form;

class CKEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(CKEditor $extension)
    {
        if (!CKEditor::boot()) {
            return;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-open-admin-ckeditor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-open-admin-ext/ckeditor')],
                'laravel-open-admin-ckeditor'
            );
        }

        Admin::booting(function () {
            Admin::js('vendor/laravel-open-admin-ext/ckeditor/ckeditor.js', false); // prevent minifying (last arg)
            Form::extend('ckeditor', Editor::class);
        });
    }
}
