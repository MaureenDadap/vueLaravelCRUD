<template>
    <div class="container pt-7 lg:max-w-3xl mx-auto">
        <h1 class="text-3xl pb-5">Add Book</h1>
        <div class="bg-white rounded-lg shadow-lg w-full px-8 py-8">
            <form @submit.prevent="addBook">
                <div class="mb-3 w-full">
                    <p class="mb-2 text-sm font-bold">Book Title</p>
                    <input
                        type="text"
                        v-model="book.title"
                        class="border rounded-md w-full py-2 px-3"
                        required
                    />
                    <!-- <span v-if="errors.title != ''" class="text-red-500">{{
                        errors.title[0]
                    }}</span> -->
                </div>

                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Author</p>
                    <input
                        type="text"
                        v-model="book.author"
                        class="border rounded-md w-full py-2 px-3"
                        required
                    />
                </div>
                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Genre</p>
                    <v-select
                        multiple
                        :options="genres"
                        label="genre_name"
                        @update:modelValue="selectedGenres"
                    >
                    </v-select>
                    <span v-if="empty == true" class="text-red-500"
                        >Genre is required!</span
                    >
                </div>
                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Year</p>
                    <input
                        type="text"
                        v-model="book.year"
                        class="border rounded-md w-full py-2 px-3"
                        required
                    />
                </div>
                <div class="items-center mb-3">
                    <p class="mb-2 text-sm font-bold">Description</p>
                    <textarea
                        v-model="book.description"
                        cols="30"
                        rows="10"
                        class="border rounded-md w-full py-2 px-3"
                        required
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
            empty: false,
        };
    },
    created() {
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
            this.empty = false;
        },
        addBook() {
            if (Object.keys(this.selected).length === 0) {
                this.empty = true;
                // console.log(this.empty);
            } else {
                this.book.genres = this.selected;
                let uri = "http://127.0.0.1:8000/api/books";
                this.axios
                    .post(uri, this.book)
                    .then((response) => {
                        this.$router.push({ name: "home" });
                    })
                    .catch((err) => console.log(err));
            }
        },
    },
};
</script>
