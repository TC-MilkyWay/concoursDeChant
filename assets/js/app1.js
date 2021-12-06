let valider = document.getElementById("valider");

function submitForm() {
  let titre = $("#titre").val();
  let artiste = $("#artiste").val();
  $.post(
    "curl.php",
    { titre: titre, artiste: artiste },

    function (data) {
      $("#texte").html(data);
      // $("#myForm")[0].reset();
    }
  );
}

function writeValid(x) {
  var cell1 = document.getElementById("titre" + x).innerHTML;
  var cell2 = document.getElementById("artiste" + x).innerHTML;

  valider.value = cell1 + " - " + cell2;
}