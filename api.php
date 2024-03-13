<?php
session_start();

$DATA_RAW = file_get_contents("php://input");
$DATA_OBJ = json_decode($DATA_RAW);



$info = (object)[];

// checking if logged in
if (!isset($_SESSION['userid'])) {

   if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type != "login" && $DATA_OBJ->data_type != "sign-up") {
      $info->logged_in = false;
      echo json_encode($info);
      die;
   }
}
require_once("classes/autoload.php");

$DB = new Database();


$Error = "";
//PROCESS DATA
if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "sign-up") {

   //sign up
   include('include/signup.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "login") {
   //login up
   include('include/login.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "logout") {
   //logout
   include('include/logout.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "user_info") {
   //user info
   include('include/user_info.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "contacts") {
   //user info
   include('include/contacts.php');
} elseif (isset($DATA_OBJ->data_type) && ($DATA_OBJ->data_type == "chats" || $DATA_OBJ->data_type == "chats_refresh")) {
   //user info
   include('include/chats.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "settings") {
   //user info
   include('include/settings.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "save_settings") {
   //user info
   include('include/save_settings.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "send_message") {
   // send message
   include('include/send_message.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "delete_message") {
   // send message
   include('include/delete_message.php');
} elseif (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "delete_thread") {
   // send message
   include('include/delete_thread.php');
}

function message_left($data, $row)
{
   $image = ($row->gender == "Male") ? "img/user_male.png" : "img/user_female.png";
   if (file_exists($row->image)) {
      $image = $row->image;
   }
   $a =  "
   <div id='message_left'>
      <div></div>
              <img id='prof_img' src='$image' >
              <b> $row->username </b><br>
              $data->message<br><br>";
   if($data->files != "" && file_exists($data->files)){

      $a .=    "<img src='$data->files' style='width: 150px;cursor: pointer;' onclick='image_show(event)'><br>";
   }
      $a .=    " <span style='font-size: 11px;color: '>" . date("jS M Y H:i:s a", strtotime($data->date)) . "</span>
            <img id='trash' src='icon/trash.png' onclick='delete_message(event)' msgid='$data->id' >
      </div> ";
   return $a;
}

function message_right($data, $row)
{
   $image = ($row->gender == "Male") ? "img/user_male.png" : "img/user_female.png";
   if (file_exists($row->image)) {
      $image = $row->image;
   }
   $a = "
   <div id='message_right'>
      <div>";

   if ($data->seen) {
      $a .= "<img src='icon/trick.jpg' style='' >";
   } elseif ($data->received) {
      $a .= "<img src='icon/close-eye.png' style='' >";
   }


   $a .= "</div>
              <img id='prof_img' src='$image' style='float:right' >
              <b> $row->username </b><br>
              $data->message<br><br>";
              if($data->files != "" && file_exists($data->files)){
           
                 $a .=    "<img src='$data->files' style='width: 150px;cursor: pointer;' onclick='image_show(event)'><br>";
              }
                 $a .=    "<span style='font-size: 11px;color: '>" . date("jS M Y H:i:s a", strtotime($data->date)) . "</span>
              <img id='trash' src='icon/trash.png' onclick='delete_message(event)' msgid='$data->id' >
      </div>
   ";
   return $a;
}

function message_controls()
{

   return "
   </div>
   <span onclick='delete_thread(event)' style='color:gray;cursor:pointer'>Delete This Thread</span>
       <div style='display:flex;width:100%;height:40px'>
           <label for='message_file'><img src='icon/clip.jpg' style='opacity:0.8;width:30px;margin:5px;cursor:pointer;' ></label>
           <input type='file' id='message_file' name='file' style='display:none' onchange='send_image(this.files)' >
           <input id='message_text' onkeyup='enter_pressed(event)' style='flex:6;border:solid thin #ccc;border-bottom:none;font-size:14px;padding:4px' type='text' placeHolder='type your message'>
           <input style='flex:1;cursor:pointer' type='button' value='send' onclick='send_message(event)' >
       </div>
       </div>
   ";
}




// $DATA_RAW = file_get_contents("php://input");
// $DATA_OBJ = json_decode($DATA_RAW);


// // Process the data
// if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type === "sign-up") {
//     // Get the values from the POST data
//     $userid = generate_id(20); // You need to implement the generate_id function
//     $username = $DATA_OBJ->username;
//     $email = $DATA_OBJ->email;
//     $password = $DATA_OBJ->password;
//     // $image = "default_image.jpg"; // Default image path
//     $date = date("Y-m-d H:i:s");
//     // $online = 1; // Assuming user is online by default

//     // Construct the SQL query string
//     $query = "INSERT INTO users (userid, username, email, password, date) VALUES ('$userid', '$username', '$email', '$password',  '$date')";

//     // Execute the query
//     if ($connection->query($query) === TRUE) {
//         echo "Your profile was created";
//     } else {
//         echo "Failed to create profile: " . $connection->error;
//     }

// }

// Close the database connection
// $connection->close();
