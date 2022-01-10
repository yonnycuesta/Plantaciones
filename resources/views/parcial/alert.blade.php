@if(session()->has('status'))
<script>
toastr.success("{{@session('status')}}","info");
</script>



@elseif(session()->has('actua'))
<script>
toastr.warning("{{@session('actua')}}","info");
</script>
@elseif(session()->has('error'))
<script>
toastr.error("{{@session('error')}}","error");
</script>
@endif





