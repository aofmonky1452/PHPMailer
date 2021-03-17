<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send PHPMailer</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form id="myForm" class="card">
        <div class="msg"></div>

        <h2>Contact us</h2>

        <div class="form-control">
            <p>Name</p>
            <input type="text" id="name" class="txt" placeholder="insert name">
        </div>

        <div class="form-control">
            <p>Email</p>
            <input type="text" id="email" class="txt" placeholder="insert email">
        </div>

        <div class="form-control">
            <p>Header</p>
            <input type="text" id="header" class="txt" placeholder="insert header">
        </div>

        <div class="form-control">
            <p>Detail</p>
            <textarea id="detail" class="txt txtarea" placeholder="insert detail"></textarea>
        </div>

        <button type="button" onclick="sendEmail()" value="Send an email" class="btn-submit">Send</button>
    </form>
    

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var header = $("#header");
            var detail = $("#detail");

            if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(header) && isNotEmpty(detail)) {
                $.ajax({
                    url: 'sendEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: name.val(),
                        email: email.val(),
                        header: header.val(),
                        detail: detail.val()
                    }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.msg').text("Message send successfully");
                    }
                });
            }
        }

        function isNotEmpty(caller) {
            if(caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            }
            else caller.css('border', '');

            return true;
        }



    </script>
</body>
</html>