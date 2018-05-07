@extends('admin.layouts.master')

@section('title', 'Dashboard')

@php $histories = \App\History::orderBy('time', 'desc')->get(); @endphp

@section('content')
    <div class="ui two column padded stackable grid">
        <div class="sixteen wide column">
            <h2 class="ui header dividing">Tổng quan</h2>
        </div>

        <div class="sixteen wide column">
            @include('admin.dashboard.statistic.general')
        </div>

        <div class="column">
            @include('admin.dashboard.statistic.order')
        </div>

	{{-- 	<div class="column">
            @include('admin.dashboard.statistic.branding')
        </div> --}}

        <div class="column">
            @include('admin.dashboard.statistic.product_type')
        </div>

        <div class="sixteen wide column">
            @include('admin.dashboard.history')
        </div>
    </div>
@endsection

