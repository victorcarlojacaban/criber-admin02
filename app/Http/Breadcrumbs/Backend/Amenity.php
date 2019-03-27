<?php

Breadcrumbs::register('admin.amenities.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.amenities.management'), route('admin.amenities.index'));
});

Breadcrumbs::register('admin.amenities.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.amenities.index');
    $breadcrumbs->push(trans('menus.backend.amenities.create'), route('admin.amenities.create'));
});

Breadcrumbs::register('admin.amenities.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.amenities.index');
    $breadcrumbs->push(trans('menus.backend.amenities.edit'), route('admin.amenities.edit', $id));
});
