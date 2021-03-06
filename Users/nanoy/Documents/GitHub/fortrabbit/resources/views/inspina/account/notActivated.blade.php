
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SS+ | Login</title>

    <link href="{{asset('inspina/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspina/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('inspina/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('inspina/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

            <h1 class="logo-name">SS+</h1>

            </div>
            <h2 class="normal">Activate your account</h2>
            <p>A link has been sent to your email account to activate your account.</p>
            <p class="p-b-20">Activate your account Now! to enjoy skoolspace, it's free and always will be.</p>
                <a href="{{ url('/login') }}" class="btn btn-info btn-cons"> Back to the login </a>
            <p class="m-t"> <small>skoolspace framework built for school group management <br> &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('inspina/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('inspina/js/bootstrap.min.js')}}"></script>
    <script>
        function validateText(id)
        {
            if($("#" + id).val() == null || $("#" + id).val() == "")
            {
                var div = $("#" + id).closest("div");
                div.addClass("has-error");
                return false;
            }
            else
            {
                var div = $("#" + id).closest("div");
                div.removeClass("has-error");
                return true;
            }
        }
        $(document).ready(
            function(){
                $("#loginbtn").click(function()
                {
                    if(!validateText("loginEmail"))
                        return false;
                    if(!validateText("loginPassword"))
                        return false;
                    $('form#loginForm').submit();

                })
            }
        );
    </script>
</body>

</html>
