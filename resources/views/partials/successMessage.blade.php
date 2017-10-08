@if(session()->has('message'))
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable">
            {{session()->get('message')}}
        </div>
    </div>
@endif