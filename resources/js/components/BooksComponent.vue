<template>
    <div class="">
        <h1 class="text-5xl mb-5">Books</h1>
        <div class="flex flex-row justify-between items-end mb-3">
            <div class=""></div>
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

        <div class="flex items-start justify-between">
            <pagination
                :data="books"
                :limit="10"
                @pagination-change-page="getResults"
                v-slot="slotProps"
                class=""
            >
                <nav
                    v-bind="$attrs"
                    aria-label="Pagination"
                    v-if="slotProps.computed.total > slotProps.computed.perPage"
                    class="inline-flex -space-x-px rounded-md shadow-md mt-3"
                >
                    <button
                        :disabled="!slotProps.computed.prevPageUrl"
                        v-on="slotProps.prevButtonEvents"
                        class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium focus:z-20 disabled:opacity-50"
                    >
                        <slot name="prev-nav">
                            <svg
                                class="h-5 w-5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 19.5L8.25 12l7.5-7.5"
                                />
                            </svg>
                        </slot>
                    </button>

                    <button
                        :class="[
                            page == slotProps.computed.currentPage
                                ? 'border-blue-500 text-blue-500 bg-blue-50'
                                : 'text-gray-500 hover:bg-gray-50 border-gray-300',
                            page == slotProps.computed.currentPage
                                ? 'z-30'
                                : '',
                        ]"
                        v-for="(page, key) in slotProps.computed.pageRange"
                        :key="key"
                        v-on="slotProps.pageButtonEvents(page)"
                        class="relative inline-flex items-center border px-4 py-2 text-sm font-medium focus:z-20 bg-white"
                    >
                        {{ page }}
                    </button>

                    <button
                        :disabled="!slotProps.computed.nextPageUrl"
                        v-on="slotProps.nextButtonEvents"
                        class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium focus:z-20 disabled:opacity-50"
                    >
                        <slot name="next-nav">
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"
                                />
                            </svg>
                        </slot>
                    </button>
                </nav>
            </pagination>
            <p class="text-gray-500 mt-2 italic">
                Showing {{ books.data.length }} out of {{ books.meta.total }}
                items
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            books: {},
            book_genres: {},
        };
    },
    created() {
        this.getResults();
    },

    methods: {
        async getResults(page = 1) {
            let uri = `http://127.0.0.1:8000/api/books?page=`;
            this.axios.get(uri + page).then((response) => {
                this.books = response.data;
                console.log(this.books);
            });
        },
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
