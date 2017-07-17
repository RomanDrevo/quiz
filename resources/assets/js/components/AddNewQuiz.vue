<template>
    <div>
        <h1>Add New Quiz</h1>

        <!--<ul>-->
            <!--<li v-for="question in questions">{{ question.q }}</li>-->
        <!--</ul>-->
        <form @submit.prevent="saveQuestion">
            <h3>Add new question</h3>
            <label>Question: </label>
            <input type="text" v-model="question">
            <br>
            <label>Answers</label>
            <div v-for="(answer, index) in answers">
                <span v-if="index == 0">Correct</span>
                <span v-else>Incorrect</span>
                <input type="text" v-model="answer.t">
            </div>
            <input type="submit" value="Save">
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
