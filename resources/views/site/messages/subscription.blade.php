@if(Session::has('status'))
    @if(Session::get('status') == 'success')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{Session::get('msg')}}',
            })
        </script>
    @endif
@endif
