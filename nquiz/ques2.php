<!DOCTYPE html>
<html>

<head>
    <title>NQUIZ</title>
    <link rel="stylesheet" href="nstyle.css">
</head>

<body>

    <div class="app">
        <h1>Test your mind</h1>
        <div class="quiz">
            <h2 id="question"></h2>
            <div id="answer-buttons">
                <button class="btn">Answer 1</button>
                <button class="btn">Answer 2</button>
                <button class="btn">Answer 3</button>
                <button class="btn">Answer 4</button>
            </div>
            <button id="prev-btn" style="display: none;">Previous</button>
            <button id="next-btn">Next</button>
            <div id="score"></div>
            <button id="back-to-dashboard-btn">Back to dash</button>
        </div>
    </div>
    <script>
        const questions = [{
                question: "What is Artificial Intelligence?",
                answers: [{
                        text: "Artificial Intelligence is a field that aims to make humans more intelligent",
                        correct: false
                    },
                    {
                        text: "Artificial Intelligence is a field that aims to improve the security",
                        correct: false
                    },
                    {
                        text: "Artificial Intelligence is a field that aims to develop intelligent machines",
                        correct: true
                    },
                    {
                        text: "Artificial Intelligence is a field that aims to mine the data",
                        correct: false
                    },

                ]
            },
            {
                question: "What is the goal of Artificial Intelligence?",
                answers: [{
                        text: "To solve artificial problems",
                        correct: false
                    },
                    {
                        text: "To explain various sorts of intelligenceSystem Testing",
                        correct: true
                    },
                    {
                        text: "To extract scientific causes",
                        correct: false
                    },
                    {
                        text: "To solve real-world problems",
                        correct: false
                    },
                ]
            },
            {
                question: "Which of the following is the correct extension of the Python file?",
                answers: [{
                        text: ".python",
                        correct: false
                    },
                    {
                        text: ".pl",
                        correct: false
                    },
                    {
                        text: ".py",
                        correct: true
                    },
                    {
                        text: ".p",
                        correct: false
                    },
                ]
            },
            {
                question: "Which of the following character is used to give single-line comments in Python?",
                answers: [{
                        text: "#",
                        correct: true
                    },
                    {
                        text: "//",
                        correct: false
                    },
                    {
                        text: "!",
                        correct: false
                    },
                    {
                        text: "/*",
                        correct: false
                    },
                ]
            },
            {
                question: "Python supports the creation of anonymous functions at runtime, using a construct called __________.",
                answers: [{
                        text: "pi",
                        correct: false
                    },
                    {
                        text: "lambda",
                        correct: true
                    },
                    {
                        text: "anonymous",
                        correct: false
                    },
                    {
                        text: "None of the above",
                        correct: false
                    },
                ]
            },
            {
                question: "Who is the father of Computers?",
                answers: [{
                        text: "James Gosling",
                        correct: false
                    },
                    {
                        text: "Charles Babbage",
                        correct: true
                    },
                    {
                        text: "Dennis Ritchie",
                        correct: false
                    },
                    {
                        text: "Bjarne Stroustrup",
                        correct: false
                    },
                ]
            },
            {
                question: "Which of the following is the correct abbreviation of COMPUTER?",
                answers: [{
                        text: "Commonly Occupied Machines Used in Technical and Educational Research",
                        correct: false
                    },
                    {
                        text: "Commonly Operated Machines Used in Technical and Environmental Research",
                        correct: false
                    },
                    {
                        text: "Commonly Oriented Machines Used in Technical and Educational Research",
                        correct: false
                    },
                    {
                        text: "Commonly Operated Machines Used in Technical and Educational Research",
                        correct: true
                    },
                ]
            },
            {
                question: "Which of the following computer language is written in binary codes only?",
                answers: [{
                        text: "pascal",
                        correct: false
                    },
                    {
                        text: " machine language",
                        correct: true
                    },
                    {
                        text: "C",
                        correct: false
                    },
                    {
                        text: "C#",
                        correct: false
                    },
                ]
            },
            {
                question: "Which component is used to compile, debug and execute the java programs?",
                answers: [{
                        text: "JRE",
                        correct: false
                    },
                    {
                        text: "JDK",
                        correct: true
                    },
                    {
                        text: "JIT",
                        correct: false
                    },
                    {
                        text: "JVM",
                        correct: false
                    },
                ]
            },
            {
                question: "Which one of the following is not a Java feature?",
                answers: [{
                        text: "Use of pointers",
                        correct: true
                    },
                    {
                        text: "Object-oriented",
                        correct: false
                    },
                    {
                        text: "Portable",
                        correct: false
                    },
                    {
                        text: "Dynamic and Extensible",
                        correct: false
                    },
                ]
            },
        ];
        const questionElement = document.getElementById("question");
        const answerButtons = document.getElementById("answer-buttons");
        const prevButton = document.getElementById("prev-btn");
        const nextButton = document.getElementById("next-btn");
        let scoreElement = document.getElementById("score");

        let currentQuestionIndex = 0;
        let score = 0;

        function startQuiz() {
            currentQuestionIndex = 0;
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

        function showQuestion() {
            resetState();
            let currentQuestion = questions[currentQuestionIndex];
            let questionNo = currentQuestionIndex + 1;
            questionElement.innerHTML = questionNo + "." + currentQuestion.question;

           
            if (currentQuestionIndex > 0) {
                prevButton.style.display = "block";
            } else {
                prevButton.style.display = "none";
            }

            currentQuestion.answers.forEach(answer => {
                const button = document.createElement("button");
                button.innerHTML = answer.text;
                button.classList.add("btn");
                answerButtons.appendChild(button);
                if (answer.correct) {
                    button.dataset.correct = answer.correct;
                }
                button.addEventListener("click", selectAnswer);
            });
        }

        prevButton.addEventListener("click", () => {
            currentQuestionIndex--;
            showQuestion();
        });


        function resetState() {
            nextButton.style.display = "none";
            while (answerButtons.firstChild) {
                answerButtons.removeChild(answerButtons.firstChild);
            }
        }

        function selectAnswer(e) {
            const selectedBtn = e.target;
            const isCorrect = selectedBtn.dataset.correct === "true";
            if (isCorrect) {
                selectedBtn.classList.add("correct");
                score++;
            } else {
                selectedBtn.classList.add("incorrect");
            }
            Array.from(answerButtons.children).forEach(button => {
                if (button !== selectedBtn) {
                    button.classList.add("disabled");
                }
            });
            selectedBtn.classList.add("selected"); // Add 'selected' class to highlight selected button
            nextButton.style.display = "block";
        }


        function backToDashboard() {
            window.location.href = './user/user_dashboard.php';
        }

        function showScore() {
            resetState();
            questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
            nextButton.innerHTML = "Play Again";
            document.getElementById("back-to-dashboard-btn").style.display = "block";
            nextButton.style.display = "block";
        }

        function handleNextButton() {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion();
            } else {
                showScore();
            }
        }
        nextButton.addEventListener("click", () => {
            if (currentQuestionIndex < questions.length) {
                handleNextButton();
            } else {
                startQuiz();
            }
        })
        document.getElementById("back-to-dashboard-btn").addEventListener("click", backToDashboard);
        startQuiz();
    </script>
</body>

</html>