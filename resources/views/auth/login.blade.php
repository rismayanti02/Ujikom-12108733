<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="assets/dist/css/style1.css" />
  <style>
    body {
      background-color: #000006; /* Ganti warna latar belakang menjadi biru tua */
    }
  </style>
</head>
<body>
  <section class="wrapper">
    <div class="form signup"> 
      <header>Signup</header>
      <form action="#">
        @csrf
        <input name="name" type="text" placeholder="Full name" required />
        <input name="email" type="text" placeholder="Email address" required />
        <input name="password" type="password" placeholder="Password" required />
        <input type="submit" value="Signup" />
      </form>
    </div>

    <div class="form login">
      <header>Login</header>
      <form action="{{route('login.auth')}}" method="POST">
        @csrf
        <input name="email" type="text" placeholder="Email address" required />
        <input name="password" type="password" placeholder="Password" required />
        <input type="submit" value="Login" />
      </form>
    </div>

    <script>
      const wrapper = document.querySelector(".wrapper"),
        signupHeader = document.querySelector(".signup header"),
        loginHeader = document.querySelector(".login header");

      loginHeader.addEventListener("click", () => {
        wrapper.classList.add("active");
      });
      signupHeader.addEventListener("click", () => {
        wrapper.classList.remove("active");
      });
    </script>
  </section>
</body>
</html>
