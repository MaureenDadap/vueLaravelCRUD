<template>
    <nav class="bg-white flex shadow-md">
        <div class="mx-auto">
            <div class="relative flex h-16 items-center flex-row">
                <a class="pr-10">
                    <router-link to="/">Home</router-link>
                </a>
            </div>
        </div>
    </nav>

    <div class="container pt-10 max-w-4xl mx-auto">
        <router-view></router-view>
    </div>
</template>

<script>
export default {};
</script>
