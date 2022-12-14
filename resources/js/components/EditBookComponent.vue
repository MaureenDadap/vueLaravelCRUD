<template>
    <div class="">
        <h1 class="text-3xl pb-5">Edit Book</h1>
        <div class="bg-white rounded-lg shadow-lg w-full px-8 py-8">
            <form @submit.prevent="updateBook">
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Book Title</span>
                    <input type="text" v-model="book.title" class="border" />
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Author</span>
                    <input type="text" v-model="book.author" class="border" />
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Genre</span>
                    <!-- <input type="text" v-model="book.genre" class="border" /> -->
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Year</span>
                    <input type="text" v-model="book.year" class="border" />
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Description</span>
                    <textarea v-model="book.description" cols="30" rows="10" class="border"></textarea>
                </div>

                <button
                    type="submit"
                    class="bg-green-500 rounded-md px-3 py-2 mt-8"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            book: {},
        };
    },
    created() {
        this.axios.get(`http://127.0.0.1:8000/api/books/${this.$route.params.id}`).then((res) => {
            this.book = res.data;
            console.log(this.book);
        });
    },
    methods: {
        updateBook() {
            this.axios
                .patch(`http://127.0.0.1:8000/api/books/${this.$route.params.id}`, this.book)
                .then((response) => {
                    this.$router.push({ name: "books" });
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
