<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <title>Chat Online </title>
    <style>
        body{
            background-color: #444;
        }
        .flex {
            display: flex;
        }

        .block {
            display: block;
        }

        .img {
            width: 80%;
            border: solid thin white;
            border-radius: 50%;
            margin: 10px;
        }

        .wrapper {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13px;
            max-width: 900px;
            min-height: 500px;
            max-height: 630px;
            display: flex;
            margin: auto;
            color: white;
        }

        .l-pannel {
            min-height: 400px;
            width: 100px;
            background-color: #111;
            flex: 1;
            text-align: center;
            padding: 10px;
        }

        .r-pannel {
            min-height: 400px;
            width:700px;
            background-color: white;
            flex: 4;
            text-align: center;
        }

        .header {
            background-color: rgb(140 207 233);
            color: #111;
            height: 70px;
            font-size: 50px;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            position: relative;
            font-family: "Madimi One", sans-serif;
  font-weight: 400;
  font-style: normal;
        }

        .i-l-pannel {
            background-color: rgb(178 201 212);
            flex: 1;
            text-align: center;
            min-height: 430px;
            height: 530px;
        }

        .i-r-pannel {
            background-color: #ffffff;
            flex: 2;
            min-height: 430px;
            transition: all 0.5s ease;
            height: 530px;
        }


        #profile_image {
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
            transition: all 0.1s ease 0.2s;
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

        .l-pannel label img {
            float: right;
            width: 25px;

        }


        #contact {
            width: 100px;
            height: 120px;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
        }

        #contact img {
            width: 100px;
            height: 100px;
        }

        #active_contact {

            height: 70px;
            margin: 10px;
            border: solid thin black;
            padding: 5px;
            background-color: #eee;
            color: #444;
        }

        #active_contact img {
            width: 70px;
            height: 70px;
            float: left;
            margin: 2px;
        }

        #message_left {

            
            margin: 10px;
            padding: 2px;
            padding-right: 10px;
            background-color: rgb(108, 111, 112);
            color: white;
            float: left;
            box-shadow: 0px 0px 10px #aaa;
            border-bottom-left-radius: 30%;
            border-top-right-radius: 10%;
            position: relative;
            width: 60%;
            min-width: 200px;
        }

        #message_left #prof_img {
            width: 50px;
            height: 50px;
            float: left;
            margin: 2px;
            border-radius: 50%;
            border: solid 3px white;
        }

        #message_left div {
            width: 20px;
            height: 20px;
            background-color: #5b68e4;
            border: solid 1px #eee;
            border-radius: 50%;
            position: absolute;
            left: -10px;
            top: 20px;
        }

        #message_right {

            
            margin: 10px;
            padding: 2px;
            padding-right: 10px;
            background-color: #d8f9da;
            color: #444;
            float: right;
            box-shadow: 0px 0px 10px #aaa;
            border-bottom-right-radius: 30%;
            border-top-left-radius: 10%;
            position: relative;
            width: 60%;
            min-width: 200px;
        }

        #message_right #prof_img {
            width: 50px;
            height: 50px;
            float: left;
            margin: 3px;
            border-radius: 50%;
            border: solid 3px rgb(108, 111, 112);
        }

        #message_right div img {
            width: 18px;
            height: 18px;
            float: none;
            margin: 0.5px;
            border-radius: 50%;
            border: none;
        }

        #message_right #trash {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 2px;
            left: -10px;
            cursor: pointer;
        }

        #message_left #trash {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 2px;
            right: -10px;
            cursor: pointer;
        }

        #message_right div {
            width: 20px;
            height: 20px;
            background-color: purple;
            border: solid 1px #eee;
            border-radius: 50%;
            position: absolute;
            right: -10px;
            top: 20px;
        }

        .loader_on {
            position: absolute;
            width: 30%;
        }

        .loader_off {
            display: none;
        }
        .image_on {
            position: absolute;
            height: 450px;
            width: 450px;
            background-color: ;
            margin: auto;
            z-index: 10;
            top: 50px;
            left: 50px;
        }

        .image_off {
            display: none;
        }
        
    </style>
</head>

<body>
    <div class="wrapper flex">

        <div class="l-pannel">
            <div id="user_info">


                <img src="img/user.png" id="profile_image" style="height: 100px;width: 100px">

                <br>
                <span id="username">Username</span>
                <br>
                <span id="email" style="font-size: 12px;opacity: 0.5;">email@gmail.com</span>
                <br>
                <div class="" style="margin-top:20px">

                    <label id="l-chat" for="radio-chat">Chat <img class="img" src="icon/people.jpg" alt=""></label>
                    <label id="l-con" for="radio-con">Contacts<img class="img" src="icon/contacts.png" alt=""></label>
                    <label id="l-set" for="radio-set">Settings<img class="img" src="icon/setting1.jpg" alt=""></label>
                    <label id="Logout" for="radio-out">Logout<img class="img" src="icon/logout.png" alt=""></label>
                </div>
            </div>

        </div>
        <div class="r-pannel">

            <div class="header" style="position: relative;">
                <div id="loader_holder" class="loader_on"><img style="width: 70px;margin: 0px;" src="icon/loader.gif" alt=""></div>
                <div id="image_viewer" class="image_off" onclick="close_image(event)"></div>
                My Chat
            </div>
            <div class="container flex">
                <div id="i-l-pannel" class="i-l-pannel">

                </div>
                <input type="radio" id="radio-chat" name="myradio" style="display: none;">
                <input type="radio" id="radio-con" name="myradio" style="display: none;">
                <input type="radio" id="radio-set" name="myradio" style="display: none;">
                <div id="i-r-pannel" class="i-r-pannel"></div>

            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    var sent_audio = new Audio("message_send.mp3");
    var received_audio = new Audio("message_received.mp3");
    var CURRENT_CHAT_USER = "";
    var SEEN_STATUS = false;

    function _(element) {
        return document.getElementById(element);
    }

    var label_contacts = _("l-con");
    label_contacts.addEventListener("click", get_contacts);
    var label_chats = _("l-chat");
    label_chats.addEventListener("click", get_chats);
    var label_settings = _("l-set");
    label_settings.addEventListener("click", get_settings);
    var logout = _("Logout");
    logout.addEventListener("click", logout_user);

    function get_data(find, type) {

        var xml = new XMLHttpRequest();
        var loader_holder = _('loader_holder');
        loader_holder.className = 'loader_on';
        xml.onload = function() {
            if (xml.readyState == 4 || xml.status == 200) {
                // alert(xml.responseText);
                loader_holder.className = 'loader_off';
                handle_result(xml.responseText, type);
            }
        }
        var data = {};
        data.find = find;
        data.data_type = type;
        data = JSON.stringify(data);

        xml.open("POST", "api.php", true);
        xml.send(data);
    }

    function handle_result(result, type) {
        // alert(result);
        if (result.trim() != "") {
            var i_r_pannel = _("i-r-pannel");
            i_r_pannel.style.overflow = "visible";

            var obj = JSON.parse(result);
            if (typeof(obj.logged_in) != "undefined" && !obj.logged_in) {
                window.location = "login.php";
            } else {

                switch (obj.data_type) {
                    case "user_info":
                        var username = _("username");
                        var email = _("email");
                        var profile_image = _("profile_image");

                        username.innerHTML = obj.username;
                        email.innerHTML = obj.email;
                        profile_image.src = obj.image;
                        break;
                    case "contacts":
                        var i_l_pannel = _("i-l-pannel");

                        i_r_pannel.style.overflow = "hidden";
                        i_l_pannel.innerHTML = obj.message;

                        break;
                    case "chats_refresh":
                        SEEN_STATUS = false;
                        var messages_holder = _("message_holder");

                        messages_holder.innerHTML = obj.messages;
                        if (typeof obj.new_message != 'undefined') {
                            if (obj.new_message) {
                                received_audio.play();
                                setTimeout(function() {
                                    messages_holder.scrollTo(0, messages_holder.scrollHeight);
                                    var message_text = _("messages_text");
                                    message_text.focus();
                                }, 100);
                            }
                        }
                        
                        
                        break;

                    case "send_message":
                        sent_audio.play();
                    case "chats":
                        SEEN_STATUS = false;
                        var i_l_pannel = _("i-l-pannel");

                        i_l_pannel.innerHTML = obj.user;
                        i_r_pannel.innerHTML = obj.messages;

                        var messages_holder = _("message_holder");
                        setTimeout(function() {
                            messages_holder.scrollTo(0, messages_holder.scrollHeight);
                            var message_text = _("message_text");
                            message_text.focus();
                        }, 100);

                        if (typeof obj.new_message != 'undefined') {
                            if (obj.new_message) {
                                received_audio.play();
                            }
                        }

                        break;

                    case "settings":
                        var i_l_pannel = _("i-l-pannel");

                        i_l_pannel.innerHTML = obj.message;

                        break;
                    case "send_image":
                        alert(obj.message);
                        break;
                    case "save_settings":

                        alert(obj.message);
                        get_data({}, "user_info");
                        get_settings(true);
                        break;

                }
            }
        }


    }

    function logout_user() {
        var answer = confirm("Are you sure you want to log out??");
        if (answer) {

            get_data({}, "logout");
        }
    }
    get_data({}, "user_info");
    get_data({}, "contacts");

    var radio_contacts = _("radio-con");
    radio_contacts.checked = true;

    function get_contacts(e) {
        get_data({}, "contacts");
    }

    function get_chats(e) {
        get_data({}, "chats");
    }

    function get_settings(e) {
        get_data({}, "settings");
    }

    function send_message(e) {
        var message_text = _("message_text");
        if (message_text.value.trim() == "") {
            alert("please type something to send");
            return;
        }

        get_data({
            message: message_text.value.trim(),
            userid: CURRENT_CHAT_USER

        }, "send_message");
        if (event.key === "Enter") {
            message_text.value = "";
        }

    }

    function enter_pressed(e) {
        if (e.keyCode == 13) {
            send_message(e);
        }
        SEEN_STATUS = true;
    }

    setInterval(function() {
        var radio_chat = _("radio-chat");
        var radio_contacts = _("radio-con");
        if (CURRENT_CHAT_USER != "" && radio_chat.checked) {

            get_data({
                userid: CURRENT_CHAT_USER,
                seen: SEEN_STATUS
            }, "chats_refresh");
        }
        if (radio_contacts.checked) {

            get_data({}, "contacts");
        }
    }, 5000);

    function set_seen(e) {
        SEEN_STATUS = true;
    }

    function delete_message(e) {
        if (confirm("Are you sure you want to delete this message??")) {
            var msgid = e.target.getAttribute("msgid");
            get_data({
                rowid: msgid
            }, "delete_message");

            get_data({
                userid: CURRENT_CHAT_USER,
                seen: SEEN_STATUS
            }, "chats_refresh");
        }
    }

    function delete_thread(e) {
        if (confirm("Are you sure you want to delete this thread??")) {

            get_data({
                userid: CURRENT_CHAT_USER
            }, "delete_thread");

            get_data({
                userid: CURRENT_CHAT_USER,
                seen: SEEN_STATUS
            }, "chats_refresh");
        }
    }
</script>

<script type="text/javascript">
    function collect_data(e) {

        var save_settings_button = _("save_settings_button");
        e.preventDefault();
        save_settings_button.disabled = true;
        save_settings_button.value = "Loading...Please wait..";
        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");

        var data = {};

        for (var i = inputs.length - 1; i >= 0; i--) {
            var key = inputs[i].name;

            switch (key) {

                case "username":
                    data.username = inputs[i].value;
                    break;
                case "email":
                    data.email = inputs[i].value;
                    break;
                case "gender":
                    if (inputs[i].checked) {
                        data.gender = inputs[i].value;
                    }
                    break;

                case "password":
                    data.password = inputs[i].value;
                    break;
                case "password2":
                    data.password2 = inputs[i].value;
                    break;

            }
        }
        send_data(data, "save_settings");

    }

    function send_data(data, type) {
        var xml = new XMLHttpRequest();

        xml.onload = function() {
            if (xml.readyState == 4 || xml.status == 200) {
                handle_result(xml.responseText);
                var save_settings_button = _("save_settings_button");
                save_settings_button.disabled = false;
                save_settings_button.value = "sign-up";
            }
        }
        data.data_type = type;
        var data_string = JSON.stringify(data);

        xml.open("POST", "api.php", true);
        xml.send(data_string);

    }

    function upload_profile_image(files) {

        var filename = files[0].name;
        var ext_start = filename.lastIndexOf(".");
        var ext = filename.substr(ext_start + 1,3);
        if(!(ext == "jpg" || ext == "JPG")){
            alert("This file type is not allowed.");
            return;
        }

        var change_image_button = _("change_image_button");
        change_image_button.disabled = false;
        change_image_button.innerHTML = "Uploading Image...";

        var myform = new FormData();
        var xml = new XMLHttpRequest();

        xml.onload = function() {
            if (xml.readyState == 4 || xml.status == 200) {
                //alert(xml.responseText);
                get_data({}, "user_info");
                get_settings(true);
                change_image_button.disabled = false;
                change_image_button.innerHTML = "Change Image";
            }
        }
        myform.append('file', files[0]);
        myform.append('data_type', "change_profile_image");

        xml.open("POST", "uploader.php", true);
        xml.send(myform);
    }

    function handle_drag_and_drop(e) {
        if (e.type == "dragover") {
            e.preventDefault();
            e.target.className = "dragging";
        } else if (e.type == "dragleave") {
            e.target.className = "";
        } else if (e.type == "drop") {
            e.preventDefault();
            e.target.className = "";

            upload_profile_image(e.dataTransfer.files)
        } else {
            e.target.className = "";
        }
    }

    function start_chat(e) {
        var userid = e.target.getAttribute("userid");
        if (e.target.id == "") {
            var userid = e.target.parentNode.getAttribute("userid");
        }
        CURRENT_CHAT_USER = userid;

        var radio_chat = _("radio-chat");
        radio_chat.checked = true;
        get_data({
            userid: CURRENT_CHAT_USER
        }, "chats");

    }

    function send_image(files) {
        var filename = files[0].name;
        var ext_start = filename.lastIndexOf(".");
        var ext = filename.substr(ext_start + 1,3);
        if(!(ext == "jpg" || ext == "JPG")){
            alert("This file type is not allowed.");
            return;
        }

        var myform = new FormData();
        var xml = new XMLHttpRequest();

        xml.onload = function() {
            if (xml.readyState == 4 || xml.status == 200) {
                handle_result(xml.responseText,"send_image");
                get_data({
                    userid: CURRENT_CHAT_USER,
                    seen: SEEN_STATUS
                }, "chats_refresh");

            }
        }
        myform.append('file', files[0]);
        myform.append('data_type', "send_image");
        myform.append('userid',CURRENT_CHAT_USER);

        xml.open("POST", "uploader.php", true);
        xml.send(myform);
    }

    function close_image(e){
        e.target.className = "image_off";
    }
    function image_show(e){
        var image = e.target.src;
        var image_viewer = _("image_viewer");

        image_viewer.innerHTML = "<img src='"+image+"' style='width:100%' >";
        image_viewer.className = "image_on";  
    }
</script>