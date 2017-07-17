<template>
  <div id="app">
    <ul>
        <li v-for="question in questions">{{ question.q }}</li>
    </ul>
    <form @submit.prevent="saveQuestion">
        <h3>Add new question</h3>
        <label>Question: </label>
        <input type="text" v-model="question">
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

<script>
import Hello from './components/Hello'
import $ from 'jquery'

export default {
  name: 'app',
  data(){
    return {
        questions: [],
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
        
        this.questions.push({
            question: this.question,
            answers: allAnswers
        });

        this.question = "";
        for(let item in this.answers)
            this.answers[item].t = "";
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
