<template>
    <div
        class="container pt-7 max-w-3xl mx-auto">
        <div
            class="flex flex-row justify-between items-center">

            <h1 class="text-3xl pb-5">
                Books</h1>
            <a
                class="bg-green-400 rounded-md px-3 py-2"><router-link
                    to="/new-book">Add
                    Book</router-link></a>

        </div>

        <table
            class="table-auto shadow-lg bg-white rounded-lg">
            <thead>
                <tr>
                    <th
                        class="border text-center py-4">
                        #</th>
                    <th
                        class="border text-center py-4">
                        Book Title</th>
                    <th
                        class="border text-center py-4">
                        Author</th>
                    <th
                        class="border text-center py-4">
                        Genre</th>
                    <th
                        class="border text-center py-4">
                        Year Released
                    </th>
                    <th
                        class="border text-center py-4">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books"
                    :key="book.id">
                    <td
                        class="border px-8 py-2">
                        {{ book.id }}
                    </td>
                    <td
                        class="border px-8 py-2">
                        {{ book.title }}
                    </td>
                    <td
                        class="border px-8 py-2">
                        {{ book.authorID
                        }}
                    </td>
                    <td
                        class="border px-8 py-2">
                        {{ book.genre }}
                    </td>
                    <td
                        class="border px-8 py-2">
                        {{ book.year }}
                    </td>
                    <td
                        class="border px-8 py-2 text-white">
                        <button
                            class="bg-red-400 rounded-md px-2 py-2">delete</button>
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
            books: []
        }
    },
    created() {
        let url = 'http://127.0.0.1:8000/api/books';
        this.axios.get(url).then(response => {
            this.books = response.data.data;
        })
    },
}
</script>