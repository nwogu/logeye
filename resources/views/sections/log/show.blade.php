@extends('indigo-layout::main')

@section('meta_title', _p('pages.leads.meta_title', 'Logs') . ' // ' . config('app.name'))
@section('meta_description', _p('pages.leads.meta_description', 'Logs captured by your app'))

@push('head')
    @include('integration.favicons')
    @include('integration.ga')
@endpush

@section('content')
    <content-wrapper :default='@json($log)' store-data="content">
        <template slot-scope="data">
            <p><strong>{{ _p('pages.log.date', 'Date') }}:</strong> @{{ data.date }}</p>
            <p><strong>{{ _p('pages.log.level', 'Level') }}:</strong> @{{ data.level }}</p>
            <p><strong>{{ _p('pages.log.message', 'Message') }}:</strong> @{{ data.message }}</p>
            <p><strong>{{ _p('pages.log.site_name', 'Site') }}:</strong> @{{ data.site_name }}</p>
            <p>
                <!-- <button class="upper-link" @click="AWES._store.commit('setData', {param: 'editLead', data: data}); AWES.emit('modal::edit-lead:open')">{{ _p('pages.lead.info.edit', 'Edit') }}</button> -->
            </p>
        </template>
    </content-wrapper>
@endsection

