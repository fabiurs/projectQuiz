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

function getInfo(id) {
    numberOfDoneQuestions++;
    document.getElementById("question-number").innerText = numberOfDoneQuestions;
    resetButtons();
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
        
            qArray = JSON.parse(this.responseText);
        
            document.getElementById("question").children[0].innerText = qArray[0];
            document.getElementById("r-btn-1").innerText = qArray[1];
            document.getElementById("r-btn-2").innerText = qArray[2];
            document.getElementById("r-btn-3").innerText = qArray[3];
            document.getElementById("r-btn-4").innerText = qArray[4];
            rCorrect = qArray[5];
        }
    }   
    xmlhttp.open("GET", "getQuestionInfo.php?qid="+id, true);
    xmlhttp.send();
}

function resetButtons(){
    document.getElementById("r-btn-1").classList.remove("chosed-response");
    document.getElementById("r-btn-2").classList.remove("chosed-response");
    document.getElementById("r-btn-3").classList.remove("chosed-response");
    document.getElementById("r-btn-4").classList.remove("chosed-response");
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

document.getElementById("r-btn-1").addEventListener("click", function(){
    this.classList.toggle("chosed-response");
});
document.getElementById("r-btn-2").addEventListener("click", function(){
    this.classList.toggle("chosed-response");
});
document.getElementById("r-btn-3").addEventListener("click", function(){
    this.classList.toggle("chosed-response");
});
document.getElementById("r-btn-4").addEventListener("click", function(){
    this.classList.toggle("chosed-response");
});



var points = 0;
var noOfCurrentQuestion = 0;
var rCorrect = 0;
var chosedQuestions;
var numberOfDoneQuestions = 0;

function startQuiz(){
    document.getElementById("instructions").style.display = "none";

    let rowQuestions = document.getElementById("row-questions");

    chosedQuestions = new Array(qcodes.length - 1).fill(0);
    
    getOnly10Questions(chosedQuestions);
    
    getInfo(qcodes[noOfCurrentQuestion]);
    
    rowQuestions.style.opacity = "1";
}

document.getElementById("verify").addEventListener("click", function(){
    nextQuestion();
});

function getNumberOfNextQuestion(){
    while(chosedQuestions[noOfCurrentQuestion+1] == 0){
        noOfCurrentQuestion++;
    }
    noOfCurrentQuestion++;
}

function nextQuestion(){
    if(verifyNumberOfResponsesChosed()){
        let userResponse = document.getElementsByClassName("chosed-response")[0].innerText;
        if(userResponse === rCorrect){
            correctAnswer();
        }
        else{
            notCorrectAnswer();
        }
    }else{
        document.getElementsByClassName("mesaj-eroare1")[0].innerText = "The chosen answer cannot be verified!";
        setTimeout(() => {
            document.getElementsByClassName("mesaj-eroare1")[0].innerText = "";
        }, 1500);
    }
}

function verifyNumberOfResponsesChosed(){
    let a = document.getElementsByClassName("chosed-response");
    if(a.length === 1){
        return true;
    } else{
        return false;
    }
}

var qcontainer = document.getElementById("row-questions");

function correctAnswer(){
    
    points += 10;
    qcontainer.classList.toggle("correct-ans");
    setTimeout(() => {
        qcontainer.classList.toggle("correct-ans"); 
        getNumberOfNextQuestion(); 
        verifyEnd();
        getInfo(qcodes[noOfCurrentQuestion]);  
    }, 2000);
}

function notCorrectAnswer(){
    qcontainer.classList.toggle("not-correct-ans");
    setTimeout(() => {
        qcontainer.classList.toggle("not-correct-ans");
        getNumberOfNextQuestion();
        verifyEnd();
        getInfo(qcodes[noOfCurrentQuestion]);
    }, 2000);
}

function verifyEnd(){
    if(numberOfDoneQuestions == 10){
        document.getElementById("row-questions").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("row-questions").style.display = "none";
            document.getElementById("points").innerText = points;
            document.getElementById("finish-msj").style.display = "block";
        }, 1000);
    }
}