@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Title: {{ $post['title'] }}
        </h1>
        <span class="date">
            Post last updated: {{ $post['updated_at']}}
        </span>
        <img src="{{ $post['img'] }}" alt="">
        <span class="quick-nav">
            <a class="github-button" href="https://github.com/FrancescoLimpias/laravel-auth" data-icon="octicon-eye"
                aria-label="Watch FrancescoLimpias/laravel-auth on GitHub">Watch the repo!</a>
            <span class="tags">
                Tags: {{ $post["tags"] }}
            </span>

            <span class="date">
                Project date: {{ $post['project_date'] }}
            </span>
        </span>
        <p>
            {{ $post['description'] }}
        </p>
    </div>
@endsection
