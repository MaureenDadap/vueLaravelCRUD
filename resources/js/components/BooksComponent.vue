<template>
    <div class="">
        <div class="flex flex-row justify-between items-center">
            <h1 class="text-3xl pb-5">Books</h1>
            <a class="bg-green-700 text-white rounded-md px-3 py-2"
                ><router-link to="/book/create">Add Book</router-link></a
            >
        </div>

        <!-- <DataTable :value="books" class="table-auto shadow-lg bg-white rounded-lg">
            <Column field="id" header="id"></Column>
            <Column field="title" header="Title"></Column>
            <Column field="authorID" header="Author"></Column>
            <Column field="year"
                header="Year Released"></Column>
            <Column field=""
                header="Actions"></Column>
        </DataTable> -->

        <table class="table-auto shadow-lg bg-white rounded-lg w-full">
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
                <tr v-for="book in books" :key="book.id">
                    <td class="border px-4 py-2 font-bold text-center">
                        {{ book.id }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ book.title }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ book.author }}
                    </td>
                    <td class="border px-4 py-2">
                        <!-- <span v-for="genre in book.genres" :key="book.id">{{ genre.genre_name }}</span> -->
                    </td>
                    <td class="border px-4 py-2">
                        {{ book.year }}
                    </td>
                    <!-- <td class="border px-4 py-2">
                        {{ book.created_at }}
                    </td> -->
                    <td class="border px-4 py-2 text-white flex justify-center">
                        <button class="bg-teal-500 rounded-md px-3 py-2 mr-2">
                            <router-link
                                :to="{
                                    name: 'view-book',
                                    params: { id: book.id },
                                }"
                                ><i class="pi pi-eye"></i
                            ></router-link>
                        </button>
                        <button class="bg-amber-500 rounded-md px-3 py-2 mr-2">
                            <router-link
                                :to="{
                                    name: 'edit-book',
                                    params: { id: book.id },
                                }"
                                ><i class="pi pi-file-edit"></i
                            ></router-link>
                        </button>
                        <button
                            class="bg-red-600 rounded-md px-3 py-2"
                            @click="deleteBook(book.id)"
                        >
                            <i class="pi pi-trash"></i>
                        </button>
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
        };
    },
    created() {
        let url = "http://127.0.0.1:8000/api/books";
        this.axios.get(url).then((response) => {
            this.books = response.data.data;
            console.log(this.books);
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
