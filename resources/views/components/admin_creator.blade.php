<form action="{{ route('admin.post_editor.store') }}" method="post">
    @csrf

    <h3>
        Title
    </h3>
    <input type="text" name="title" placeholder="Title">

    <h5>
        Description
    </h5>
    <textarea name="description"  cols="30" rows="10"></textarea>    

    <h5>
        Tags
    </h5>
    <input type="text" name="" placeholder="fake-tags">

    <h5>
        Project Date
    </h5>
    <input type="date" name="project_date" value="{{ now() }}">

    <h5>
        Image URL
    </h5>
    <input type="url" name="img">

    <h5>
        Repository URL
    </h5>
    <input type="url" name="repo">

    <br>
    <br>
    <input type="submit" value="Save" class="btn btn-primary">

</form>
