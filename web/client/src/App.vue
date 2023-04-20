<template>
  <main class="container">

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <router-link class="nav-link" to="/">Домой</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/form">Обратная связь</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <content>
      <router-view></router-view>
    </content>

    <footer>

    </footer>
  </main>
</template>

<script>
export default {
  name: 'App',
  components: {
  }
}
</script>

<style>
body, html {
  padding: 0px;
  margin: 0px;
  background: #eee !important;
}

.container {
  margin: auto 0px;
  min-height: 400px;
  background: #fff;
}

content {
  padding: 5px;
}
</style>

