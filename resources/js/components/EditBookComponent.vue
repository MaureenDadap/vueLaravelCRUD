<template>
    <div class="">
        <h1 class="text-3xl pb-5">Edit Book</h1>
        <div class="bg-white rounded-lg shadow-lg w-full px-8 py-8">
            <form @submit.prevent="updateBook">
                <div class="mb-3 w-full">
                    <p class="mb-2 text-sm font-bold">Book Title</p>
                    <input
                        type="text"
                        v-model="book.title"
                        class="border rounded-md w-full py-2 px-3"
                    />
                </div>
                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Author</p>
                    <input
                        type="text"
                        v-model="book.author"
                        class="border rounded-md w-full py-2 px-3"
                    />
                </div>
                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Genre</p>
                    <v-select
                        multiple
                        :options="genres"
                        label="genre_name"
                        @update:modelValue="selectedGenres"
                        :modelValue="selected"
                    ></v-select>
                </div>
                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Year</p>
                    <input
                        type="text"
                        v-model="book.year"
                        class="border rounded-md w-full py-2 px-3"
                    />
                </div>
                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Description</p>
                    <textarea
                        v-model="book.description"
                        cols="30"
                        rows="10"
                        class="border rounded-md w-full py-2 px-3"
                    ></textarea>
                </div>

                <button
                    type="submit"
                    class="bg-green-700 rounded-md px-3 py-2 mt-8 text-white"
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
            genres: {},
            selected: {},
        };
    },
    created() {
        this.axios
            .get(`http://127.0.0.1:8000/api/books/${this.$route.params.id}`)
            .then((res) => {
                this.book = res.data;
                // console.log(this.book);
                this.selected = this.book.genres;
                // console.log("current genres" + this.selected);
            });

        let url = "http://127.0.0.1:8000/api/genres";
        this.axios.get(url).then((response) => {
            this.genres = response.data.data;
            // console.log(response.data.data);
        });
    },
    methods: {
        selectedGenres(selected) {
            // console.log(selected);
            this.selected = selected;
        },
        updateBook() {
            // console.log("old book" , this.book);
            this.book.genres = this.selected;
            // console.log("new book" ,  this.book);

            let uri = `http://127.0.0.1:8000/api/books/${this.$route.params.id}`;
            this.axios
                .patch(uri, this.book)
                .then((response) => {
                    console.log(response);
                    this.$router.push({ name: "home" });
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
