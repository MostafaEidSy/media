@if(Session::has('status'))
    @if(Session::get('status') == 'success')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
            })
            Toast.fire({
                icon: 'success',
                title: "{{Session::get('msg')}}"
            })
        </script>
    @endif
@endif
