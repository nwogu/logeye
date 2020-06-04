@extends('indigo-layout::main')

@section('meta_title', _p('pages.sites.meta_title', 'meta_title') . ' // ' . config('app.name'))
@section('meta_description', _p('pages.sites.meta_description', 'meta_description'))

@push('head')
@endpush

@section('create_button')
    <button class="frame__header-add" @click="AWES.emit('modal::sites:open')"><i class="icon icon-plus"></i></button>
@endsection

@section('content')
    <div class="filter">
        <div class="grid grid-align-center grid-justify-between grid-justify-center--mlg">
            <div class="cell-inline cell-1-1--mlg">
                <div class="grid grid-ungap">
                </div>
            </div>
            <div class="cell-inline">
                <div class="filter__rlink">
                    <button class="filter__slink" @click="$refs.filter.toggle()">
                        <i class="icon icon-filter" v-if="">
                            <span class="icn-dot" v-if="$awesFilters.state.active['sites']"></span>
                        </i>
                        {{  _p('pages.filter.title', 'Filter') }}
                    </button>
                </div>
            </div>
            <slide-up-down ref="filter">
                <filter-wrapper name="sites">
                    <div class="grid grid-gap-x grid_forms">
                        <div class="cell">
                            <fb-input name="name" label="{{ _p('pages.sites.filter.name', 'Name') }}"></fb-input>
                        </div>
                    </div>
                </filter-wrapper>
            </slide-up-down>
        </div>
    </div>

    @table([
        'name' => 'sites',
        'row_url' => route('sites.index') . '/{id}',
        'scope_api_url' => route('sites.scope'),
        'scope_api_params' => ['orderBy', 'is_public', 'name'],
        'default_data' => $sites
    ])
            @slot('emptyCard')
                <a href="#modal_form" @click="AWES.emit('modal::sites:open')" class="btn mt-20">Create</a>
            @endslot

            @slot('mobile')
                <p>{{ _p('pages.sites.table.mobile.updated', 'Last update') }}: @{{ m.data.updated }}</p>
            @endslot

            <tb-column name="name" label="{{ _p('pages.sites.table.col.name', 'Name') }}"></tb-column>
            <tb-column name="callback" label="{{ _p('pages.sites.table.col.callback', 'Web Url') }}"></tb-column>
            <tb-column name="created_at" label="{{ _p('pages.sites.table.col.created_at', 'Created') }}"></tb-column>
    @endtable
@endsection

@section('modals')
    {{--Modal windows--}}
    <modal-window name="sites" class="modal_formbuilder" title="Create">
        <form-builder url="" :disabled-dialog="true">
            <fb-input name="name" label="{{ _p('pages.sites.modal_add.name', 'Name') }}"></fb-input>
            <fb-input name="callback" label="{{ _p('pages.sites.modal_add.callback', 'Web Url') }}"></fb-input>
        </form-builder>
    </modal-window>
@endsection
