<template>
    <main class="flex flex-col min-h-screen bg-gray-100 ">
      <AppHeader />
      <div class="flex flex-col grow container p-4 mx-auto">
          <slot />
      </div>
      <AppFooter />
    </main>
</template>

<script>
import AppHeader from '../Components/AppHeader.vue'
import AppFooter from '../Components/AppFooter.vue'

export default {
  name: 'MainLayout',
  components: {
    AppHeader,
    AppFooter
  }
}
</script>