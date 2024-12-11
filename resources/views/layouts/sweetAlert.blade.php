<script type="module">
    $(function () {
        @if(session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: '{{session('success')}}',
            confirmButtonColor: '#3085d6',
        })
        @endif

        @if(session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: '{{session('error')}}',
            confirmButtonColor: '#3085d6',
        })
        @endif

        @if(session()->has('warning'))
        Swal.fire({
            icon: 'warning',
            title: '{{session('warning')}}',
            confirmButtonColor: '#3085d6',
        })
        @endif

        @if(session()->has('info'))
        Swal.fire({
            icon: 'info',
            title: '{{session('info')}}',
            confirmButtonColor: '#3085d6',
        })
        @endif
    });
</script>
