<script>
    @if(Session::has('success'))
    $(document).ready( function () {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            backdrop: false,

        });
        Toast.fire({
            icon: "success",
            title: '{{ session('success') }}',
        });

    });
    @endif
</script>
