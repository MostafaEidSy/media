@if(Session::has('message'))
    <div class="row" >
        <button type="button" class="btn btn-lg btn-block btn-{{Session::get('alert-type')}} mb-2">
            {{Session::get('message')}}
        </button>
    </div>
@endif
