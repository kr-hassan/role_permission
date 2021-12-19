<div id="successMessage">

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" style="background: rgba(76, 175, 80, 0.3); color: #0b2e13">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger ">
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
