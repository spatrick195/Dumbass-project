w3.hide('#players');
w3.hide('#no-players');
w3.hide('#update-player-card');
w3.hide('#add-player-card');

hasPlayers();

function hasPlayers() {
  w3.getHttpObject(`/admin/has_players?team=${team}`, displayPlayerOption);
}

function displayPlayerOption(data) {
  if (data === true) {
    getPlayers();
  } else {
    w3.show("#no-players");
    w3.hide('#players');
    w3.hide('#team');
    w3.hide('#no-team');
  }
}

function getPlayers() {
  w3.getHttpObject(`/admin/players?team=${team}`, displayPlayers);
}

function displayPlayers(data) {
  w3.displayObject("players", data);
  w3.show("#players");
  w3.hide("#no-players");
  w3.hide("#team");
  w3.hide("#no-team");
}

function displayAddPlayerForm() {
  w3.show("#add-player-card");
}

function addPlayer() {
  const formData = new FormData(document.getElementById("add-form"));
  const elements = document.forms["add-form"].elements;
  var unfilled = 0;
  for (i = 0; i < elements.length; i++) {
    if (elements[i].value.length === 0) {
      unfilled++;
    }
  }
  if (unfilled === 0) {
    const addForm = document.getElementById("add-form");
    const formData = new FormData(addForm);
    fetch("/admin/add_player", {
        method: "post",
        body: formData
      })
      .then(response => {
        hasPlayers();
        addForm.reset();
      })
  }
}

function closeAddPlayerForm() {
  w3.hide("#add-player-card")
}

function deletePlayer(event) {
  if (event.target.getAttribute("data-id") !== null) {
    id = event.target.getAttribute("data-id");
    player = event.target.getAttribute("data-name");
  }
  if (confirm(`Are you sure want to delete ${player}?`)) {
    w3.getHttpObject(`/admin/delete_player?=${id}`, hasPlayers);
  }
  closeUpdatePlayerForm();
}

function updatePlayer() {

}

function closeUpdatePlayerForm() {
  w3.hide("#update-player-card")
}