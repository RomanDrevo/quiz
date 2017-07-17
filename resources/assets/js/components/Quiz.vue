<template>
    <div>

        <add-new-quiz @questionWasAdded="addNewQuestion"></add-new-quiz>


        <h1>Quiz</h1>

        <div v-for="(question, index) in allQuestions">


                <h2>{{ question.Text }}</h2>



                <ol>
                    <li v-for="answer in question.answers">


                        <form @submit.prevent="sendAnswer">

                            <label>
                                <input type="radio"> {{answer.text}}
                            </label>

                            

                        </form>



                    </li>
                </ol>





            <button type="button" class="submit" @click="">
                Delete Quiz
            </button>

            <button type="button" class="close" aria-label="Close" @click="deleteQuestion(index, question.id)">
                Delete Quiz
            </button>



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
            }
        },

        created(){
            this.getQuestions();
        }
    }
</script>
