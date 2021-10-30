@if(session('alert-section-error'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>خطا!</strong> {{ session('alert-section-error') }}
    </div>
@endif
