<template>
    <div>
        <h1>Sobre Nosotros (Vue)</h1>
        <p>Esta es la página de información sobre nuestra aplicación.</p>
        <router-link to="/">Volver al Inicio</router-link>
    </div>
</template>

<script>
export default {
    name: 'AboutView',
    mounted() {
        console.log('AboutView montada.');
    }
}
</script>

<style scoped>
div { padding: 20px; background-color: #fff0f5; border: 1px solid #ffd9eb; border-radius: 5px; }
h1 { color: #8b0000; }
a { color: #42b983; text-decoration: none; font-weight: bold; }
a:hover { text-decoration: underline; }
</style>