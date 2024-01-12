<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Images/BBB.ico" />
  <meta name="theme-color" content="#000000" />
  <meta name="description" content="BBB" />
  <title>BBB</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="navbar.css">
</head>
<body class="indexBody">
  <container class="Navbar">
    <a class="logo" href="./index.php">
      <img src="./Images/BBB2.png" alt="logo" width="50px" height="50px">
      <div>  </div>
      <div>De Groene Weide</div>
</a>
    <div class="navlink">
      <a href="./index">Home</a>
      <a href="./camping">De Camping</a>
      <a href="./mapPage">Plattegrond</a>
      <a href="./Reservering">Reserveren</a>
      <a href="./mapInfo">Map Information</a>
    </div>
    <script>
  var currentPagePath = window.location.pathname;
  var currentPageFile = currentPagePath.split('/').pop(); // get path, split by /, get last element

  $('.navlink a').removeClass('active'); // remove active class from all links

  $('.navlink a[href*="' + currentPageFile + '"]').addClass('active'); // add active class to link that contains the current page
  </script>
  </container>
</body>
</html>
