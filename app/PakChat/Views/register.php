{% extends "Layout/layout.php" %}

{% block body %}

<form class="form-horizontal" action="" method="POST">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="name">Full Name</label>

            <div class="controls">
                <input required value="{{flash.form.name}}" autofocus type="text" id="name" name="name" class="form-control">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="email">E-mail Address</label>

            <div class="controls">
                <input required value="{{flash.form.email}}" type="email" id="email" name="email" class="form-control">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="password">Password</label>

            <div class="controls">
                <input required value="{{flash.form.password}}" type="password" id="password" name="password" class="form-control">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="password_confirmation">Password (Confirm)</label>

            <div class="controls">
                <input required value="{{flash.form.password_confirmation}}" type="password" id="password_confirmation" name="password_confirmation"
                       class="form-control">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="sex">Gender</label>

            <div class="controls">
                <select required name="gender" id="gender" class="form-control">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="mobile">Mobile Number</label>

            <div class="controls">
                <input value="{{flash.form.mobile}}" type="text" id="mobile" name="mobile"
                       class="form-control">
            </div>
        </div>

        <br>

        <div class="control-group">
            <div class="controls">
                <button class="btn btn-success">Register</button>
            </div>
        </div>
    </fieldset>
</form>


{% endblock body %}