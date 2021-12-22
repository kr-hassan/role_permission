<div id="successMessage">

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible text-center" style="background: rgba(76, 175, 80, 0.3); color: white">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger text-center">
            {{ Session::get('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script>
    setTimeout(function () {
        $('#successMessage').fadeOut('fast');
    }, 5000);
</script>
