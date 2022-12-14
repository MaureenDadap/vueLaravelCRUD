<template>
    <div class="">
        <div class="flex flex-row justify-between items-center">
            <h1 class="text-3xl pb-5">Books</h1>
            <a class="bg-green-700 text-white rounded-md px-3 py-2"
                ><router-link to="/book/create">Add Book</router-link></a
            >
        </div>

        <table
            class="table-auto shadow-lg bg-white rounded-lg w-full border-collapse"
        >
            <thead>
                <tr>
                    <th class="border text-center py-4">#</th>
                    <th class="border text-center py-4">Book Title</th>
                    <th class="border text-center py-4">Author</th>
                    <th class="border text-center py-4">Genres</th>
                    <th class="border text-center py-4">Year</th>
                    <!-- <th class="border text-center py-4">Date Added</th> -->
                    <th class="border text-center py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books.data" :key="book.id">
                    <td class="border px-2 py-2 font-bold text-center">
                        {{ book.id }}
                    </td>
                    <td class="border px-2 py-2">
                        {{ book.title }}
                    </td>
                    <td class="border px-2 py-2">
                        {{ book.author }}
                    </td>
                    <td class="border p-2">
                        <div
                            v-for="genre in book.genres"
                            :key="genre.id"
                            class="bg-gray-400 rounded-md py-1 px-2 m-1 break-normal inline-block"
                        >
                            {{ genre.genre_name }}
                        </div>
                    </td>
                    <td class="border px-2 py-2">
                        {{ book.year }}
                    </td>
                    <!-- <td class="border px-4 py-2">
                        {{ book.created_at }}
                    </td> -->
                    <td class="border py-2 text-white">
                        <div class="flex flex-wrap justify-center">
                            <button
                                class="bg-teal-500 rounded-md px-3 py-2 m-1"
                            >
                                <router-link
                                    :to="{
                                        name: 'view-book',
                                        params: { id: book.id },
                                    }"
                                    ><i class="pi pi-eye"></i
                                ></router-link>
                            </button>
                            <button
                                class="bg-amber-500 rounded-md px-3 py-2 m-1"
                            >
                                <router-link
                                    :to="{
                                        name: 'edit-book',
                                        params: { id: book.id },
                                    }"
                                    ><i class="pi pi-file-edit"></i
                                ></router-link>
                            </button>
                            <button
                                class="bg-red-600 rounded-md px-3 py-2 m-1"
                                @click="deleteBook(book.id)"
                            >
                                <i class="pi pi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            books: [],
            book_genres: [],
            // nextPage: "",
        };
    },
    created() {
        let url = "http://127.0.0.1:8000/api/books";
        this.axios.get(url).then((response) => {
            this.books = response.data;
            this.nextPage = this.books.links[3].url;
            // console.log(this.books);
        });
    },

    methods: {
        deleteBook(id) {
            this.axios
                .delete(`http://127.0.0.1:8000/api/books/${id}`)
                .then((response) => {
                    let i = this.books.map((data) => data.id).indexOf(id);
                    this.books.splice(i, 1);
                });
        },
    },
};
</script>
