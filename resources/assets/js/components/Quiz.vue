<template>
    <div>

        <div class="col-sm-6">
            <add-new-quiz @questionWasAdded="addNewQuestion"></add-new-quiz>
        </div>

        <div class="col-sm-6">
            <h1>Quiz</h1>

            <div v-for="(question, index) in allQuestions">

                <h2>{{ question.Text }}</h2>

                <ol>
                    <li v-for="answer in question.answers">
                        <label>
                            <input type="radio" :id="answer.id" :value="answer.id" v-model="choosenOption">{{ answer.text }}
                        </label>
                    </li>
                </ol>

                <button type="button" class="btn btn-danger" @click="deleteQuestion(index, question.id)">
                    Delete Quiz
                </button>

                <button type="button" class="btn btn-success" @click="sendAnswer()">
                    Send Answer
                </button>

            </div>
        </div>

    </div>
</template>
<style>
    body{

    }
</style>
<script type="text/babel">
     import AddNewQuiz from './AddNewQuiz.vue'


    export default{

        data(){
          return {
              allQuestions: [],
              newQuiz:{
                  "Text": "",
                  "answers": []
              },
              choosenOption: "",
          }
        },

        components:{
            AddNewQuiz
        },

        methods:{
            addNewQuestion($event){
                 this.newQuiz.Text = $event[0].question;
                 this.newQuiz.answers = $event[0].answers;


                axios.post("/create-question", {newQuiz:this.newQuiz}).then((response) => {
                    this.allQuestions.push(this.newQuiz);
                    location.reload();
                }).catch(errors => {
                    let error = Object.values(errors.body)[0];
                    swal("Oops...", error, "error");
                });


            },

            getQuestions(){
                axios.get("/get-questions").then((response) => {
                    this.allQuestions = response.data.data;
                })
            },

            deleteQuestion(index, questionId){
                axios.post(questionId + "{/delete", {questionId: questionId})
                        .then(response => {
                            this.allQuestions.splice(index, 1);
                        }).catch(errors => {
                    let error = Object.values(errors.body)[0];
                    swal("Oops...", error, "error");
                });
            },

            sendAnswer(){
                axios.post("/check-answer", {choosenOption: this.choosenOption})
                        .then(response => {
                            if(response.data.data === 1){
                                swal({
                                    title: "Good job!",
                                    text: "Right answer!",
                                    type: "success",
                                    confirmButtonText: "Cool"
                                });
                            }
                            else{
                                swal({
                                    title: "oops...",
                                    text: "Wrong answer!",
                                    type: "error",
                                    confirmButtonText: "OK"
                                });
                            }
                        }).catch(errors => {
                            let error = Object.values(errors.body)[0];
                            swal("Oops...", error, "error");
                        });
            }
        },

        created(){
            this.getQuestions();
        }
    }
</script>
