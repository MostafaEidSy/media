@if(Session::has('status'))
    @if(Session::get('status') == 'danger')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{Session::get('msg')}}",
            })
        </script>
    @endif
@endif
