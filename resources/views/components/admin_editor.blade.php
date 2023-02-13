<form action="{{ route('admin.post_editor.update', $active->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h3>
        Title
    </h3>
    <input type="text" name="title" placeholder="Title" value="{{ $active['title'] }}">

    <h5>
        Description
    </h5>
    <textarea name="description" cols="30" rows="10">{{ $active['description'] }}</textarea>

    <h5>
        Tags
    </h5>
    <input type="text" name="" placeholder="fake-tags" value="">

    <h5>
        Project Date
    </h5>
    <input type="date" name="project_date" value="{{ $active['project_date'] }}">

    <h5>
        Image URL
    </h5>
    <img src="{{ asset('storage/' . $active['img']) }}" alt="">
    <input type="file" name="img">

    <h5>
        Repository URL
    </h5>
    <input type="url" name="repo" value="{{ $active['repo'] }}">

    <br>
    <br>
    <input type="submit" value="Save" class="btn btn-primary">

</form>
<br>
<form action="{{ route('admin.post_editor.destroy', $active->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
