{% extends "Layout/layout.php" %}

{% block body %}

<form id="loginform" class="form-horizontal" role="form" method="post">

    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input autofocus id="email" type="email" class="form-control" name="email" value=""
               placeholder="E-mail Address">
    </div>

    <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password"
               placeholder="Password">
    </div>

    <div style="margin-top:-20px" class="input-group">
        <div class="checkbox">
            <label>
                <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
            </label>
        </div>
    </div>

    <div style="margin-top:10px" class="form-group">
        <div class="col-sm-12 controls">
            <button class="btn btn-success">Login</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 control">
            <div style="border-top: 1px solid#888; padding-top:15px;">
                Don't have an account? <a href="register">Register</a>
            </div>
        </div>
    </div>
</form>

{% endblock body %}