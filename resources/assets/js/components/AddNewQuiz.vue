<template>
    <div>
        <h1>Add New Quiz</h1>
        <form @submit.prevent="saveQuestion">
            <div class="fotm-group">
                <h3>Add new question</h3>
                <label>Question: </label>
                <input type="text" class="form-control" v-model="question">

                <label>Answers</label>
                <div v-for="(answer, index) in answers">
                    <span v-if="index == 0">Correct answer:</span>
                    <span v-else>Incorrect answer:</span>
                    <input class="form-control" type="text" v-model="answer.t">
                </div>
                <br>

                <div class="form-group">
                    <input class="form-control btn btn-success" type="submit" value="Save">

                </div>
            </div>
        </form>
    </div>
</template>
<style>

</style>
<script type="text/babel">

    export default{
        data(){
            return {
                newQuestions: [],
                question: "",
                answers: [
                    {t: "", c: true},
                    {t: "", c: false},
                    {t: "", c: false},
                    {t: "", c: false}
                ]
            }
        },
        methods: {
            saveQuestion(){
                let allAnswers = [];

                for(let item in this.answers)
                    allAnswers.push(Object.assign({}, this.answers[item]))

                this.newQuestions.push({
                    question: this.question,
                    answers: allAnswers
                });

                this.question = "";
                for(let item in this.answers){
                    this.answers[item].t = "";
                }

                this.$emit('questionWasAdded', this.newQuestions);
            }
        }
    }
</script>
