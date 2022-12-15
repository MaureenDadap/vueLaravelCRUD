<template>
    <div class="">
        <h1 class="text-5xl mb-5">Books</h1>
        <div class="md:columns-2 mb-3">
         
            <input
                    type="search"
                    class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white mb-2 lg:mb-0"
                    placeholder="Search"
                    v-model = "search"
                />
            <div class="flex md:justify-end">
                <a
                    class="bg-green-700 text-white rounded-md px-3 py-2 inline-block"
                    ><router-link to="/book/create"><span class="pi pi-plus mr-2"></span>Add Book</router-link></a
                >
            </div>
        </div>

        <table
            class="table-auto shadow-lg bg-white rounded-lg w-full border-collapse"
        >
            <thead>
                <tr class="bg-gray-100">
                    <th class="border text-center py-4">ID</th>
                    <th class="border text-center py-4">Book Title</th>
                    <th class="border text-center py-4">Author</th>
                    <th class="border text-center py-4">Genres</th>
                    <th class="border text-center py-4">Year</th>
                    <!-- <th class="border text-center py-4">Date Added</th> -->
                    <th class="border text-center py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="Object.keys(books.data).length === 0">
                    <td class="border" colspan="6">
                        <div class="flex p-4 justify-center">
                            <p>There are no records in the database</p>
                        </div>
                    </td>
                </tr>
                <tr v-for="book in books.data" :key="book.id">
                    <td class="border p-2 font-bold text-center">
                        {{ book.id }}
                    </td>
                    <td class="border p-2">
                        {{ book.title }}
                    </td>
                    <td class="border p-2">
                        {{ book.author }}
                    </td>
                    <td class="border p-2">
                        <div
                            v-for="genre in book.genres"
                            :key="genre.id"
                            class="bg-gray-200 rounded-md px-2 m-1 break-normal inline-block"
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
                            <div class="block">
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
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex items-center">
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
            <p class="text-gray-500 mt-2 italic ml-4">
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
            search: '',
        };
    },
    created() {
        this.getResults();
    },
    watch: {
        search (val, old) {
            if (val.length >= 3 || old.length >= 3) {
                // console.log("search triggered")
                this.getResults();
            }
            // this.getResults();
        }
    },
    methods: {
        async getResults(page = 1) {
            let uri = `http://127.0.0.1:8000/api/books`;

            this.axios
                .get(uri, {
                    params: {
                        page,
                        search: this.search.length >= 3 ? this.search : '',
                    },
                })
                .then((response) => {
                    this.books = response.data;
                    console.log(this.books);
                });
        },
        deleteBook(id) {
            this.axios
                .delete(`http://127.0.0.1:8000/api/books/${id}`)
                .then((response) => {
                    window.location.reload()
                });
        },
    },
};
</script>
