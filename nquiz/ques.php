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
            <button id="modify-btn" style="display: none;">Modify Answer</button>
            <div id="score"></div>
            <button id="back-to-dashboard-btn">Back to dash</button>
        </div>
    </div>
    <script>
        const questions = [{
                question: "What is the fullform of HTML?",
                answers: [{
                        text: "HyperText Markup Language",
                        correct: true
                    },
                    {
                        text: "HyperTexting Markup Language",
                        correct: false
                    },
                    {
                        text: "HyperText Markingup Language",
                        correct: false
                    },
                    {
                        text: "HyperText Markup List",
                        correct: false
                    },

                ]
            },
            {
                question: "What is the first step in the software development lifecycle?",
                answers: [{
                        text: "System Design",
                        correct: false
                    },
                    {
                        text: "System Testing",
                        correct: false
                    },
                    {
                        text: "Preliminary Investigation and Analysis",
                        correct: true
                    },
                    {
                        text: "Coding",
                        correct: false
                    },
                ]
            },
            {
                question: "Which of the following is involved in the system planning and designing phase of the Software Development Life Cycle (SDLC)?",
                answers: [{
                        text: "Sizing",
                        correct: false
                    },
                    {
                        text: "Parallel run",
                        correct: false
                    },
                    {
                        text: "Specification freeze",
                        correct: false
                    },
                    {
                        text: "All of the above",
                        correct: true
                    },
                ]
            },
            {
                question: "What does RAD stand for?",
                answers: [{
                        text: "Rapid Application Development",
                        correct: true
                    },
                    {
                        text: "Rapid Application Document",
                        correct: false
                    },
                    {
                        text: "Relative Application Development",
                        correct: false
                    },
                    {
                        text: "None of the above",
                        correct: false
                    },
                ]
            },
            {
                question: "Model selection is based on __________.",
                answers: [{
                        text: "Requirements",
                        correct: false
                    },
                    {
                        text: "Development team & users",
                        correct: false
                    },
                    {
                        text: "Project type & associated risk",
                        correct: false
                    },
                    {
                        text: "All of the above",
                        correct: true
                    },
                ]
            },
            {
                question: "The values GET, POST, HEAD etc are specified in ____________ of HTTP message.",
                answers: [{
                        text: "Header line",
                        correct: false
                    },
                    {
                        text: "Status line",
                        correct: false
                    },
                    {
                        text: "Entity body",
                        correct: false
                    },
                    {
                        text: "Request line",
                        correct: true
                    },
                ]
            },
            {
                question: "Find the oddly matched HTTP status codes.",
                answers: [{
                        text: "301 Moved permanently",
                        correct: false
                    },
                    {
                        text: "304 Not Found",
                        correct: true
                    },
                    {
                        text: "400 Bad Request",
                        correct: false
                    },
                    {
                        text: "200 OK",
                        correct: false
                    },
                ]
            },
            {
                question: "Which of the following is present in both an HTTP request line and a status line?",
                answers: [{
                        text: "Method",
                        correct: false
                    },
                    {
                        text: "URL",
                        correct: false
                    },
                    {
                        text: "HTTP version number",
                        correct: true
                    },
                    {
                        text: "None of the above",
                        correct: false
                    },
                ]
            },
            {
                question: "Who invented Java Programming?",
                answers: [{
                        text: "Guido van Rossum",
                        correct: false
                    },
                    {
                        text: "James Gosling",
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
        const modifyButton = document.getElementById("modify-btn");
        let scoreElement = document.getElementById("score");
        let modifiedQuestionIndex = null;
        let currentQuestionIndex = 0;
        let score = 0;
        let selectedAnswerButton = null;

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

                // Check if this answer was previously selected
                if (selectedAnswerButton && button.innerHTML === selectedAnswerButton.innerHTML) {
                    button.classList.add("selected"); // Highlight the previously selected answer
                }
            });
        }


        prevButton.addEventListener("click", () => {
            if (currentQuestionIndex > 0) {
                modifiedQuestionIndex = null; // Expire modifiedQuestionIndex when going to the previous question
                currentQuestionIndex--; // Decrease the index to go to the previous question
                showQuestion();
                nextButton.style.display = "block"; // Display the Next button

                // Disable answer buttons if the user navigates back to the previous question
                if (selectedAnswerButton) {
                    selectedAnswerButton.classList.remove("selected");
                    selectedAnswerButton.classList.add("disabled");
                    selectedAnswerButton.disabled = true;
                    selectedAnswerButton = null;
                }

                // Show the selected answer for the previously answered question
                if (selectedAnswerIndices[currentQuestionIndex] !== undefined) {
                    const selectedAnswerIndex = selectedAnswerIndices[currentQuestionIndex];
                    const selectedButton = answerButtons.children[selectedAnswerIndex];
                    selectedButton.classList.add("selected");
                }
            }
        });


        function resetState() {
            nextButton.style.display = "none";
            while (answerButtons.firstChild) {
                answerButtons.removeChild(answerButtons.firstChild);
            }
        }

        modifyButton.addEventListener("click", () => {
            if (selectedAnswerButton) {
                selectedAnswerButton.classList.remove("selected"); // Deselect the previously selected answer button
                selectedAnswerButton.classList.remove("disabled"); // Enable the previously selected answer button
                selectedAnswerButton = null;
                modifiedQuestionIndex = currentQuestionIndex; // Reset selected answer button
                modifyButton.style.display = "none"; // Hide the Modify Answer button
            }
            // Enable all answer buttons
            Array.from(answerButtons.children).forEach(button => {
                button.classList.remove("disabled");
            });
        });


        function selectAnswer(e) {
            const selectedBtn = e.target;
            const isCorrect = selectedBtn.dataset.correct === "true";

            if (selectedAnswerButton === selectedBtn) {
                return; // Do nothing if the same answer button is clicked again
            }

            if (selectedAnswerButton) {
                selectedAnswerButton.classList.remove("selected"); // Deselect the previously selected answer button
            }

            selectedAnswerButton = selectedBtn; // Store the newly selected answer button
            selectedBtn.classList.add("selected");

            modifyButton.style.display = "block";
            if (currentQuestionIndex > 0) {
                prevButton.style.display = "block";
            } else {
                prevButton.style.display = "none";
            }

            Array.from(answerButtons.children).forEach(button => {
                if (button !== selectedBtn) {
                    button.classList.add("disabled");
                }
            });

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