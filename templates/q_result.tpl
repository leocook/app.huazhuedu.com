<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="style/q_result.css">
    <title>{$title}</title>
    <script>
        var goto = function () {
            this.location.href = 'index.php';
        }
        var timer = setTimeout(goto,3000);
    </script>
</head>
<body>
<div class="conte">
    <div class="hui">
        <div class="huizang">
            <img src="{$img}"/>
        </div>
        <div class="sucess">
            <dl>
                <dt>{$msg}</dt>
                <dd>您的支持是我们最大的动力</dd>
            </dl>
        </div>
    </div>
</div>
</body>
</html>