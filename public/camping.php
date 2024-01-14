<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('navbar.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Images/BBB.ico" />
    <link rel="stylesheet" href="./Css/camping.css">
    <meta name="description" content="BBB" />
    <title>BBB</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* Add or modify styles if necessary */
        .option-content {
            display: none;
        }

        .option-content p {
            /* Add styles for the text within <p> tags */
            color: black; /* You can customize the color */
            font-size: 16px; /* You can customize the font size */
            /* Add other styles as needed */
        }
    </style>
</head>
<body>
    <div class="campBody">
        <div class="flex-container">
            <div class="campText">
                <div class="dropdown">
                    <div class="label" id="dropdownLabel">Locatie</div>
                    <div class="dropdown-content">
                        <a href="#option1" class="dropdown-option" data-target="option1">1</a>
                        <a href="#option2" class="dropdown-option" data-target="option2">2</a>
                        <a href="#option3" class="dropdown-option" data-target="option3">3</a>
                    </div>
                </div>
                <div id="option1" class="option-content">
                    <p>Selected Option Text: Option 1</p>
                </div>
                <div id="option2" class="option-content">
                    <p>Selected Option Text: Option 2</p>
                </div>
                <div id="option3" class="option-content">
                    <p>Selected Option Text: Option 3</p>
                </div>
            </div>
            <div class="nested-flex-container">
                <div class="campText2">
                    <img src="Images/camping.jpg" alt="Camping Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="campText3">
                    <p>dammmmmmmmmmmm damiel</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        <script>
            $(document).ready(function(){
                $(".dropdown-option").click(function(e){
                    e.preventDefault(); // Prevent the default behavior of the anchor link
                    var targetId = $(this).data("target");
                    $(".option-content").hide();
                    $("#" + targetId).show();
                    $(".dropdown-content").hide();
                    
                    // Scroll back to the top of the page
                    $('html, body').animate({scrollTop: 0}, 'slow');
                });

                $("#dropdownLabel").click(function(){
                    $(".dropdown-content").toggle();
                });
            });
        </script>




    </script>
</body>
</html>

