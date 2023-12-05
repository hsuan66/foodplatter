<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body {
        background: url(/project/images/01.jpg) center center no-repeat;
        background-size: cover;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-panel {
        background: rgb(20,64,64,0.8);
        max-width: 500px;
        margin: auto;
        padding: 40px;
        /* border: 1px solid #ccc; */
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* color:#fff; */
    }
  </style>

</head>

<body>
<div class="container login-panel">
    <!-- 頁籤 -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login">會員登入</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register">會員註冊</a>
    </li>
  </ul>

  <div class="tab-content mt-3">
    <!-- 會員登入 -->
    <div class="tab-pane fade show active" id="login">
      <h2 class="text-left">會員登入</h2>
      <!-- 輸入 -->
      <form action="" method="post">
        <div class="input-area">
          <div class="form-floating">
            <input type="email" class="form-control" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
        </div>

        <!-- Remember me -->
        <div class="py-2">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="">
            <label class="form-check-label">
              Remember me
            </label>
          </div>
        </div>
        <div class="d-grid mb-4">
          <button type="submit" class="btn btn-primary">登入</button>
        </div>
      </form>
    </div>


    <!-- 會員註冊 -->
    <div class="tab-pane fade" id="register">
      <h2 class="text-left">會員註冊</h2>
      <!-- 輸入 -->
      <form action="" method="post">
        <div class="input-area">
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
        </div>

        

        
        <div class="d-grid mb-4">
          <button type="submit" class="btn btn-primary">註冊</button>
        </div>
      </form>
    </div>
  </div>
</div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>