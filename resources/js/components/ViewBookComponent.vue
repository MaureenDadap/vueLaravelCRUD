<template>
    <div class="">
        <h1 class="text-3xl pb-5">Book Details</h1>
        <div class="bg-white rounded-lg shadow-lg w-full px-8 py-8">
            <table class="table-auto">
                <tr>
                    <th class="border py-4 px-3 text-left">Title</th>
                    <td class="border px-3">{{ book.title }}</td>
                </tr>
                <tr>
                    <th class="border py-4 px-3 text-left">Author</th>
                    <td class="border px-3">{{ book.author }}</td>
                </tr>
                <tr>
                    <th class="border py-4 px-3 text-left">Genre</th>
                    <td class="border px-3">{{ book.genre }}</td>
                </tr>
                <tr>
                    <th class="border py-4 px-3 text-left">Year</th>
                    <td class="border px-3">{{ book.year }}</td>
                </tr>
                <tr>
                    <th class="border py-4 px-3 text-left">Description</th>
                    <td class="border px-3">{{ book.description }}</td>
                </tr>
            </table>
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
        this.axios
            .get(`http://127.0.0.1:8000/api/books/${this.$route.params.id}`)
            .then((res) => {
                this.book = res.data;
            });
    },
    methods: {},
};
</script>
