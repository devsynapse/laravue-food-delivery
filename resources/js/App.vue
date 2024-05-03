<script setup>
    import MainLayout from './Layouts/MainLayout.vue'
</script>

<template>
    <MainLayout>
        <router-view v-slot="{ Component, route }">
            <div :key="route.name">
                <Component :is="Component" />
            </div>
        </router-view>
    </MainLayout>
</template>