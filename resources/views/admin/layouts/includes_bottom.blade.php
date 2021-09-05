
<script src="{{ asset('template') }}/lib/jquery/jquery.min.js"></script>
{{-- <script src="{{ asset('template') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script> --}}

<script src="{{ asset('template') }}/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
{{-- <script src="{{ asset('template') }}/lib/peity/jquery.peity.min.js"></script> --}}
{{-- <script src="{{ asset('template') }}/lib/rickshaw/vendor/d3.min.js"></script>
<script src="{{ asset('template') }}/lib/rickshaw/vendor/d3.layout.min.js"></script>
<script src="{{ asset('template') }}/lib/rickshaw/rickshaw.min.js"></script> --}}
{{-- <script src="{{ asset('template') }}/lib/jquery.flot/jquery.flot.js"></script>
<script src="{{ asset('template') }}/lib/jquery.flot/jquery.flot.resize.js"></script> --}}
{{-- <script src="{{ asset('template') }}/lib/flot-spline/js/jquery.flot.spline.min.js"></script> --}}
{{-- <script src="{{ asset('template') }}/lib/jquery-sparkline/jquery.sparkline.min.js"></script> --}}

{{-- <script src="{{ asset('template') }}/js/ResizeSensor.js"></script> --}}
{{-- <script src="{{ asset('template') }}/js/dashboard.js"></script> --}}

@isset($novue)
<script src="{{ asset('template') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
@else

@endisset

<script src="{{ asset('template') }}/lib/moment/min/moment.min.js"></script>
<script src="{{ asset('template') }}/js/bracket.js"></script>

@notifyJs


<script>
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit
        // $('#data'+id).css("display", "none");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                 document.getElementById('delete-form'+id).submit();
            }
        })
    }
    @isset($collapsedMenu)
    $('body').addClass('collapsed-menu');

    // hide toggled sub menu
    $('.show-sub + .br-menu-sub').slideUp();

    menuText.addClass('op-lg-0-force');
    $('.br-sideleft').one('transitionend', function(e) {
      menuText.addClass('d-lg-none');
    });

    @endisset

</script>

<script>
  $(function(){
    'use strict'

    // FOR DEMO ONLY
    // menu collapsed by default during first page load or refresh with screen
    // having a size between 992px and 1299px. This is intended on this page only
    // for better viewing of widgets demo.
    $(window).resize(function(){
      minimizeMenu();
    });

    // $('.select2').select2();

    minimizeMenu();

    function minimizeMenu() {
      if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
        $('body').addClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideUp();
      } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
        $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
        $('body').removeClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideDown();
      }
    }
  });
</script>

@stack('js')

@include('_msg')