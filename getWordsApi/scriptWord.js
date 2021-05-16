document.getElementById("wordSearch").addEventListener("click", function getWord() {

    var theWord = document.getElementById("wordInput").value;

    if (theWord == "") {
        document.getElementById("error-message").innerText = "You did not enter a word!";
    } else {
        document.getElementById("error-message").innerText = "";

        searchForDefinition(theWord);
    }

});

function searchForDefinition(word) {
    fetch(`https://wordsapiv1.p.rapidapi.com/words/${word}/definitions`, {
            "method": "GET",
            "headers": {
                "x-rapidapi-key": "5d7652e66emshcfb3c0d18f34d74p1832fcjsnac3f643c1130",
                "x-rapidapi-host": "wordsapiv1.p.rapidapi.com"
            }
        })
        .then(response => {
            response.json().then((data) => {
                displayWord(word);
                searchForSynonyms(word);
                displayDefinitions(data.definitions);
            });

        })
        .catch(err => {
            console.error(err);
        });
}

function searchForSynonyms(word) {
    fetch(`https://wordsapiv1.p.rapidapi.com/words/${word}/synonyms`, {
            "method": "GET",
            "headers": {
                "x-rapidapi-key": "5d7652e66emshcfb3c0d18f34d74p1832fcjsnac3f643c1130",
                "x-rapidapi-host": "wordsapiv1.p.rapidapi.com"
            }
        })
        .then(response => {
            response.json().then((data) => {
                displaySynonyms(data.synonyms);
            });

        });
}

function displayWord(word) {
    document.querySelector(".myword").innerText = word;
}

function displayDefinitions(data) {

    var mylist = document.getElementById("definitionList");

    mylist.innerHTML = "";

    if (data != undefined) {
        data.forEach(def => {
            var node = document.createElement("li");
            var textnode = document.createTextNode(def.definition);

            node.appendChild(textnode);

            mylist.appendChild(node);
        });
    } else {
        document.getElementById("error-message").innerText = "There is no such word!";
        document.querySelector(".myword").innerText = "";
    }
}

function displaySynonyms(list) {

    var synonyms = document.querySelector(".synonyms");
    synonyms.innerHTML = "";

    if (list != undefined) {
        list.forEach(s => {
            synonyms.innerHTML += s + ", &nbsp";
        });
    }
}