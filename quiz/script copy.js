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
    xmlhttp.open("GET", "getQuestionInfo.php?qid="+id, true);
    xmlhttp.send();
    return xmlhttp;
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
    document.getElementById("instructions").style.display = "none";

    let rowQuestions = document.getElementById("row-questions");

    var noOfCurrentQuestion = 0;
    var chosedQuestions = new Array(qcodes.length).fill(0);;
    
    let title = document.getElementById("title");
    let question = document.getElementById("question");
    let r1 = document.getElementById("r-btn-1");
    let r2 = document.getElementById("r-btn-2");
    let r3 = document.getElementById("r-btn-3");
    let r4 = document.getElementById("r-btn-4");
    let rc;

    let points = 0;

    getOnly10Questions(chosedQuestions);
    rowQuestions.style.opacity = "1";
    
    let i = 0;

    while(i < qcodes.length) {
        if(chosedQuestions[i] == 1){
            
            let xmlhttp = getInfo(qcodes[i]);
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    qArray = JSON.parse(this.responseText);
                    question.innerText = qArray[0];
                    r1.innerText = qArray[1];
                    r2.innerText = qArray[2];
                    r3.innerText = qArray[3];
                    r4.innerText = qArray[4];
                    rc = qArray[5];

                    r1.addEventListener("click", function(){
                        if(this.innerText === rc){
                            correctAnswer();
                        }
                        else{
                            notCorrectAnswer();
                        }
                    });
                    r2.addEventListener("click", function(){
                        if(this.innerText === rc){
                            correctAnswer();
                        }
                        else{
                            notCorrectAnswer();
                        }
                    });
                    r3.addEventListener("click", function(){
                        if(this.innerText === rc){
                            correctAnswer();
                        }
                        else{
                            notCorrectAnswer();
                        }
                    });
                    r4.addEventListener("click", function(){
                        if(this.innerText === rc){
                            correctAnswer();
                        }
                        else{
                            notCorrectAnswer();
                        }
                    });
                }
            };
        }
        i++;
    }
}


var qcontainer = document.getElementById("row-questions");
function correctAnswer(){
    qcontainer.classList.toggle("correct-ans");
    setTimeout(() => {
        qcontainer.classList.toggle("correct-ans");
        return;        
    }, 2000);
}

function notCorrectAnswer(){
    qcontainer.classList.toggle("not-correct-ans");
    setTimeout(() => {
        qcontainer.classList.toggle("not-correct-ans");
        return;
    }, 2000);
}