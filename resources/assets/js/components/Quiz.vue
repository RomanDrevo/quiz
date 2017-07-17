<template>
    <div>

        <add-new-quiz @questionWasAdded="addNewQuestion"></add-new-quiz>


        <h1>Quiz</h1>

        <div v-for="(question, index) in allQuestions">

            <div v-show="index === questionIndex">
                <h2>{{ question.Text }}</h2>



                <ol>
                    <li v-for="answer in question.answers">
                        <label>
                            <input type="radio" :id="answer.id" :value="answer.id" v-model="choosenOption">{{ answer.text }}
                        </label>
                    </li>
                </ol>

                <button type="button" class="close" aria-label="Close" @click="deleteQuestion(index, question.id)">
                    Delete Quiz
                </button>

                <button type="submit" class="close" @click="sendAnswer()">
                    Send Answer
                </button>

                <br>
                <br>

                <button v-if="questionIndex > 0" @click="prev">
                    prev
                </button>
                <button @click="next">
                    next
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

              questionIndex: 0

          }
        },

        components:{
            AddNewQuiz
        },

        methods:{

            addNewQuestion($event){
                 console.log($event[0]);

                 this.newQuiz.Text = $event[0].question;
                 this.newQuiz.answers = $event[0].answers;

                 this.allQuestions.push(this.newQuiz);

                axios.post("/create-question", {newQuiz:this.newQuiz}).then((response) => {
                    console.log(response.status);
                    location.reload();
                })


            },

            getQuestions(){
                axios.get("/get-questions").then((response) => {
                    this.allQuestions = response.data.data;
                })
            },

            deleteQuestion(index, questionId){
                axios.post(questionId + "{/delete", {questionId: questionId})
                        .then(response => {
                            console.log(response.status);
                            location.reload();
                        })
            },

            next() {
                this.questionIndex++;
            },

            prev() {
                this.questionIndex--;
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
