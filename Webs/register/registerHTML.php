<!doctype html>
<html lang="en">
  <head>
    <title>REGISTER</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
      

        body {
          background: #C5E1A5;
        }
        form {
          width: 60%;
          margin: 60px auto;
          background: #efefef;
          padding: 60px 120px 80px 120px;
          text-align: center;
          -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
          box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
        }
        label {
          display: block;
          position: relative;
          margin: 40px 0px;
        }
        .label-txt {
          position: absolute;
          top: -1.6em;
          padding: 10px;
          font-family: sans-serif;
          font-size: .8em;
          letter-spacing: 1px;
          color: rgb(120,120,120);
          transition: ease .3s;
        }
        .input {
          width: 100%;
          padding: 10px;
          background: transparent;
          border: none;
          outline: none;
        }

        .line-box {
          position: relative;
          width: 100%;
          height: 2px;
          background: #BCBCBC;
        }

        .line {
          position: absolute;
          width: 0%;
          height: 2px;
          top: 0px;
          left: 50%;
          transform: translateX(-50%);
          background: #8BC34A;
          transition: ease .6s;
        }

        .input:focus + .line-box .line {
          width: 100%;
        }

        .label-active {
          top: -3em;
        }

        button {
          display: inline-block;
          padding: 12px 24px;
          background: rgb(220,220,220);
          font-weight: bold;
          color: rgb(120,120,120);
          border: none;
          outline: none;
          border-radius: 3px;
          cursor: pointer;
          transition: ease .3s;
        }

        button:hover {
          background: #8BC34A;
          color: #ffffff;
        }

    </style>
  </head>
  <body>
    <form action="registerPHP.php" method="post">
      <label>
        <p class="label-txt">ENTER YOUR USERNAME</p>
        <input type="text" class="input" name="username" required>
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER YOUR PASSWORD</p>
        <input type="text" class="input" name="password" required>
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER YOUR EMAIL</p>
        <input type="text" class="input" name="email" required>
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <button type="submit" name="submit">REGISTER</button>
      <div class="container signin" style="margin-top: 1.5rem;">
        <p>  Bạn đã có Tài khoản? <a href="../login/login.php"> Đăng nhập </a>.</p>
      </div>
    </form>

    <script>
      $(document).ready(function(){

        $('.input').focus(function(){
          $(this).parent().find(".label-txt").addClass('label-active');
        });

        $(".input").focusout(function(){
          if ($(this).val() == '') {
            $(this).parent().find(".label-txt").removeClass('label-active');
          };
        });

      });
    </script>
  </body>

</html>