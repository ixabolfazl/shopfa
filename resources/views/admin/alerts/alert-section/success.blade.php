@if(session('alert-section-success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>موفق!</strong> {{ session('alert-section-success') }}
    </div>
@endif
