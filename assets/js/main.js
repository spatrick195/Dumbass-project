document.addEventListener("DOMContentLoaded", function() {
    w3.hide("#grid-container");
    w3.hide("#team");
    w3.hide("#player");
    w3.slideshow(".game", 5000);
    w3.getHttpObject("/api/teams", displayTeams);
});

function displayTeams(data) {
    w3.displayObject("team-menu", data);
}

function getPlayers(event) {
    // alert();
    w3.hide("#trophy")
    let team = event.target.getAttribute("data-team");
    w3.getHttpObject(`/api/players?team=${team}`, displayPlayers);
    w3.getHttpObject(`/api/team?team=${team}`, displayTeam);
}

function displayPlayers(data) {
    w3.hide(".slider");
    w3.displayObject("card-grid", data);
    w3.show("#grid-container");
    return;
}

function displayTeam(data) {
    w3.hide("#trophy")
    w3.hide("#player");
    w3.displayObject("aside", data);
    w3.show("#team");
    
}
function getPlayer(event) {
    w3.hide("#team");
    let id = event.target.getAttribute("data-player-id");
    w3.getHttpObject(`/api/player?id=${id}`, displayPlayer);
}

function displayPlayer(data) {
    // alert();
    w3.hide("#team")
    w3.displayObject("aside", data);
    w3.show("#player");
    return;
}