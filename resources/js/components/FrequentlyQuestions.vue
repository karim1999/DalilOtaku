<template>
    <div class="content">
        <single-question
            v-for="question in questions"
            :key="question.id"
            :title="question.question"
            :answer="question.answer"
            :status="false"
        />
    </div>
</template>

<script>
    export default {
        name: "FrequentlyQuestions",
        props: ['questions'],
    }
</script>

<style scoped>

</style>
