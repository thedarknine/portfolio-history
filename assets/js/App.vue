<template>
    <div class="">
        <TopMenu></TopMenu>

        <main class="">
            <Illustration></Illustration>
            <PageTitle></PageTitle>

            <!--button class="foo-button mdc-button">
                Button
            </button-->
        </main>

        <footer>
            <Legacy></Legacy>
        </footer>
    </div>
</template>

<script>
    import Illustration from './components/Illustration'
    import Legacy from './components/Legacy'
    import TopMenu from './components/TopMenu.vue'
    import PageTitle from './components/PageTitle';

    export default {
        name: 'app',
        components: {
            PageTitle,
            Illustration,
            Legacy,
            TopMenu
        }
    }
</script>

<style lang="scss">

</style>
