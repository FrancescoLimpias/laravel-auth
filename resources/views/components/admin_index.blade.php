<ul>
    <li>
        <a href="{{route('admin.post_editor.index')}}">
            <h5>
                New Post
            </h5>
        </a>
    </li>
    @foreach ($posts as $post)
        <li>
            <a href="{{ route("admin.post_editor.index", $post->id) }}">
                <h5>
                    {{ $post['title'] }}
                </h5>
                <span class="date">
                    Updated: {{ $post['updated_at'] }}
                </span>
            </a>
        </li>
    @endforeach
</ul>
