<template>
    <div class="mdl-color--grey-100">
        <top-menu></top-menu>

        <main class="mdl-layout__content">
            Hello World
        </main>

        <footer>
            <legacy></legacy>
        </footer>
    </div>
</template>

<script>
    import Legacy from './components/Legacy.vue'
    import TopMenu from './components/TopMenu.vue'

    export default {
        name: 'app',
        components: {
            Legacy,
            TopMenu
        }
    }
</script>
