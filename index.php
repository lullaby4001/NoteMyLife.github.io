<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/current_day.css">
    <link rel="stylesheet" href="css/calendar.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/portrait.css">
    <link rel="icon" href="images/deer.png" type="image/png" sizes="72×72" />

    <title>Note My Life</title>

</head>
<style media="screen">

</style>

<body>
<?php
      $connection = mysqli_connect("localhost", "yen", "yen88599pp", "notemylife"); //You need to create a database and authorized user first using phpMyAdmin utility.
      if(!$connection){
          die("There was an error connecting to the database.");
      }
      function setTheme(){
          global $connection;
          $query = "SELECT * FROM theme";
          $result = mysqli_query($connection, $query);
          if(!$result){
              die("Something went wrong.. derp");
          }

          while($row = mysqli_fetch_assoc($result)){
              return $row['cur_theme'];
          }
      }
      function db_updateTheme($newTheme){
          global $connection;
          $query = "UPDATE theme SET cur_theme = '$newTheme' WHERE id = 1";
          $result = mysqli_query($connection, $query);
          if(!$result){
              die("Query failed: " . mysqli_error($connection));
            }
          }
      if(isset($_POST['color'])){
        db_updateTheme($_POST['color']);
      }
  ?>

    <div id="current-day-info" class="color">
        <h1 id="app-name-landscape" class="off-color default-cusor center">Note My Life</h1>
        <div>
            <h2 id="cur-year" class="current-day-heading default-cusor center">2019</h2>
        </div>
        <div class="">
            <h1 id="cur-day" class="current-day-heading default-cusor center">Wednesday</h1>
            <h1 id="cur-month" class="current-day-heading default-cusor center">May</h1>
            <h1 id="cur-date" class="current-day-heading default-cusor center">14</h1>
        </div>
        <div class="">
            <button id="theme-landscape" class="button font color" onclick="open_fav_color();">Change Theme</button>
        </div>
    </div>

    <div id="calendar">
        <h1 id="app-name-portrait" class="center off-color">My Calendar</h1>
        <table>
            <thead class="color">
                <tr>
                    <th colspan="7" class="border-color">
                        <h4 id="cal-year">2019</h4>
                        <div>
                            <i class="fas fa-caret-left icon" onclick="previousMonth();"></i>
                            <h3 id="cal-month">May</h3>
                            <i class="fas fa-caret-right icon" onclick="nextMonth();"></i>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th class="weekday border-color">Sun</th>
                    <th class="weekday border-color">Mon</th>
                    <th class="weekday border-color">Tue</th>
                    <th class="weekday border-color">Wed</th>
                    <th class="weekday border-color">Thu</th>
                    <th class="weekday border-color">Fri</th>
                    <th class="weekday border-color">Sat</th>
                </tr>
            </thead>

            <tbody id="table-body" class="border-color">
                <tr>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                </tr>

                <tr>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td class="tooltip" onclick="dayClicked(this);">1 <img src="images/note1.png" alt="記事資料"><span>這是提示！！！</span></td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                </tr>

                <tr>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td id="current-day" onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                </tr>

                <tr>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                </tr>

                <tr>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                </tr>

                <tr>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                    <td onclick="dayClicked(this);">1</td>
                </tr>
            </tbody>
        </table>
        <button id="theme-portrait" class="button font color" onclick="open_fav_color();">Change Theme</button>
    </div>
    <dialog id="modal">
        <div id="fav-color" hidden>
            <div class="popup">
                <h4 class="center">What's your favorite color?</h4>
                <div id="color-options">
                    <div class="color-option">
                        <div class="color-preview" id="red" style="background-color: #b27777;" onclick="addCheckMark('red');"></div>
                        <h5>絳紗</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="orange" style="background-color: #e8b004;" onclick="addCheckMark('orange');"></div>
                        <h5>谷黃</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="green" style="background-color: #223e36;" onclick="addCheckMark('green');"></div>
                        <h5>蒼綠</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="blue" style="background-color: #144674;" onclick="addCheckMark('blue');"><i class="fas fa-check checkmark"></i></div>
                        <h5>鷃藍</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="purple" style="background-color: #681752;" onclick="addCheckMark('purple');"></div>
                        <h5>牽牛紫</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="black" style="background-color: #685e48;" onclick="addCheckMark('black');"></div>
                        <h5>燕羽灰</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="cerise" style="background-color: #e3adb9;" onclick="addCheckMark('cerise');"></div>
                        <h5>海天霞</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="deep-orange" style="background-color: #f9d17b;" onclick="addCheckMark('deep-orange');"></div>
                        <h5>麥芽糖黃</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="lime" style="background-color: #869d9d;" onclick="addCheckMark('lime');"></div>
                        <h5>蟹青</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="baby-blue" style="background-color: #66a9c9;" onclick="addCheckMark('baby-blue');"></div>
                        <h5>澗石藍</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="pink" style="background-color: #8076a3;" onclick="addCheckMark('pink');"></div>
                        <h5>藤蘿紫</h5>
                    </div>
                    <div class="color-option">
                        <div class="color-preview" id="teal" style="background-color: #7a7374;" onclick="addCheckMark('teal');"></div>
                        <h5>鋅灰</h5>
                    </div>
                </div>
                <button id="update-theme-button" class="button font" onclick="change_color();">Update</button>
            </div>
        </div>
        <div id="make-note" hidden>
            <div class="popup">
                <h4>Add a note to the calendar</h4>
                <textarea id="edit-post-it" class="font" name="post-it" autofocus></textarea>
                <div>
                    <button class="button font post-it-button" id="add-post-it" onclick="submitPostIt();">Post It</button>
                    <button class="button font post-it-button" id="delete-button" onclick="deleteNote();">Delete It</button>
                </div>
            </div>
    </dialog>
    <script type="text/javascript" src="js/updateData.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/main.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    
    <script language = "JavaScript">
    currentColor.name = <?php echo(json_encode(setTheme())); ?> ; //js_encode將回傳的資料包裝成JSON編碼字串，指定給currentColor.name
    var today = new Date();
    var thisMonth = today.getMonth(); console.log(thisMonth);
    var thisYear = today.getFullYear(); console.log(thisYear);
    updateDate();
    fillInMonth();
    </script>
</body>

</html>