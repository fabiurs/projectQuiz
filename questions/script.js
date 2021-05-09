
document.querySelectorAll('.btn-delete').forEach(singleBtn => {
    singleBtn.addEventListener('click', event => {
      var newid = new String(singleBtn.id);
      newid = "q" + newid.slice(1, newid.length);

      if(confirm("Are you sure you want to delete this question?")){
        var qContainer = document.getElementById(""+newid);
        deletequestion(qContainer.getElementsByClassName("enunt")[0].innerText, newid)
      }
    })
  })

function deletequestion(enunt, id) {
    if (enunt.length != 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).classList.add("hide-question");
            }
        };
        xmlhttp.open("GET", "deletequestion.php?q=" + enunt, true);
        xmlhttp.send();
    }
}