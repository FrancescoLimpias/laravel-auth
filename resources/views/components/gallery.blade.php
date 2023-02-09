<div class="container">
    <h2>
        Gallery
    </h2>

    <ul>
        @foreach ($posts as $post)
            <li id="post{{ $post['id'] }}">
                <a href="{{ route('post.show', $post) }}">
                    <h4>
                        {{ $post['title'] }}
                    </h4>
                    <span class="date">
                        {{ $post['project_date'] }}
                    </span>
                    <img src="{{ $post['img'] }}" alt="">
                    <span class="tags">
                        tags:
                    </span>
                </a>
            </li>

            <script>
                {
                    let postEl = document.getElementById("post" + {{ $post['id'] }});
                    let tagsEl = postEl.querySelector("span.tags");
                    let tagsRaw = "{{ $post['tags'] }}";
                    tagsEl.innerHTML += tagsRaw.replaceAll("|", " ");
                }
            </script>
        @endforeach


    </ul>
</div>
