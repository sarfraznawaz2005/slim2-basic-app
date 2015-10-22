{% include "Layout/Partials/head.php" %}

<body>
{% include "Layout/Partials/header.php" %}

<div class="container">

    <div class="panel panel-green">
        <div class="panel-heading">
            <i class="fa fa-edit"></i> <strong>{{title}}</strong>
        </div>

        <div class="panel-body">
            {% if flash.message|length %}
            <div class="alert alert-success">
                <strong>Success: </strong> {{flash.message}}
            </div>
            {% endif %}

            {% if flash.error|length %}
            <div class="alert alert-danger">
                <strong>Error(s): </strong> {{flash.error|raw}}
            </div>
            {% endif %}

            {{ block("body") }}
        </div>

        <div class="panel-footer">
            &copy; {{currentYear}} {{appName}} - <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
        </div>
    </div>


</div>
<!-- /container -->

{% include "Layout/Partials/footer.php" %}

</body>
</html>