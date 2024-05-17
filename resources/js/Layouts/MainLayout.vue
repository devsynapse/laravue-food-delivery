<template>
    <AppHeader />
    <slot />
    <AppFooter />
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