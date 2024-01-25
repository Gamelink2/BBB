<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Images/BBB.ico" />
  <meta name="description" content="BBB" />
  <title>BBB</title>
  <meta http-equiv="refresh" content="10">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="./Css/navbar.css">
</head>
<body class="indexBody">
  <div class="Navbar">
    <a class="logo" href="./Home">
      <img src="./Images/BBB2.png" alt="logo" width="50px" height="50px">
      <div>  </div>
      <div>De Groene Weide</div>
    </a>
    <div class="navlink">
      <!-- <a href="./ ">Home</a> -->
      <a href="./">De Camping</a>
      <a href="./Plattegrond">Plattegrond</a>
      <a href="./Boeken">Boeken</a>
     <!-- moet eigenlijk worden afgezonderd van de rest, maar voor nu is het prima -->
      <a href="./Reserveringen">Reserveringen</a>
    </div>
  </div>
</body>
<script>
  var currentPagePath = window.location.pathname;
  var currentPageFile = currentPagePath.split('/').pop(); // get path, split by /, get last element

  $('.navlink a').removeClass('active'); // remove active class from all links

  $('.navlink a[href*="' + currentPageFile + '"]').addClass('active'); // add active class to link that contains the current page
  </script>
      <script>
        // JavaScript code to perform hard reload
        function hardReload() {
            location.reload(true);
        }

        // Set an interval to call the hardReload function every 30 seconds (or your desired interval)
        setInterval(hardReload, 20000); // 30 seconds
    </script>
</html>
