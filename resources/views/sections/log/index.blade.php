@extends('indigo-layout::main')

@section('meta_title', _p('pages.logs.meta_title', 'meta_title') . ' // ' . config('app.name'))
@section('meta_description', _p('pages.logs.meta_description', 'meta_description'))

@push('head')
@endpush

@section('content')
    <div class="filter">
        <div class="grid grid-align-center grid-justify-between grid-justify-center--mlg">
            <div class="cell-inline cell-1-1--mlg">
                <div class="grid grid-ungap">
                    <div class="cell-inline cell-1-1--mlg">
                        @filtergroup(['filter' => ['' => 'All', 'info' => 'Info', 'error' => 'Error', 'debug' => 'Debug', 'alert' => 'Alert', 'notice' => 'Notice', 'warning' => 'Warning', 'critical' => 'Critical', 'emergency' => 'Emergency'], 'variable' => 'level'])
                    </div>
                </div>
            </div>
            <div class="cell-inline">
                <div class="filter__rlink">
                    <button class="filter__slink" @click="$refs.filter.toggle()">
                        <i class="icon icon-filter" v-if="">
                            <span class="icn-dot" v-if="$awesFilters.state.active['logs']"></span>
                        </i>
                        {{  _p('pages.filter.title', 'Filter') }}
                    </button>
                </div>
            </div>
            <slide-up-down ref="filter">
                <filter-wrapper name="logs">
                    <div class="grid grid-gap-xl grid_forms">
                        <div class="cell">
                            <fb-input name="message" label="{{ _p('pages.logs.filter.message', 'Message') }}"></fb-input>
                            <fb-select name="site" label="Site" :select-options="{{ $site_filters}}" placeholder-text="Select Site"></fb-input>
                        </div>
                    </div>
                    <div class="grid grid-gap-xl grid_forms">
                        <div class="cell">
                            <fb-date-range name="period"></fb-date>
                        </div>
                    </div>
                </filter-wrapper>
            </slide-up-down>
        </div>
    </div>

    @table([
        'name' => 'logs',
        'row_url' => route('logs.index') . '/{id}',
        'scope_api_url' => route('logs.scope'),
        'scope_api_params' => ['orderBy', 'date', 'message', 'level', 'site', 'period_start', 'period_end'],
        'default_data' => $logs
    ])

            @slot('mobile')
                <p>{{ _p('pages.logs.table.mobile.updated', 'Last update') }}: @{{ m.data.updated }}</p>
            @endslot

            <tb-column name="date" label="{{ _p('pages.logs.table.col.date', 'Date') }}" sort></tb-column>
            <tb-column name="level" label="{{ _p('pages.logs.table.col.level', 'Level') }}"></tb-column>
            <tb-column name="message_excerpt" label="{{ _p('pages.logs.table.col.message', 'Message') }}"></tb-column>
            <tb-column name="site_name" label="{{ _p('pages.logs.table.col.site', 'Site') }}"></tb-column>
    @endtable
@endsection

@section('modals')
    {{--Modal windows--}}
    <modal-window name="logs" class="modal_formbuilder" title="Create">
        <form-builder url="" :disabled-dialog="true">
            <fb-input name="name" label="{{ _p('pages.logs.modal_add.name', 'Name') }}"></fb-input>
        </form-builder>
    </modal-window>
@endsection
