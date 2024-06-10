const questions =[
    {
        question: "What is the fullform of HTML?",
        answers:[
            {text: "HyperText Markup Language", correct:true },
            {text: "HyperTexting Markup Language", correct:false},
            {text: "HyperText Markingup Language", correct:false},
            {text: "HyperText Markup List",    correct:false},
           
        ]
    },
    {
        question: "What is the first step in the software development lifecycle?",
        answers:[
            {text: "System Design", correct:false },
            {text: "System Testing", correct:false},
            {text: "Preliminary Investigation and Analysis", correct:true},
            {text: "Coding",    correct:false},
        ]
    },
    {
        question: "Which of the following is involved in the system planning and designing phase of the Software Development Life Cycle (SDLC)?",
        answers:[
            {text: "Sizing", correct:false },
            {text: "Parallel run", correct:false},
            {text: "Specification freeze", correct:false},
            {text: "All of the above",    correct:true},
        ]
    },
    {
        question: "What does RAD stand for?",
        answers:[
            {text: "Rapid Application Development", correct:true },
            {text: "Rapid Application Document", correct:false},
            {text: "Relative Application Development", correct:false},
            {text: "None of the above",    correct:false},
        ]
    },
    {
        question: "Model selection is based on __________.",
        answers:[
            {text: "Requirements", correct:false },
            {text: "Development team & users", correct:false},
            {text: "Project type & associated risk", correct:false},
            {text: "All of the above",    correct:true},
        ]
    },
    {
        question: "The values GET, POST, HEAD etc are specified in ____________ of HTTP message.",
        answers:[
            {text: "Header line", correct:false },
            {text: "Status line", correct:false},
            {text: "Entity body", correct:false},
            {text: "Request line",    correct:true},
        ]
    },
    {
        question: "Find the oddly matched HTTP status codes.",
        answers:[
            {text: "301 Moved permanently", correct:false },
            {text: "304 Not Found", correct:true},
            {text: "400 Bad Request", correct:false},
            {text: "200 OK",    correct:false},
        ]
    },
    {
        question: "Which of the following is present in both an HTTP request line and a status line?",
        answers:[
            {text: "Method", correct:false },
            {text: "URL", correct:false},
            {text: "HTTP version number", correct:true},
            {text: "None of the above",    correct:false},
        ]
    },
];
const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");
let scoreElement = document.getElementById("score");

let currentQuestionIndex= 0;
let score = 0;

function startQuiz(){
    currentQuestionIndex =0;
    score = 0;
    scoreElement.textContent = score;
    nextButton.innerHTML = "Next";
    questions = shuffle(questions); 
    showQuestion();
}

function shuffle(array) {
    resetState();
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
        showQuestion();
    }
    return array;
}
function showQuestion(){
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + "." + currentQuestion.question;

    currentQuestion.answers.forEach(answer=>{
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButtons.appendChild(button);
        if(answer.correct){
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click",selectAnswer);
    });
}
function resetState(){
    nextButton.style.display = "none";
    while(answerButtons.firstChild){
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e){
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";
    if(isCorrect){
        selectedBtn.classList.add("correct");
        score++;
    }
    else{
        selectedBtn.classList.add("Incorrect");
    }
    Array.from(answerButtons.children).forEach(button=>{
        if(button.dataset.correct === "true"){
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    nextButton.style.display = "block";
}
function showScore(){
    resetState();
    questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
    nextButton.innerHTML = "Play Again";
    nextButton.style.display ="block";
}
function handleNextButton(){
    currentQuestionIndex++;
    if(currentQuestionIndex < questions.length){
        showQuestion();
    }
    else{
        showScore();
    }
}
nextButton.addEventListener("click",()=>{
    if(currentQuestionIndex < questions.length){
        handleNextButton();
    }
    else{
        startQuiz();
    }
})
startQuiz();
