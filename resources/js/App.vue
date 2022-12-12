<template>
  <nav class="bg-gray-800">
      <div
          class="mx-auto px-2 sm:px-6 lg:px-8">
          <div
              class="relative flex h-16 items-center flex-row text-white">
              <a class="pr-4">
                  <router-link to="/"
                      class="nav-link">Home</router-link>
              </a>
              <a class="pr-4">
                  <router-link
                      to="/create"
                      class="nav-link">Create
                      Post</router-link>
              </a>
              <a class="nav-item">
                  <router-link
                      to="/posts"
                      class="nav-link">Posts</router-link>
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