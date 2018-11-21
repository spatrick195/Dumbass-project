<?php
if (!isset($_SESSION["loggedin"]) && !($_SESSION["loggedin"])) {
    unset($_SESSION['message']);
    header("Location: /login_form");
}
// var_dump($_SESSION{club});
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Team Admin Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/assets/css/styles.css">
        <link rel="stylesheet" href="/assets/css/team_styles.css">
        <script>
            var team = '<?php echo $_SESSION["club"] ?>'
        </script>
    </head>

    <body>
        <nav class="w3-bar w3-flat-concrete w3-border-bottom w3-margin-bottom">
            <a href="/admin/team_dashboard" class="w3-bar-item w3-button">
                <strong><?php echo $_SESSION["club"] ?> Team Admin Dashboard</strong>
            </a>
            <div class="w3-dropdown-hover w3-right">
                <button class="w3-button">Team Admin</button>
                <div class="w3-dropdown-content w3-bar-block w3-w3-card-4 ">
                    <a href="/admin/profile" class="w3-bar-item w3-button">My Profile</a>
                    <a href="/logout" class="w3-bar-item w3-button">Logout</a>
                </div>
            </div>
        </nav>
        <div id="container">
            <div id="left">
                <ul class="w3-ul">
                    <li onclick="hasPlayers()" data-team="<?php echo $_SESSION["club"] ?>
                        "><i class="fa fa-table"></i> Players</li>
                </ul>
            </div>
            <div id="mid">
                <div id="players">
                    <div class="w3-bar w3-black">
                        <div class="w3-bar-item">Players</div>
                    </div>
                    <div class="w3-card w3-center">
                        <table class="w3-table-all">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Age</th>
                                <th class="w3-right-align"><a href="#" class="w3-bar-item w3-button w3-blue w3-tiny w3-round"
                                        onclick="displayAddPlayerForm()"><i class="fa fa-plus" aria-hidden="true"></i>
                                        Add Player</a></th>
                            </tr>
                            <tr w3-repeat="data">
                                <td>{{name}}</td>
                                <td>{{position}}</td>
                                <td>{{weight}}</td>
                                <td>{{height}}</td>
                                <td>{{age}}</td>

                                <td class="w3-right-align">
                                    <a href="#" class="w3-bar-item w3-button w3-green w3-tiny w3-round" onclick="getPlayer(event)"
                                        data-id="{{id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a href="#" class="w3-bar-item w3-button w3-red w3-tiny w3-round"
                                        onclick="deletePlayer(event)"
                                        data-id="{{id}}" data-name="{{name}}"><i class="fa fa-times" aria-hidden="true"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div id="no-players">
                    <div class="w3-bar w3-black">
                        <div class="w3-bar-item">Players</div>
                    </div>
                    <table class="w3-table-all">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Weight</th>
                            <th>Height</th>
                            <th>Age</th>
                            <th class="w3-right-align"><a href="#" class="w3-bar-item w3-button w3-blue w3-tiny w3-round"
                                    onclick="displayAddPlayerForm()"><i class="fa fa-plus" aria-hidden="true"></i> Add Player</a> </th>
                        </tr>
                        <tr>
                            <td colspan="6" class="w3-center">No players yet</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="right">

                <div id="player-details">
                    <!-- ADD PLAYER FORM -->
                    <div class="w3-card add-player" id="add-player-card">
                        <div class="w3-bar w3-blue">
                            <div class="w3-bar-item">Player Details</div>
                            <a href="#" class="w3-bar-item w3-button w3-right" onclick="closeAddPlayerForm()"><i class="fa fa-times"
                                    aria-hidden="true"></i></a>
                        </div>
                        <form class="w3-container" onsubmit="event.preventDefault();" id="add-form">

                            <input class="w3-input w3-border" name="team" type="hidden" value="<?php echo $_SESSION['club'] ?>">

                            <p>
                                <label>Player Name</label>
                                <input class="w3-input w3-border" name="name" type="text"  required>
                            </p>
                            <p>
                                <label>Position</label><br>
                                <select name="position" required>
                                    <option value="" selected disabled>Select one...</option>
                                    <option value="Center">Center</option>
                                    <option value="First-five">First-five</option>
                                    <option value="Flanker(6)">Flanker(6)</option>
                                    <option value="Flanker(7)">Flanker(7)</option>
                                    <option value="Flanker(8)">Flanker(8)</option>
                                    <option value="Fullback">Fullback</option>
                                    <option value="Halfback">Halfback</option>
                                    <option value="Hooker">Hooker</option>
                                    <option value="Loosehead-Prop">Loosehead-Prop</option>
                                    <option value="Prop">Prop</option>
                                    <option value="Tighthead-Prop">Tighthead-Prop</option>
                                    <option value="Wing">Wing</option>
                                </select>
                            </p>
                            <p>
                                <label>Image Name</label>
                                <input class="w3-input w3-border" name="image" type="text" value="player_brown.png"  required>
                            </p>
                            <p>
                                <label>Height</label>
                                <input class="w3-input w3-border" name="height" type="text" required>
                            </p>
                            <p>
                                <label>Weight</label>
                                <input class="w3-input w3-border" name="weight" type="text" required>
                            </p>
                            <p>
                                <label>Age</label>
                                <input class="w3-input w3-border" name="age" type="text"  required>
                            </p>
                            <p>
                                <button class="w3-button w3-block w3-black" onclick="addPlayer()" value="add" name="abc">Add
                                    Player</button>
                            </p>
                        </form>
                    </div>
                    <!-- UPDATE PLAYER FORM -->
                    <div class="w3-card update-player" id="update-player-card">
                        <div class="w3-bar w3-green">
                            <div class="w3-bar-item">Edit Player Details</div>
                            <a href="#" class="w3-bar-item w3-button w3-right" onclick="closeUpdatePlayerForm()"><i
                                    class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <form class="w3-container" w3-repeat="data" onsubmit="event.preventDefault();" id="update-form">

                            <input type="hidden" class="w3-input w3-border" name="id" value="{{id}}" id="id">

                            <input class="w3-input w3-border" name="team" type="hidden" value="{{team}}" id="team">

                            <p>
                                <label>Player Name</label>
                                <input class="w3-input w3-border" name="name" type="text" value="{{name}}" id="name">
                            </p>

                            <p>
                                <label>Position</label>
                                <input class="w3-input w3-border" name="position" type="text" value="{{position}}" id="position">
                            </p>
                            <p>
                                <label>Image Name</label>
                                <input class="w3-input w3-border" name="image" type="text" value="{{image}}" id="image">
                            </p>
                            <p>
                                <label>Height</label>
                                <input class="w3-input w3-border" name="height" type="text" value="{{height}}" id="height">
                            </p>
                            <p>
                                <label>Weight</label>
                                <input class="w3-input w3-border" name="weight" type="text" value="{{weight}}" id="weight">
                            </p>
                            <p>
                                <label>Age</label>
                                <input class="w3-input w3-border" name="age" type="text" value="{{age}}" id="age">
                            </p>
                            <p>
                                <button class="w3-button w3-block w3-black" onclick="updatePlayer()">Update Player</button>
                            </p>
                        </form>
                    </div>
                    <!-- <div class="w3-card">
                        <form method="post" enctype="multipart/form-data" id="upload-form">
                        <input type="file" name="files[]" multiple>
                        <input type="submit" value="Upload File" name="submit">
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
        </div>

        <script src="https://www.w3schools.com/lib/w3.js"></script>
        <script src="/assets/js/team_admin.js"></script>
    </body>

</html>