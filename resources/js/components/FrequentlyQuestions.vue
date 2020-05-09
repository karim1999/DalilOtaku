<template>
    <div class="content">
        <single-question
            v-for="question in questions"
            :key="question.id"
            :title="question.title"
            :answer="question.answer"
            :status="question.status"
        />
    </div>
</template>

<script>
    export default {
        name: "FrequentlyQuestions",
        data: function () {
            return {
                questions: [
                    {
                        id: 1,
                        title: "هل يدعم الموقع خاصية التحميل؟",
                        answer: "هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.",
                        status: true
                    },
                    {
                        id: 2,
                        title: "هل يدعم الموقع خاصية التحميل؟",
                        answer: "هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.",
                        status: false
                    },
                    {
                        id: 3,
                        title: "هل يدعم الموقع خاصية التحميل؟",
                        answer: "هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.",
                        status: false
                    },
                    {
                        id: 4,
                        title: "هل يدعم الموقع خاصية التحميل؟",
                        answer: "هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.",
                        status: false
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
