<template>
    <div class="container pt-7 max-w-3xl mx-auto">
        <h1 class="text-3xl pb-5">Add Book</h1>
        <div class="bg-white rounded-lg shadow-lg w-full px-8 py-8">
            <form @submit.prevent="addBook">
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
                    <input type="text" v-model="book.genre" class="border" />
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Year</span>
                    <input type="text" v-model="book.year" class="border" />
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Description</span>
                    <input type="text" v-model="book.description" class="border" />
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
    methods: {
        addBook() {
            let uri = "http://127.0.0.1:8000/api/books";
            this.axios.post(uri, this.book).then((response) => {
                this.$router.push({ name: "books" });
            })
            .catch(err => console.log(err));
        },
    },
};
</script>
