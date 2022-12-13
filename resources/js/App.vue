<template>
    <nav class="bg-white flex shadow-md">
        <div class="mx-auto">
            <div class="relative flex h-16 items-center flex-row">
                <!-- <a class="pr-4">
                    <router-link to="/">Home</router-link>
                </a> -->
                <a class="pr-10">
                    <router-link to="/books">Books</router-link>
                </a>
            </div>
        </div>
    </nav>
    <transition name="fade">
        <div class="container pt-10 max-w-3xl mx-auto">
            <router-view></router-view>
        </div>
    </transition>
</template>

<script>
export default {};
</script>
