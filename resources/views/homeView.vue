<template>
    <div>
        <h1>Página de Inicio (Vue)</h1>
        <p>Bienvenido a nuestra aplicación SPA.</p>
        <router-link to="/about">Ir a Sobre Nosotros</router-link>
    </div>
</template>

<script>
export default {
    name: 'HomeView',
    mounted() {
        console.log('HomeView montada.');
    }
}
</script>

<style scoped>
div { padding: 20px; background-color: #f0f8ff; border: 1px solid #cceeff; border-radius: 5px; }
h1 { color: #2c3e50; }
a { color: #42b983; text-decoration: none; font-weight: bold; }
a:hover { text-decoration: underline; }
</style>