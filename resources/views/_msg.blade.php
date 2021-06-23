<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
    @if(Session::has('success'))
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: '{{ Session::get('success') }}',
      showConfirmButton: false,
      timer: 1500
    })
    @endif
    @if(Session::has('info'))
    Swal.fire('{{ Session::get('info') }}')
    @endif
    @if(Session::has('warning'))
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '{{ Session::get('warning') }}',
    })
    @endif
    @if(Session::has('error'))
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '{{ Session::get('error') }}',
    })
    @endif

    @if ($errors->any())
    var html ='<ul>';
    @foreach ($errors->all() as $error)
        html +='<li>{{ $error }}</li>';
    @endforeach
    html +=' </ul>';
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: html,
    })
    @endif
</script>