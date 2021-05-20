var qcodes;

function printCodes(myarray){
    qcodes = JSON.parse(myarray);
    // mycodes[0], mycodes[1], mycodes[2] ......;
    showInstructions();
}

function getCode(categ, myarray) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            myarray = this.responseText;

            printCodes(myarray);
        }
    };
    xmlhttp.open("GET", "getQuestionsCode.php?c="+categ, true);
    xmlhttp.send();
}

function showInstructions(){

    if(sessionStorage.getItem("firstAccept") === null){
        sessionStorage.setItem("firstAccept", "true");
        document.getElementById("first-row").style.opacity = "0";
        document.getElementById("row-categ").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("first-row").style.display = "none";
            document.getElementById("row-categ").style.display = "none";

            document.getElementById("instructions").style.opacity = "1";
        }, 1001);
    }
    else{
        document.getElementById("first-row").style.opacity = "0";
        document.getElementById("row-categ").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("first-row").style.display = "none";
            document.getElementById("row-categ").style.display = "none";
            document.getElementById("instructions").style.display = "none";
        }, 1001);
        startQuiz();
    }
}

function showCateg(){
    document.getElementById("instructions").style.opacity = "0";
    document.getElementById("first-row").style.display = "block";
    document.getElementById("row-categ").style.display = "block";
    setTimeout(() => {
        document.getElementById("first-row").style.opacity = "1";
        document.getElementById("row-categ").style.opacity = "1";

    }, 100);
}

function getInfo(id, qArray) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            qArray = JSON.parse(this.responseText);
            //console.log(qArray);
            return qArray;
        }
    };
    xmlhttp.open("GET", "getQuestionInfo.php?qid="+id, true);
    xmlhttp.send();
}

function getOnly10Questions(chosedQuestions){
    var c = 0;
    while(c < 10){
        do{
            var a = Math.floor(Math.random() * (qcodes.length + 1));  
        }while(chosedQuestions[a] == 1);
        chosedQuestions[a] = 1;
        c++;
    }
}

function startQuiz(){
    var noOfCurrentQuestion = 0;
    var chosedQuestions = new Array(qcodes.length).fill(0);;
    
    getOnly10Questions(chosedQuestions);
    
    for (let i = 0; i < qcodes.length; i++) {
        
        if(chosedQuestions[i] == 1){
            console.log(qcodes[i]);
            var questionComponents = getInfo(qcodes[i]);
            console.log(questionComponents);
        }
    }
}