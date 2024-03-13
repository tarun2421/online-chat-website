<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="util.css">
    <link rel="stylesheet" href="javas.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Chat Online </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <style>
        .wrapper{
    max-width: 900px;
    min-height: 500px;
    display: flex;
    margin: auto;
    color: white;
}
        .wrapper {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13px;
        }

        .profile-img {
            width: 50%;
            border: solid thin rgb(250, 113, 113);
            border-radius: 100%;
            margin: 10px;

        }

        .l-pannel label {
            width: 100%;
            height: 50px;
            display: block;
            background-color: rgb(108, 111, 112);
            border-bottom: solid thin #ffffff55;
            cursor: pointer;
            padding: 5px;
            transition: all 0.2s ease 0.5s;
        }

        .l-pannel label:hover {
            color: black;
            background-color: rgb(243, 246, 249);

        }

        #radio-con:checked~.i-r-pannel {
            flex: 0;
        }

        #radio-set:checked~.i-r-pannel {
            flex: 0;
        }

        .i-r-pannel {
            transition: all 2s ease;
        }

        .l-pannel label img {
            float: right;
            width: 25px;

        }

        .l-pannel {
            padding: 10px;

        }

        .i-l-pannel {
            text-align: center;
        }

        form {
            margin: auto;
            padding: 10px;
            width: 100%;
            max-width: 400px;
        }

        input[type=text],
        input[type=password],
        input[type=submit] {
            padding: 10px;
            margin: 10px;
            width: 98%;
            border: solid 1px gray;
            border-radius: 5px;
        }

        input[type=submit] {
            padding: 10px;
            cursor: pointer;
            background-color: rgb(178 201 212);
            color: black;
        }
        input[type=submit]:hover {
            
            background-color: rgb(150 169 178);
            
        }

        input[type=radio] {
            transform: scale(1.1);
            cursor: pointer;
        }

        .header {
            background-color: rgb(140 207 233);
            color: black;
            height: 100px;
            font-size: 50px;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            width: 100%;
            font-family: "Madimi One", sans-serif;
  font-weight: 400;
  font-style: normal;
        }
        #error{
            text-align: center;
            padding: 0.5em;
            background-color: #ecaf91;
            color: white;
            display: none;
        }
    </style>
</head>

<body >
    <div class="wrapper" style="display: block;">
       <div class="header">
          My Chat
          <div style="font-size: 20px;">Login</div>
       </div>
       <div id="error"style="">text</div>
        <form id="myform">
            <input type="text" name="email" placeholder="Email"><br>
            
            <input type="password" name="password" placeholder="password"><br>

            <input type="submit" id="login_button" name="" placeholder="" value="Login">
            <a href="signup.php" style="display: block;text-align: center;text-decoration: none;">
                Don't have a account? Sign Up here.
            </a>
        </form>
    </div>
</body>

</html>
<script type="text/javascript">
    function _(element) {
        return document.getElementById(element);
    }
    var sign_b = _("login_button");
    sign_b.addEventListener("click",collect_data);

    function collect_data(e){

        e.preventDefault();
        sign_b.disabled = true;
        sign_b.value = "Loading...Please wait..";
        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");

        var data = {};

        for(var i = inputs.length - 1; i >=0; i--){
           var key = inputs[i].name; 

           switch(key){
           
            case "email":
                data.email = inputs[i].value;
                break;

            case "password":
                data.password = inputs[i].value;
                break;
           
           }
        }
        send_data(data,"login");
        
    }
   
    function send_data(data,type){
        var xml = new XMLHttpRequest();
        
        xml.onload = function(){
            if(xml.readyState == 4 || xml.status == 200){
                handle_result(xml.responseText);
                sign_b.disabled = false;
                sign_b.value = "Login";
            }
        }
        data.data_type = type;
        var data_string = JSON.stringify(data);

        xml.open("POST", "api.php", true);
        xml.send(data_string);
            
    }
    function handle_result(result){
        var data = JSON.parse(result);
        if(data.data_type == "info"){
            window.location = "index.php";
        }else{
            var error = _("error");
            error.innerHTML = data.message;
            error.style.display = "block";
        }
    }

</script>