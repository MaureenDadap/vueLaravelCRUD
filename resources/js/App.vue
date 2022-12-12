<template>
    <nav class="bg-white flex shadow-md">
        <div
            class="mx-auto">
            <div
                class="relative flex h-16 items-center flex-row">
                <a class="pr-4">
                    <router-link to="/">Home</router-link>
                </a>
                <a class="pr-4">
                    <router-link to="/books">Books</router-link>
                </a>
                <a class="pr-4">
                    <router-link to="/authors">Authors</router-link>
                </a>
            </div>
        </div>
    </nav>
    <transition name="fade">
        <router-view></router-view>
    </transition>
</template>

<script>
export default {
}
</script>