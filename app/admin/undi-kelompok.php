<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Random User Card</title>
    <!-- Font Awesome Icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <style>
        #container {
            width: 1500px;
            margin: 50px auto;
            padding: 20px;
            width: 50%;
            max-height: 800px;
        }

        #container h2 {
            text-align: center;
            color: #045;
        }

        #quoteContainer {
            width: 75%;
            background: #fff;
            padding: 10px;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>Undian Arisan</h2>

        <div class="buttonContainer">
            <button type="button" id="quoteButton">Get Random User</button>
        </div>
        <div class="quoteContainer"></div>
        <p></p>
        <div class="quoteAuthor"></div>

    </div>
    <!-- Script -->
    <script stype="text/javascript">
        $(document).ready(function() {
            $("button").click(function() {

                $.ajax({
                    type: 'POST',
                    data: ({
                        tag: 'id_kelompok'
                    }),
                    url: 'json.php',
                    success: function(data) {
                        var obj = JSON.parse(data['nama_user']);
                        $("#quoteContainer").html(obj.nama_user)
                        $("#quoteAuthor").html(obj.nama_kelompok)
                    }
                });
            });
        });
    </script>
</body>

</html>