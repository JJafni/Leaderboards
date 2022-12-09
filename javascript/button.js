const input = () => {
    if (document.getElementById("p1username").value === "") {
        document.getElementById('p1').disabled = true;
        document.getElementById('p1').value = "Player 1";
    } else {
        document.getElementById('p1').disabled = false;
        document.getElementById('p1').value = document.getElementById("p1username").value;
    }

    if (document.getElementById("p2username").value === "") {
        document.getElementById('p2').disabled = true;
        document.getElementById('p2').value = "Player 2";
    } else {
        document.getElementById('p2').disabled = false;
        document.getElementById('p2').value = document.getElementById("p2username").value;
    }
}