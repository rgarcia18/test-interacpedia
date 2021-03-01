@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Mensajes de exito/error al guardar o modificar informacion de la base de datos --}}

@if (Session::has('success'))
    @section('js_msg')
        @if(is_array(Session('success')))
            @foreach (Session('success') as $msg)
                    <script type="text/javascript">
                        toastr.success("{!! $msg !!}" ,'', {timeOut: 10000})
                    </script> 
            @endforeach
        @else
        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success( "{!! Session('success') !!}" ,'', {timeOut: 10000})
        </script> 
        @endif 
    @stop
@endif

@if(Session::has('warning'))
    @section('js_msg')
        @if(is_array(Session('warning')))
            @foreach (Session('warning') as $msg)
                    <script type="text/javascript">
                        toastr.warning("{!! $msg !!}" ,'', {timeOut: 10000})
                    </script> 
            @endforeach
        @else
            <script type="text/javascript">
                toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
                toastr.warning( "{!! Session('warning') !!}" ,'', {timeOut: 10000})
            </script> 
        @endif
     @stop
@endif

@if(Session::has('error'))
    @section('js_msg')
        @if(is_array(Session('error')))
            @foreach (Session('error') as $msg)
                    <script type="text/javascript">
                        toastr.error("{!! $msg !!}" ,'', {timeOut: 10000})
                    </script> 
            @endforeach
        @else
            <script type="text/javascript">
                 toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.error( "{!! Session('error') !!}" ,'', {timeOut: 10000})
            </script> 
        @endif
     @stop
@endif
