@if (Session::has('msg'))
    <div class="alert alert-danger">
        <p>{{ Session::get('msg') }}</p>
    </div>
@endif