<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?= asset("error404/styles/font-awesome.css") ?>" />
  <link rel="stylesheet" href="<?= asset("error404/styles/main.css") ?>" />
  <title>404 not found !</title>
</head>

<body>
  <div class="pedar">
    <div class="farzand">
      <h1>404</h1>
      <p class="p1">
        صفحه شما پیدا نشد !
      </p>
      <p class="p2">
        مشکلی پیش آمده و صفحه مورد نظر شما پیدا نشد میخواهید بعدا امتحان
        کنید؟!
      </p>
      <a href="<?= url('/home'); ?>">
        برگشت به صفحه اصلی
      </a>
    </div>
  </div>
</body>
<script src=" <?= asset("error404/js/source.js") ?>"></script>

</html>