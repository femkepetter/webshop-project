@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Thank you for your order!</h1>
        </div>
    </div>
</div>
@endsection

@push('child-script')
<script type="text/javascript">
    $(document).ready(function() {
       $('#toast').toast('dispose')
    })
    </script>
@endpush