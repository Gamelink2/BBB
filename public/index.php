<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Images/BBB.ico" />
  <meta name="theme-color" content="#000000" />
  <meta
    name="description"
    content="BBB"
  />
  <title>BBB</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="index.css">
</head>
<?php
if (!isset($_SESSION["ErrorMessage"])) {
?>
<body class="indexBody" onload="loadPage('homeLink', 'homePage.html')">
<?php
}
?>
  <container class="Navbar">
    <div class="logo" onclick="loadPage('homeLink', 'homePage.html')">
      <img src="./Images/BBB2.png" alt="logo" width="50px" height="50px">
      <div>De Groene Weide</div>
    </div>
  <ul id="linkList">
    <li id="homeLink" onclick="loadPage('homeLink', 'homePage.html')">Home</li>
    <!-- Empty string, so it broke -->
    <li id="campingLink" onclick="loadPage('campingLink', 'camping.html')">De Camping</li> 
      <li id="plattegrondLink" onclick="loadPage('plattegrondLink', 'mapPage.html')">Plattegrond</li>
      <li id="reserverenLink" onclick="loadPage('reserverenLink', 'Reservering.php')">Reserveren</li>
      <li id="mapInfoLink" onclick="loadPage('mapInfoLink', 'mapInfo.php')">Map Information</li>
    </ul>
  </container>
  <div id="content-placeholder" class="d-flex"></div>
  <script>      
   function loadPage(linkId, page) {
  // Remove the 'active' class from all list items
  var listItems = document.querySelectorAll('#linkList li');
  listItems.forEach(item => item.classList.remove('active'));

  // Load the selected page into the content div using AJAX
  $.ajax({
    url: './' + page,
    method: 'GET',
    success: function(data) {
      $('#content-placeholder').html(data);

      // Add the 'active' class to the parent li of the clicked link
      document.getElementById(linkId).classList.add('active');
    },
    error: function() {
      console.error('Error loading page');
    }
  });
}
  </script>
  <?php

  if (isset($_SESSION["ErrorMessage"])) {
    echo 
    '<div 
    style="font-family: Arial, Helvetica, sans-serif;
    font-size: large;
    color: red;">
    '.$_SESSION["ErrorMessage"].'
    </div>';
  }
  
  ?>
</body>
</html>
