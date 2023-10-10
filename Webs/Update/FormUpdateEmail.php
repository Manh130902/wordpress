<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
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
    -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
    box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
    margin-top: 10%;
  }

  label {
    display: block;
    position: relative;
    margin: 40px 0px;
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

  .input:focus+.line-box .line {
    width: 100%;
  }

  .label-active {
    top: -3em;
  }

  button {
    display: inline-block;
    padding: 12px 24px;
    background: rgb(220, 220, 220);
    font-weight: bold;
    color: rgb(120, 120, 120);
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

  .DMK {
    position: relative;
    display: inline-block;
    padding: 12px 24px;
    background: #ccc;
    font-weight: bold;
    color: rgb(red, green, blue);
    text-decoration: none;
    border: none;
    outline: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: large;
    left: 85%;
  }

  .DMK:hover {
    background-color: paleturquoise;
  }
</style>

<body>
  <a class="DMK" href="TK.php">Back</a>
  <form action="UpdateEmail.php" method="GET">
    <label>
      <input type="text" class="input" name="password" placeholder="ENTER YOUR PASSWORD" required>
      <div class="line-box">
        <div class="line"></div>
      </div>
    </label>
    <label>
      <input type="text" class="input" name="email" placeholder="ENTER YOUR NEW EMAIL" required>
      <div class="line-box">
        <div class="line"></div>
      </div>
    </label>
    <button type="submit" name="submit">CHANGE EMAIL</button>
  </form>
</body>

</html>