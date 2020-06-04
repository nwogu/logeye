@extends('indigo-layout::main')

@section('meta_title', _p('pages.sites.meta_title', 'Sites') . ' // ' . config('app.name'))
@section('meta_description', _p('pages.sites.meta_description', 'Sites captured by your app'))

@push('head')
    @include('integration.favicons')
    @include('integration.ga')
@endpush

@section('content')
    <content-wrapper :default='@json($site)' store-data="content">
        <template slot-scope="data">
            <p><strong>{{ _p('pages.site.info.name', 'Name') }}:</strong> @{{ data.name }}</p>
            <p><strong>{{ _p('pages.site.info.callback', 'Web Url') }}:</strong> @{{ data.callback }}</p>
            <p>
                <button class="upper-link" @click="AWES._store.commit('setData', {param: 'editsite', data: data}); AWES.emit('modal::edit-site:open')">{{ _p('pages.site.info.edit', 'Edit') }}</button>
            </p>
        </template>
    </content-wrapper>
@endsection

@section('modals')
    {{--Edit site--}}
    <modal-window name="edit-site" class="modal_formbuilder" title="{{ _p('pages.sites.modal.edit_site.title', 'Edit site') }}">
        <form-builder method="PATCH" url="/sites/{id}" store-data="content">
            <fb-input name="name" label="{{ _p('pages.sites.modal.edit_site.name', 'Name') }}"></fb-input>
            <fb-input name="callback" label="{{ _p('pages.sites.modal.edit_site.callback', 'Web Url') }}"></fb-input>
        </form-builder>
    </modal-window>
@endsection
