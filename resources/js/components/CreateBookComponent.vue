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
                    <!-- <input type="text" v-model="book.genre" class="border" /> -->
                    <!-- <Vuemultiselect
                        v-model="value"
                        :options="genres"
                        :multiple="true"
                        placeholder="Type to search"
                        track-by="genre_name"
                        label="genre_name"
                        ><span slot="noResult"
                            >Oops! No elements found. Consider changing the
                            search query.</span
                        ></Vuemultiselect
                    >
                    <pre class="language-json"><code>{{ value  }}</code></pre> -->
                    <v-select
                        multiple
                        :options="genres"
                        label="genre_name"
                        @update:modelValue="selectedGenres"
                    ></v-select>
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Year</span>
                    <input type="text" v-model="book.year" class="border" />
                </div>
                <div class="flex flex-row items-center mb-3">
                    <span class="mr-3">Description</span>
                    <textarea
                        v-model="book.description"
                        cols="30"
                        rows="10"
                        class="border"
                    ></textarea>
                </div>

                <button
                    type="submit"
                    class="bg-green-500 rounded-md px-3 py-2 mt-8"
                >
                    Submit
                </button>

                <h1>{{ test }}</h1>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    // props: {
    //     selected
    // },
    data() {
        return {
            book: {},
            genres: {},
            selected: {},
            test: {},
        };
    },
    created() {
        let url = "http://127.0.0.1:8000/api/genres";
        this.axios.get(url).then((response) => {
            this.genres = response.data.data;
            console.log(response.data.data);
        });
    },
    methods: {
        selectedGenres(selected) {
            console.log(selected);
            this.selected = selected;
        },
        addGenres(book_id) {
            let uri = "http://127.0.0.1:8000/api/book_genres";
            const genre_ids = [];

            console.log(this.selected);

            for (let i = 0; i < this.selected.length; i++) {
                let obj = this.selected[i];

                genre_ids.push(obj.id)
            }

            const obj = {
                "genre_ids" : genre_ids,
                "book_id": book_id,
            };
            
            this.axios
                .post(uri, obj)
                .then((response) => {
                    console.log(response)
                    this.$router.push({ name: "home" });
                })
                .catch((err) => console.log(err));
        },
        addBook() {
            let uri = "http://127.0.0.1:8000/api/books";
            this.axios
                .post(uri, this.book)
                .then((response) => {
                    this.addGenres(response.data);
                })
                .catch((err) => console.log(err));
        },
    },
};
</script>
