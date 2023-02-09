@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            Post Editor
        </h2>
        <div class="row">
            <div class="index border col-4">
                @include('components.admin_index')
            </div>
            <div class="editor border col-8">
                @if ($active != null)
                    @include('components.admin_editor')
                @endif
            </div>
        </div>
    </div>
@endsection
