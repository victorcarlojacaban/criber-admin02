<?php

Breadcrumbs::register('admin.rooms.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.rooms.management'), route('admin.rooms.index'));
});

Breadcrumbs::register('admin.rooms.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.rooms.index');
    $breadcrumbs->push(trans('menus.backend.rooms.create'), route('admin.rooms.create'));
});

Breadcrumbs::register('admin.rooms.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.rooms.index');
    $breadcrumbs->push(trans('menus.backend.rooms.edit'), route('admin.rooms.edit', $id));
});
