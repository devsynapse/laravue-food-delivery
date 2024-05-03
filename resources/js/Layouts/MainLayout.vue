<template>
    <AppHeader />
    <slot />
    <AppFooter />
</template>

<script>
import AppHeader from '../Partials/AppHeader.vue'
import AppFooter from '../Partials/AppFooter.vue'

export default {
  name: 'MainLayout',
  components: {
    AppHeader,
    AppFooter
  }
}
</script>