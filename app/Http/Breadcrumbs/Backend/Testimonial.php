<?php

Breadcrumbs::register('admin.testimonials.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.testimonials.management'), route('admin.testimonials.index'));
});

Breadcrumbs::register('admin.testimonials.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.testimonials.index');
    $breadcrumbs->push(trans('menus.backend.testimonials.create'), route('admin.testimonials.create'));
});

Breadcrumbs::register('admin.testimonials.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.testimonials.index');
    $breadcrumbs->push(trans('menus.backend.testimonials.edit'), route('admin.testimonials.edit', $id));
});
